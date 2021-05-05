<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiPembayaranPenyewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_pembayaran_penyewaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penyewaan_id');
            $table->string('bukti', 100);
            $table->timestamps();
            
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
        Schema::dropIfExists('konfirmasi_pembayaran_penyewaan');
    }
}
