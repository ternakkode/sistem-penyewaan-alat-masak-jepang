<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StatusPenyewaan extends Model
{

    protected $table = 'penyewaan';
    protected $guarded = [];
    public $timestamps = false;

    public function penyewaan() {
        return $this->hasMany('App\Model\Penyewaan');
    }
}
