<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim',15);
            $table->string('nama',255);
            $table->unsignedBigInteger('kode_bk')->unsigned();
            $table->smallInteger('angkatan');
            $table->timestamps();
        });
        Schema::table('mahasiswa', function($table) {
            $table->foreign('kode_bk')->references('id')->on('bidang_keahlian')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
