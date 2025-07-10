<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AnswersByStatusExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        // Cari pertanyaan yang mengandung kata "status" (case-insensitive)
        $statusQuestion = DB::table('questions')
            ->where('question', 'ILIKE', '%status%')
            ->first();

        if (!$statusQuestion) return [];

        // Ambil jawaban pertanyaan status untuk semua user
        $statusAnswers = DB::table('answers')
            ->where('question_id', $statusQuestion->id)
            ->pluck('answer', 'user_id'); // [user_id => "Bekerja", ...]

        // Kelompokkan user berdasarkan status
        $grouped = [];
        foreach ($statusAnswers as $userId => $status) {
            $grouped[$status][] = $userId;
        }

        $sheets = [];
        foreach ($grouped as $status => $userIds) {
            $sheets[] = new AnswersPerStatusSheet($status, $userIds);
        }

        return $sheets;
    }
}
