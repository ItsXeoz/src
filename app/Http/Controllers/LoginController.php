<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

        // Coba login ke database lokal
        if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            $role = Auth::user()->role;
            return redirect()->intended($role == 'admin' ? '/admin' : '/user');
        }

        // Jika gagal, coba login ke API eksternal
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

            // Simpan ke database lokal jika belum ada
            $user = User::updateOrCreate(
                ['nim' => $data['username']],
                [
                    'name' => $data['first_name'],
                    'email' => $data['email'] ?? null,
                    'photo_url' => $data['foto_user'],
                    'role' => 'user',
                    'password' => bcrypt($request->password),
                ]
            );

            // Login Laravel
            Auth::login($user);

            return redirect()->intended('/user');
        }

        return back()->withErrors(['nim' => 'NIM atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
