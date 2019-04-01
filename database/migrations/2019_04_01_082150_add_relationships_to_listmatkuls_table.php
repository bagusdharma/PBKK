<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToListmatkulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listmatkuls', function (Blueprint $table) {
            $table->foreign('id_matkul')->references('id')->on('matkuls')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('dosens')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listmatkuls', function (Blueprint $table) {
            //
        });
    }
}
