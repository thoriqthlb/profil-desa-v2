<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    protected $fillable = [
        'nama_desa',
        'alamat_lengkap',
        'sejarah_singkat',
        'logo',
        'kontak',
    ];
}