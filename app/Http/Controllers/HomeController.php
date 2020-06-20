<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $cast = DB::select("
    select
        casts.id,
        casts.name,
        casts.image,
        schedules.start,
        schedules.end,
        date_format(schedules.start,\"%m/%d\") as day
    from
        schedules
    join
      casts
    on
        schedules.cast_id = casts.id
    where
        start between CURRENT_DATE() AND DATE_ADD(CURRENT_DATE(),INTERVAL 1 WEEK)");

        $calendar = DB::select("SELECT date_format(date_add(CURDATE(), interval tmp.generate_series - 1 day), '%Y-%m-%d') as ymd, date_format(date_add(CURDATE(), interval tmp.generate_series - 1 day), '%m/%d') as md, CASE dayofweek(date_format(date_add(CURDATE(), interval tmp.generate_series - 1 day), '%Y-%m-%d')) WHEN 1 THEN '日' WHEN 2 THEN '月' WHEN 3 THEN '火' WHEN 4 THEN '水' WHEN 5 THEN '木' WHEN 6 THEN '金' WHEN 7 THEN '土' END as week FROM ( SELECT 0 generate_series FROM DUAL WHERE (@num := 1 - 1) * 0 UNION ALL SELECT @num := @num + 1 FROM `information_schema`.COLUMNS LIMIT 7 ) as tmp ;");

        return view('home',compact('cast','calendar'));
    }
}
