<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'nohp',
        'domisili',
        'email',
        'jenis_kelamin',
        'tahun_masuk',
    ];
}