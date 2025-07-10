<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
use App\Models\User;


class StatisticController extends Controller
{
    public function showStatistic(Request $request)
    {
        $statusQuestionId = 1; // Pertanyaan "Status Alumni"
        $selectedStatus = $request->query('status');

        // Ambil semua pertanyaan kecuali pertanyaan status
        $questions = Question::where('id', '!=', $statusQuestionId)->get();

        // Ambil jawaban unik dari pertanyaan status
        $statuses = Answer::where('question_id', $statusQuestionId)
            ->distinct()
            ->pluck('answer');

        $charts = [];

        foreach ($questions as $question) {
            // Ambil query jawaban untuk pertanyaan ini
            $answerQuery = Answer::where('question_id', $question->id);

            if ($selectedStatus) {
                $userIds = Answer::where('question_id', $statusQuestionId)
                    ->where('answer', $selectedStatus)
                    ->pluck('user_id');
                $answerQuery->whereIn('user_id', $userIds);
            }

            $answers = $answerQuery->pluck('answer');

           $grouped = collect($answers)->flatMap(function ($a) {
    $decoded = json_decode($a, true);

    // Ambil hanya nilai scalar dari decoded array
    if (is_array($decoded)) {
        return collect($decoded)->filter(fn($v) => is_scalar($v))->values();
    }

    return is_scalar($a) ? [$a] : [];
})->countBy();


            

            if ($grouped->isNotEmpty()) {
                $charts[] = [
                    'question' => $question->question,
                    'labels' => $grouped->keys(),
                    'series' => $grouped->values(),
                ];
            }
        }

        return view('admin.statistic_page', compact('charts', 'statuses', 'selectedStatus'));
    }
}
