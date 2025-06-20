<?php

namespace App\Exports;

use App\Models\Answer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class AnswersExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return \DB::table('answers')
        ->join('questions', 'answers.question_id', '=', 'questions.id')
        ->select(
            'answers.user_id',
            DB::raw("MAX(CASE WHEN questions.id = 46 THEN answers.answer END) AS status_pekerjaan"),
            DB::raw("MAX(CASE WHEN questions.id = 11 THEN answers.answer END) AS waktu_mendapatkan_pekerjaan"),
            DB::raw("MAX(CASE WHEN questions.id = 12 THEN answers.answer END) AS rata_rata_pendapatan"),
            DB::raw("MAX(CASE WHEN questions.id = 13 THEN answers.answer END) AS lokasi_tempat_kerja"),
            DB::raw("MAX(CASE WHEN questions.id = 14 THEN answers.answer END) AS jenis_perusahaan"),
            DB::raw("MAX(CASE WHEN questions.id = 15 THEN answers.answer END) AS nama_perusahaan"),
            DB::raw("MAX(CASE WHEN questions.id = 16 THEN answers.answer END) AS keterkaitan_bidang_studi"),
            DB::raw("MAX(CASE WHEN questions.id = 17 THEN answers.answer END) AS tingkat_pendidikan_sesuai"),
            DB::raw("MAX(CASE WHEN questions.id = 35 THEN answers.answer END) AS tingkat_kompetensi_diperlukan")
        )
        ->whereIn('questions.id', [46,11, 12, 13, 14, 15, 16, 17, 35])
        ->groupBy('answers.user_id')
        ->get();

    }

    public function headings(): array
    {
        return [
            'User ID',
            'Status Pekerjaan',
            'Waktu Mendapatkan Pekerjaan',
            'Rata-rata Pendapatan',
            'Lokasi Tempat Kerja',
            'Jenis Perusahaan',
            'Nama Perusahaan',
            'Keterkaitan Bidang Studi',
            'Tingkat Pendidikan Sesuai',
            'Tingkat Kompetensi',
        ];
    }

}
