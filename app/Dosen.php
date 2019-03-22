<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nip', 'nama_dosen', 'id_matkul'];

    protected $table = 'dosens';

    public function matkul()
    {
        return $this->belongsTo('App\Matkul','id_matkul');
    }

    public function mahasiswa()
    {
        return $this->hasMany('App\Mahasiswa','id_dosen');
    }
}
