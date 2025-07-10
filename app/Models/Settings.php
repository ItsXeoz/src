<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    // Jika nama tabel mengikuti konvensi (settings), tidak perlu deklarasi `$table`

    // Kolom yang boleh diisi melalui mass assignment
    protected $fillable = [
        'demo',
        'kode_jur',
        'angkatan',
    ];

    // Jika kamu ingin menggunakan casts (otomatis ubah ke tipe tertentu):
    protected $casts = [
        'demo' => 'boolean',
        'angkatan' => 'integer',
    ];
}
