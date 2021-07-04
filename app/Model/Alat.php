<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{

    protected $table = 'alat';
    protected $guarded = [];
    public $timestamps = false;

    public function menu() {
        return $this->belongsToMany('App\Model\Menu');
    }

    public function penyewaan() {
        return $this->belongsToMany('App\Model\Penyewaan', 'penyewaan_alat', 'penyewaan_id', 'alat_id')->withPivot('jumlah');
    }
}
