<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangDosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_dosen', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bidang',10);
            $table->bigInteger('kode_dosen')->unsigned();
         });
         Schema::table('bidang_dosen', function($table) {
             $table->foreign('kode_dosen')->references('id')->on('dosen')->onDelete('cascade');
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
        Schema::dropIfExists('bidang_dosen');
    }
}
