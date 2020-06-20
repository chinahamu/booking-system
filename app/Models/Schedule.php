<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //キャスト情報
    public function cast()
    {
        return $this->belongsTo('App\Models\Cast');
    }
    
    
}
