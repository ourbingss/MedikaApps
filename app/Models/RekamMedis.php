<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $fillable = ['pasien_id', 'dokter_id', 'tgl_periksa', 'keluhan', 'diagnosa'];
    // Relasi agar bisa mengambil nama pasien di laporan  (export) [cite: 23, 26]
    public function pasien() {
        return $this->belongsTo(pasien::class);
    }
    public function dokter() {
        return $this->belongsTo(Dokter::class);
    }
}
