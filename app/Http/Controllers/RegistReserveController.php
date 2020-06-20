<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotification;
use Illuminate\Support\Facades\Auth;



class RegistReserveController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $cast_id = $_POST["cast_id"];

        //dd(strtotime(date('Y-m-d H:i:s', $_POST["start"])));
        $start = date('Y-m-d H:i:s', $_POST["start"]);
        $user_id = Auth::id();
        $course = $_POST["course"];
        $delivery = $_POST["delivery"];
        $place = $_POST["place"];
        $address = $_POST["address"];
        $appoint = $_POST["appoint"];        
        $timestamp = date('Y-m-d H:i:s', time());

        $sql = "insert into reserves values(null,{$user_id},{$cast_id},{$appoint},'{$start}',{$course},{$delivery},\"{$place}\",\"{$address}\",'{$timestamp}','{$timestamp}')";

        DB::insert($sql);


        $cast = DB::select("select name from casts where id = {$cast_id}");

        $appoint = DB::select("select name from appoint_fees where id = {$appoint}");

        $corse = DB::select("select name from corses where id = {$course}");

        $delivery = DB::select("select name from deliveries where id = {$delivery}");

        $user_data = Auth::user();

        //dd($user_data->name);
        $name = $user_data->name;



        $to = $user_data->email;
        Mail::to($to)->send(new MailNotification($name,$cast,$appoint,$corse,$delivery,$start,$place,$address));

        return redirect('/comp');
    }

    public function comp(){
        return view('regist_reserve');
    }



    public function MailNotification(){
        
        $name = '予約システム';
        $text = 'これからもよろしくお願いいたします。';

        $cast = DB::select("select name from casts where id = {$cast_id}");

        $to = 'ktwriter43@gmail.com';
        Mail::to($to)->send(new MailNotification($name, $text,$cast));
    }  
}
