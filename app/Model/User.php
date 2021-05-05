<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';
    protected $guarded = [];

    public function role() {
        return $this->belongsTo('App\Model\Role');
    }

    public function penyewaan() {
        return $this->hasMany('App\Model\Penyewaan');
    }
}
