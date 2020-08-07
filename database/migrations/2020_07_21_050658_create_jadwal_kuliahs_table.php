<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kuliah', function (Blueprint $table) {
            $table->string('id',10)->primary();
            $table->string('nama_jadwal',255);
            $table->mediumText('file');
            $table->unsignedBigInteger('kode_bk');
            $table->unsignedBigInteger('kode_semester');
            $table->timestamps();
            

            $table->foreign('kode_semester')
            ->references('id')
            ->on('semester')
            ->onDelete('cascade');

            $table->foreign('kode_bk')
            ->references('id')
            ->on('bidang_keahlian')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_kuliah');
    }
}
