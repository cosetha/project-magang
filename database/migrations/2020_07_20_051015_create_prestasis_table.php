<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('gambar',255);
            $table->string('nama_kejuaraan',255);
            $table->string('peringkat',255);
            $table->string('nama',255);
            $table->bigInteger('id_bidang_keahlian')->unsigned();
            $table->foreign('id_bidang_keahlian')
                  ->references('id')
                  ->on('bidang_keahlian')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('tahun')->unsigned();;
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
        Schema::dropIfExists('prestasi');
    }
}
