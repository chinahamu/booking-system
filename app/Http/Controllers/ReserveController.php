<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReserveController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $cast_id = $_GET["cast_id"];
        $datetime = $_GET["datetime"];

        $sql = "select name,price";
        $sql .= " from corses";

        $corses = DB::select($sql);
        $corses = json_encode($corses);

        $sql = "select *";
        $sql .= " from deliveries";

        $deliveries = DB::select($sql);
        $deliveries = json_encode($deliveries);

        $sql = "select *";
        $sql .= " from casts where id=".$cast_id;

        $cast = DB::select($sql);

        $sql = "select *";
        $sql .= " from appoint_fees";

        $appoints = DB::select($sql);
        $appoints = json_encode($appoints);

        $sql = "select cast_ranks.name, cast_ranks.price from casts join cast_ranks on  casts.cast_rank_id = cast_ranks.id where casts.id =".$cast_id;
        
        $cast_rank = DB::select($sql);
        $cast_rank = json_encode($cast_rank);

        return view('reserve',compact("cast_id","datetime","corses","deliveries","cast","appoints","cast_rank"));
    }
}
