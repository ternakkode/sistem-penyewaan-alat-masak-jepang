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

    public function statusPenyewaan() {
        return $this->belongsTo('App\Model\StatusPenyewaan');
    }

    public function menu() {
        return $this->belongsToMany('App\Model\Menu');
    }

    public function alat() {
        return $this->belongsToMany('App\Model\Alat', 'penyewaan_alat', 'penyewaan_id', 'alat_id')->withPivot('jumlah');
    }
}
