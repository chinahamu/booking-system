<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    //
    protected $table = 'casts';

    public function schedule(){
        return $this->hasmany('App\Models\Schedule');
    }

    public function cast_rank(){
        return $this->belongsTo('App\Models\CastRank');
    }
}
