<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangPrestasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bidang',10);
            $table->bigInteger('kode_prestasi')->unsigned();
         });
         Schema::table('bidang_prestasi', function($table) {
             $table->foreign('kode_prestasi')->references('id')->on('prestasi')->onDelete('cascade');
             $table->foreign('kode_bidang')->references('id')->on('bidang_keahlian')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidang_prestasi');
    }
}
