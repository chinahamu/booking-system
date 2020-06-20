@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">空き状況</div>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th colspan="2" style="text-align:center">{{$cast[0]->day}}</th>
                    </tr>
                    @foreach($time_zone as $time)
                     <?php //dd($time) ?>
                     @if($time > time()+32400 && !isset($reserve_zone[$time]))
                    <tr>
                        <td>{{date("H:i",$time)}}</td>
                        <td style="text-align:center"><a href="/reserve?cast_id={{$cast[0]->cast_id}}&datetime={{$time}}">○</a></td>
                    </tr>
                     @else
                     <tr>
                        <td>{{date("H:i",$time)}}</td>
                        <td style="text-align:center">×</td>
                    </tr>
                     @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
