<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuFoto extends Model
{

    protected $table = 'menu_foto';
    protected $guarded = [];
    public $timestamps = false;

    public function menu() {
        return $this->belongsTo('App\Model\Menu');
    }
}
