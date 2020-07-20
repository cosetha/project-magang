<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoLombaSeminarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_lomba_seminar', function (Blueprint $table) {
            $table->increments('id',10);
            $table->string('judul');
            $table->text('gambar');
            $table->text('deskripsi');
            $table->integer('lokasi')->length(5)->unsigned();
            $table->date('tanggal');
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
        Schema::dropIfExists('info_lomba_seminar');
    }
}
