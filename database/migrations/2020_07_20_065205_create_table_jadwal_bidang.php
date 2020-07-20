<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJadwaLbidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_bidang', function (Blueprint $table) {
           $table->id();
           $table->string('kode_bidang',10);
           $table->string('kode_jadwal',10);
        });
        Schema::table('jadwal_bidang', function($table) {
            $table->foreign('kode_jadwal')->references('id')->on('jadwal_kuliah')->onDelete('cascade');
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
        Schema::dropIfExists('jadwal_bidang');
    }
}
