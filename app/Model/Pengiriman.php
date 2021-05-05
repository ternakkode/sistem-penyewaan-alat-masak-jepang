<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{

    protected $table = 'pengiriman';
    protected $guarded = [];
    public $timestamps = false;

    public function penyewaan() {
        return $this->hasMany('App\Model\Penyewaan');
    }
}
