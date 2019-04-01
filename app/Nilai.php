<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['id_mahasiswa', 'id_dosen', 'id_matkul', 'tugas', 'nilai_uts', 'nilai_uas'];
}
