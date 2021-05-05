<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'role';
    protected $guarded = [];
    public $timestamps = false;

    public function user() {
        return $this->hasMany('App\Model\User');
    }
}
