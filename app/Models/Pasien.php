<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nik', 'nama_pasien', 'tgl_lahir', 'no_telp', 'alamat'];
}
