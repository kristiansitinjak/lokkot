<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workprogram extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',           // perihal
        'description',       // deskripsi
        'objective',         // tujuan
        'location',          // lokasi
        'planned_date',      // rencana_tanggal
        'actual_date',       // realisasi_tanggal
        'funding_source',    // sumber_dana
        'planned_budget',    // rencana_biaya
        'actual_budget',     // realisasi_biaya
        'status',            // status (tetap, karena biasanya sudah dalam bahasa Inggris)
        'period',            // masa_jabatan
    ];

    public function localUser()
    {
        return $this->belongsTo(\App\Models\LocalUser::class, 'period', 'period');
    }
}
