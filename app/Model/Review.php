<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = 'review';
    protected $guarded = [];

    public function penyewaan() {
        return $this->belongsTo('App\Model\penyewaan');
    }
}
