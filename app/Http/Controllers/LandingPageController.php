<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class LandingPageController extends Controller
{
    public function index()
    {
        $jawaban = DB::table('answers')
            ->where('question_id', 1)
            ->select('answer', DB::raw('count(*) as total'))
            ->groupBy('answer')
            ->pluck('total', 'answer');

        $totalBekerja = $jawaban['Bekerja'] ?? 0;
        $totalWiraswasta = $jawaban['Wiraswasta'] ?? 0;
        $totalPendidikan = $jawaban['Melanjutkan Pendidikan'] ?? 0;

        $jawabanWaktuKerja = $employmentAnswers = DB::table('answers')
            ->join('questions', 'answers.question_id', '=', 'questions.id')
            ->where('questions.category', 'Bekerja') // Atau sesuaikan
            ->where('questions.question', 'Apakah anda telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus ?') // Sesuaikan jika perlu
            ->select('answers.answer', DB::raw('count(*) as total'))
            ->groupBy('answers.answer')
            ->get();
        ;

        $label = $jawabanWaktuKerja->pluck('answer');
        $answer = $jawabanWaktuKerja->pluck('total');

        return view('landing_page', compact('totalBekerja', 'totalWiraswasta', 'totalPendidikan', 'answer', 'label'));
    }
}
