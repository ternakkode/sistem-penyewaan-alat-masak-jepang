<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama', 100);
            $table->string('no_telefon', 20);
            $table->longText('alamat');
            $table->unsignedBigInteger('pengiriman_id')->nullable();
            $table->unsignedBigInteger('pembayaran_id')->nullable();
            $table->integer('tanggal_pemesanan');
            $table->integer('jam_mulai');
            $table->integer('jam_selesai');
            $table->integer('ongkir');
            $table->integer('total_biaya');
            $table->unsignedBigInteger('status_penyewaan_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('SET NULL');
            $table->foreign('pengiriman_id')->references('id')->on('pengiriman')->onDelete('SET NULL');
            $table->foreign('pembayaran_id')->references('id')->on('pembayaran')->onDelete('SET NULL');
            $table->foreign('status_penyewaan_id')->references('id')->on('status_penyewaan')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyewaan');
    }
}
