<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listmatkul extends Model
{
    protected $fillable = ['id_mahasiswa', 'id_matkul', 'id_dosen'];
}
