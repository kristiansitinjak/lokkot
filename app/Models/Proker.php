<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;

    protected $fillable = [
        'perihal',
        'deskripsi',
        'tujuan',
        'lokasi',
        'rencana_tanggal',
        'realisasi_tanggal',
        'sumber_dana',
        'rencana_biaya',
        'realisasi_biaya',
        'status',
        'masa_jabatan',

    ];

    public function localUser()
    {
        return $this->belongsTo(\App\Models\LocalUser::class, 'masa_jabatan', 'masa_jabatan');
    }
}
