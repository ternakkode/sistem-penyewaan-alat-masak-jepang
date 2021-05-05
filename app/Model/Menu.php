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
}
