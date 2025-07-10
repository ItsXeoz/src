<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login_page');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required|string',
        ]);

        // 1. Coba login ke database lokal
        if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            $role = Auth::user()->role;
            return redirect()->intended($role === 'admin' ? '/admin' : '/user');
        }

        // 2. Jika gagal, coba login ke API eksternal
        $token = env('API_TOKEN');
        $url = env('BASE_URL');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->asForm()->post($url, [
            'username' => $request->nim,
            'password' => $request->password,
        ]);

        if ($response->successful() && $response['status'] === true) {
            $data = $response['data'];

            // Ambil setting
            $setting = DB::table('settings')->first();

            // 3. Jika demo aktif, lakukan validasi tambahan
            if ($setting && $setting->demo) {
                if ($data['kode_jur'] !== $setting->kode_jur) {
                    return back()->withErrors(['nim' => 'Khusus alumni informatika.']);
                }

                if ($data['status_login'] !== 'mahasiswa') {
                    return back()->withErrors(['nim' => 'Khusus akun mahasiswa.']);
                }
            }

            // 4. Simpan ke database lokal
            $user = User::updateOrCreate(
                ['nim' => $data['username']],
                [
                    'name' => $data['first_name'],
                    'email' => $data['email'] ?? null,
                    'photo_url' => $data['foto_user'],
                    'status_login' => $data['status_login'],
                    'kode_jur' => $data['kode_jur'],
                    'angkatan' => substr($data['angkatan'], 0, 4),
                    'role' => 'user',
                    'password' => bcrypt($request->password),
                ]
            );

            // 5. Login dan redirect
            Auth::login($user);
            return redirect()->intended('/user');
        }

        // 6. Jika semuanya gagal
        return back()->withErrors(['nim' => 'NIM atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
