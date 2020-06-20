<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    //

    //キャスト情報
    public function cast()
    {
        return $this->belongsTo('App\Models\Cast');
    }

    //顧客情報
    public function user()
    {
         return $this->belongsTo('App\Models\User');
    }

    //派遣地域情報
    public function delivery()
    {
         return $this->belongsTo('App\Models\Delivery');
    }

    //コース情報
    public function corse()
    {
         return $this->belongsTo('App\Models\Corse');
    }
}
