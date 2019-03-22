<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $fillable = ['nama_matkul'];

    protected $table = 'matkuls';

    public function dosen()
    {
        return $this->hasMany('App\Dosen','id_dosen');
    }
}
