@extends('layouts.app')

@section('content')
<div class="container" id="priceTable">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">予約</div>
                <div>
                    <h2 style="color:red;text-align:right;font-weight:bold;">@{{sumPrice}}円</h2>
                </div>
            <form action="/regist_reserve" method="POST">
            <table class="table table-bordered table-striped">
            {{ csrf_field() }}
                <tr>
                    <th>キャスト</th>
                    <td>{{$cast[0]->name}}</td>
                    <input type="hidden" name="cast_id" value="{{$cast[0]->id}}">
                </tr>
                <tr>
                    <th>ネット指名or本指名</th>
                    <td>
                        <select id="appoint" name="appoint" v-model="appointSelected">
                            <option v-for="(item,i) in appoint" :value="i">@{{item['name']}}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>キャストのランク</th>
                    <td>
                        <select id="cast_rank" name="cast_rank" v-model="rankSelected">
                            <option v-for="(item,i) in rank" :value="i">@{{item['name']}}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>予約日</th>
                    <td>{{date("m/d",$datetime)}}</td>
                    <input type="hidden" name="start" value="{{$datetime}}">
                </tr>
                <tr>
                    <th>開始時間</th>
                    <td>{{date("H:i",$datetime)}}</td>
                </tr>
                <tr>
                    <th>コース</th>
                    <td>
                        <select id="corse" name="course" v-model="courceSelected">
                            <option v-for="(item,i) in cource" :value="i">@{{item['name']}}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>派遣地域</th>
                    <td>
                        <select id="delivery" name="delivery" v-model="carfareSelected">
                            <option v-for="(item,i) in carfare" :value="i">@{{item['name']}}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>自宅orホテル</th>
                    <td>
                        <select id="place" name="place">
                            <option value="自宅">自宅</option>
                            <option value="ホテル">ホテル</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>自宅住所orホテル名</th>
                    <td>
                        <input type="text" id="address" name="address">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                    <input type="submit" class="btn btn-primary" value="予約する">
                    </td>
                </tr>
            </table>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
new Vue({
  el : "#priceTable",
  data :{
    appoint : {!! $appoints !!},
    cource : {!! $corses !!},
    rank : {!! $cast_rank !!},
    carfare : {!! $deliveries !!},
    appointSelected : 0,
    courceSelected : 0,
    rankSelected : 0,
    carfareSelected : 0
  },
  computed : {
    sumPrice: function(){
      return (
        parseInt(this.appoint[ this.appointSelected|0 ]['price']) +
        parseInt(this.cource[ this.courceSelected|0 ]['price']) +
        parseInt(this.rank[ this.rankSelected|0 ]['price']) +
        parseInt(this.carfare[ this.carfareSelected|0 ]['price']) )
    }
  }
});

</script>
@endsection
