<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AnswersPerStatusSheet implements FromArray, WithTitle, WithHeadings
{
    protected string $status;
    protected array $userIds;

    public function __construct(string $status, array $userIds)
    {
        $this->status = $status;
        $this->userIds = $userIds;
    }

    public function array(): array
    {
        $questions = DB::table('questions')->orderBy('id')->get();
        $questionMap = $questions->pluck('question', 'id'); // [id => "Apa status anda"]

        $rows = [];

        foreach ($this->userIds as $userId) {
            $answers = DB::table('answers')
                ->where('user_id', $userId)
                ->pluck('answer', 'question_id');

            $row = ['User ID' => $userId];

            foreach ($questionMap as $qId => $qText) {
                $row[$qText] = $answers[$qId] ?? '';
            }

            $rows[] = $row;
        }

        return $rows;
    }

    public function headings(): array
    {
        $questions = DB::table('questions')->orderBy('id')->pluck('question');
        return array_merge(['User ID'], $questions->toArray());
    }

    public function title(): string
    {
        return substr($this->status, 0, 31); // Excel sheet name limit
    }
}
