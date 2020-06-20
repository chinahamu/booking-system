<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CalendarController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $day = $_GET['day'];
        $cast_id = $_GET['cast_id'];

        $day = str_replace("/","-",date("Y")."/".$day);

        $sql = "select casts.id,casts.name,casts.image,schedules.*,date_format(schedules.start,\"%m/%d\") as day";
        $sql .= " from schedules join casts on schedules.cast_id = casts.id";
        $sql .= " where date_format(schedules.start,\"%Y-%m-%d\") =\"".$day."\" and casts.id = ".$cast_id;

        //dd($sql);

        $cast = DB::select($sql);

        // 1つ目の時刻
        $timestamp = strtotime($cast[0]->start);
        // 2つ目の時刻
        $timestamp2 = strtotime($cast[0]->end);

        $sql = "select start, name from reserves join corses on  reserves.corse_id = corses.id where date_format(reserves.start,\"%Y-%m-%d\") =\"".$day."\" and reserves.cast_id = ".$cast_id." order by start ASC";

        $reserves = DB::select($sql);

        //dd($reserves);

        $reserve_range = array();
        foreach ($reserves as $key => $reserve) {
            $reserve_range[$key]["start"] = strtotime($reserve->start);
            $reserve_range[$key]["end"] = strtotime($reserve->start)+str_replace("分","",$reserve->name)*60;
        }

        $j = 0;
        $time_zone = array();
        for ($i=$timestamp; $i < $timestamp2 ; $i = $i + 1800) {
            $time_zone[] = $i;
        }

        $reserve_zone = array();
        foreach($reserve_range as $res){
             for ($i=$res["start"]; $i < $res["end"] ; $i = $i + 1800) { 
                 $reserve_zone[$i] = $i;
            }
        }

        //dd($reserve_zone);



        return view('calendar',compact("cast","time_zone","reserve_zone"));
    }
}
