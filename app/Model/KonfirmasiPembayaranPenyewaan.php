<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KonfirmasiPembayaranPenyewaan extends Model
{

    protected $table = 'konfirmasi_pembayaran_penyewaan';
    protected $guarded = [];

    public function penyewaan() {
        return $this->belongsTo('App\Model\Penyewaan');
    }
}
