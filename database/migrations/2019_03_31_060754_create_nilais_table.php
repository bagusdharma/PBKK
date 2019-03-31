<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_matkul');
            $table->unsignedInteger('id_dosen');
            $table->unsignedInteger('id_mahasiswa');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->integer('tugas');
            $table->string('nilai_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
}
