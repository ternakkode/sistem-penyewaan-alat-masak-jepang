<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaanAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewaan_alat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alat_id');
            $table->unsignedBigInteger('penyewaan_id');
            $table->integer('jumlah');

            $table->foreign('alat_id')->references('id')->on('alat')->onDelete('cascade');
            $table->foreign('penyewaan_id')->references('id')->on('penyewaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyewaan_alat');
    }
}
