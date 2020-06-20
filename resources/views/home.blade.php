@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">出勤情報</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($calendar as $cal)
                        <?php $i=0; ?>
                        @foreach($cast as $c)
                            @if($cal->md == $c->day)
                                @if($i == 0)
                                 <h2 style="text-align:center" class="page-header">{{$cal->md}}({{$cal->week}})</h2>
                                <?php $i++;?>
                                @endif
                                 <div>
                                   <img alt="ロゴ" src={{ asset("uploads/$c->image") }} width="100px">
                                           {{$c->name}}
                                       <button type="button" onclick="location.href='/calendar?cast_id={{$c->id}}&day=<?php echo str_replace("/","-",$c->day) ?>'; return false;" class="btn btn-primary">空きを確認する</button>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
