<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('berita', function (Blueprint $table) {
          $table->id();
          $table->string('judul');
          $table->text('gambar');
          $table->text('deskripsi');

          $table->bigInteger('id_penulis')->unsigned();
          $table->foreign('id_penulis')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('berita');
    }
}
