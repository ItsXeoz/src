<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;

use App\Models\Answer; // Pastikan model sesuai dengan tabel database

class UpdateSurveyController extends Controller
{
    public function showSurvey()
    {
        $user = Auth::user();

        // Ambil semua pertanyaan dan jawaban pengguna
        $questions = [
            'Bekerja' => Question::where('category', 'Bekerja')->get(),
            'Wiraswasta' => Question::where('category', 'Wiraswasta')->get(),
            'Melanjutkan Pendidikan' => Question::where('category', 'Melanjutkan Pendidikan')->get(),
            'Mencari Pekerjaan' => Question::where('category', 'Mencari Pekerjaan')->get(),
            'Belum Bekerja' => Question::where('category', 'Belum Bekerja')->get(),
            'Universal' => Question::where('category', 'Universal')->get(),
        ];

        $userAnswers = Answer::where('user_id', $user->id)->pluck('answer', 'question_id');

        return view('user.update_survey_page', compact('questions', 'userAnswers'));
    }

}
