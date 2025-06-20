<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;

class SurveyController extends Controller
{
    public function showSurvey()
    {
        $questions = [
            'Bekerja' => Question::where('category', 'Bekerja')->get(),
            'Wiraswasta' => Question::where('category', 'Wiraswasta')->get(),
            'Melanjutkan Pendidikan' => Question::where('category', 'Melanjutkan Pendidikan')->get(),
            'Mencari Pekerjaan' => Question::where('category', 'Mencari Pekerjaan')->get(),
            'Tidak Bekerja' => Question::where('category', 'Tidak Bekerja')->get(),
            'Universal' => Question::where('category', 'Universal')->get(),
        ];

        return view('user.survey_page', compact('questions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'answers' => 'required|array',
        ]);

        $filteredAnswers = array_filter($validatedData['answers'], function ($value) {
            return !is_null($value) && $value !== '';
        });

        if (empty($filteredAnswers)) {
            return redirect()->back()->withErrors(['answers' => 'Anda harus mengisi minimal satu jawaban.']);
        }

        foreach ($filteredAnswers as $question_id => $answer) {
            Answer::create([
                'user_id' => Auth::User()->id,
                'question_id' => $question_id,
                'answer' => is_array($answer) ? json_encode($answer) : $answer,
            ]);
        }

        return redirect()->intended('/user');
    }

    public function edit()
    {
        $user = Auth::user();

        $questions = [
            'Bekerja' => Question::where('category', 'Bekerja')->get(),
            'Wiraswasta' => Question::where('category', 'Wiraswasta')->get(),
            'Melanjutkan Pendidikan' => Question::where('category', 'Melanjutkan Pendidikan')->get(),
            'Mencari Pekerjaan' => Question::where('category', 'Mencari Pekerjaan')->get(),
            'Belum Bekerja' => Question::where('category', 'Belum Bekerja')->get(),
            'Universal' => Question::where('category', 'Universal')->get(),
        ];

        $userAnswers = Answer::where('user_id', $user->id)
            ->get()
            ->pluck('answer', 'question_id')
            ->map(function ($answer) {
                return is_array($answer)
                    ? $answer
                    : (self::isJson($answer) ? json_decode($answer, true) : $answer);
            });

        return view('user.update_survey_page', compact('questions', 'userAnswers'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'answers' => 'required|array',
        ]);

        $filteredAnswers = array_filter($validatedData['answers'], function ($value) {
            return !is_null($value) && $value !== '';
        });

        if (empty($filteredAnswers)) {
            return redirect()->back()->withErrors(['answers' => 'Anda harus mengisi minimal satu jawaban.']);
        }

        foreach ($filteredAnswers as $question_id => $answer) {
            Answer::updateOrCreate(
                [
                    'user_id' => Auth::user()->id,
                    'question_id' => $question_id,
                ],
                [
                    'answer' => is_array($answer) ? json_encode($answer) : $answer,
                ]
            );
        }

        return redirect()->intended('/user')->with('success', 'Jawaban berhasil diperbarui!');
    }

    private static function isJson($string)
    {
        if (!is_string($string)) return false;
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
