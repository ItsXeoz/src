<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('questions')->insert([
            // Pertanyaan utama

            // Tingkat Pendidikan yang Sesuai
            [
                'question' => 'a',
                'type' => 'Scale Table',
                'category' => 'Mencari Pekerjaan',
                'scale_min' => 1,
                'scale_max' => 5,
                'choices' => json_encode([
                    'Etika' => 'Etika',
                    'Keahlian berdasarkan bidang ilmu (Profesionalisme)' => 'Keahlian berdasarkan bidang ilmu (Profesionalisme)',
                    'Bahasa Inggris' => 'Bahasa Inggris',
                    'Penggunaan Teknologi Informasi' => 'Penggunaan Teknologi Informasi',
                    'Komunikasi' => 'Komunikasi',
                    'Kerjasama Tim' => 'Kerjasama Tim',
                    'Pengembangan Diri' => 'Pengembangan Diri',
                ]),
                'scale_questions' => null,
                'parent_question_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
