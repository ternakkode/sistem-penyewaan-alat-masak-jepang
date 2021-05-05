<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPenyewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_penyewaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('penyewaan_id');
            $table->integer('jumlah');
            $table->integer('harga');

            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
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
        Schema::dropIfExists('menu_penyewaan');
    }
}
