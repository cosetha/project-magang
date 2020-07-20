<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_angkatan')->unsigned();
            $table->string('nama_alumni',255);
            $table->string('kode_bk',10);
            $table->string('tgl_lulus',255);
            $table->timestamps();
        });
        Schema::table('alumni', function($table) {
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
        Schema::dropIfExists('alumni');
    }
}
