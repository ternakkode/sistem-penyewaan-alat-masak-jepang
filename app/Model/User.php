<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'user';
    protected $guarded = [];

    public function role() {
        return $this->belongsTo('App\Model\Role');
    }

    public function penyewaan() {
        return $this->hasMany('App\Model\Penyewaan');
    }

    public function keranjang() {
        return $this->belongsToMany('App\Model\Menu', 'keranjang', 'user_id', 'menu_id')->withPivot('qty');
    }
}
