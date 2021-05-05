<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    protected $table = 'kategori';
    protected $guarded = [];
    public $timestamps = false;

    public function menu() {
        return $this->hasMany('App\Model\Menu');
    }
}
