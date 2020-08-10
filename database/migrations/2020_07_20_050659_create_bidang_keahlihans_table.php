<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangKeahlihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_keahlian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bk',255);
            $table->mediumText('deskripsi');
            $table->text('gambar');
            $table->string('akreditasi',20);
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
        Schema::dropIfExists('bidang_keahlian');
    }
}
