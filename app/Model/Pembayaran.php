<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{

    protected $table = 'pembayaran';
    protected $guarded = [];
    public $timestamps = false;

    public function penyewaan() {
        return $this->hasMany('App\Model\Penyewaan');
    }
}
