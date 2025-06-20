<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class formSubmit extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'sumber_dana',
        'waktu_cari_kerja',
        'cara_cari_kerja',
        'jumlah_lamaran',
        'jumlah_respon',
        'jumlah_wawancara',
        'situasi',
        'aktivitas_mencari',
    ];

    protected $casts = [
        'cara_cari_kerja' => 'array',
        'situasi' => 'array',
    ];

}
