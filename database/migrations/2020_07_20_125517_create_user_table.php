<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user', function (Blueprint $table) {
          $table->id();
          $table->string('gambar');
          $table->string('nama');
          $table->string('email');
          $table->string('password');
          $table->bigInteger('id_role')->unsigned();
          $table->foreign('id_role')
                ->references('id')
                ->on('roles')
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
        Schema::dropIfExists('user');
    }
}
