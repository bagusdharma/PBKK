<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilais', function (Blueprint $table) {
            $table->foreign('id_dosen')->references('id')->on('dosens')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_matkul')->references('id')->on('matkuls')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilais', function (Blueprint $table) {
            //
        });
    }
}
