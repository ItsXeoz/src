<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function showAdminDashboard()
    {
        $jawaban = DB::table('answers')
            ->where('question_id', 1)
            ->select('answer', DB::raw('count(*) as total'))
            ->groupBy('answer')
            ->pluck('total', 'answer');

        // Mengambil masing-masing jumlah
        $totalBekerja = $jawaban['Bekerja'] ?? 0;
        $totalWiraswasta = $jawaban['Wiraswasta'] ?? 0;
        $totalPendidikan = $jawaban['Melanjutkan Pendidikan'] ?? 0;
        $totalMencari = $jawaban['Tidak Bekerja'] ?? 0;
        return view('admin.dashboard_admin_page', compact('totalBekerja', 'totalWiraswasta', 'totalPendidikan','totalMencari'));
    }
}
