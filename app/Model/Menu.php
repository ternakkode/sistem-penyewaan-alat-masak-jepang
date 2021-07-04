<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table = 'menu';
    protected $guarded = [];
    public $timestamps = false;

    public function alat() {
        return $this->belongsToMany('App\Model\Alat');
    }

    public function kategori() {
        return $this->belongsTo('App\Model\Kategori');
    }

    public function penyewaan() {
        return $this->belongsToMany('App\Model\Penyewaan');
    }

    public function foto() {
        return $this->hasMany('App\Model\MenuFoto');
    }

    public function keranjang() {
        return $this->belongsToMany('App\Model\User', 'keranjang', 'menu_id', 'user_id')->withPivot('qty');
    }

}
