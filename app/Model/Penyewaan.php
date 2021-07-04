<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{

    protected $table = 'penyewaan';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function pengiriman() {
        return $this->belongsTo('App\Model\Pengiriman');
    }

    public function pembayaran() {
        return $this->belongsTo('App\Model\Pembayaran');
    }

    public function statusPenyewaan() {
        return $this->belongsTo('App\Model\StatusPenyewaan');
    }

    public function konfirmasiPembayaranPenyewaan() {
        return $this->hasOne('App\Model\KonfirmasiPembayaranPenyewaan');
    }

    public function review() {
        return $this->hasOne('App\Model\Review');
    }

    public function menu() {
        return $this->belongsToMany('App\Model\Menu');
    }

    public function alat() {
        return $this->belongsToMany('App\Model\Alat', 'penyewaan_alat', 'penyewaan_id', 'alat_id')->withPivot('jumlah');
    }
}
