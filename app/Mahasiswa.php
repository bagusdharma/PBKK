<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nrp', 'nama_siswa', 'alamat_siswa', 'id_dosen'];

    protected $table = 'mahasiswas';

    public function dosen()
    {
        return $this->belongsTo('App\Dosen','id_dosen');
    }
}
