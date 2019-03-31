<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->foreign('id_dosen')->references('id')->on('dosens')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_matkul')->references('id')->on('matkuls')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_nilai')->references('id')->on('nilais')
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
        Schema::table('mahasiswas', function (Blueprint $table) {
            //$table->dropForeign('mahasiswas_id_dosen_foreign');
        });
    }
}
