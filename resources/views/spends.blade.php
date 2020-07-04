@extends('layout')

@section('title', 'パーツ支出記録')

@section('content')
<script>
  $(function(){
  $(".btn-dell").click(function(){
  if(confirm("削除してよろしいですか？")){
  //そのままsubmit（削除）
  }else{
  //cancel
  return false;
  }
  });
  });
  </script>

<div class="main">
        <h2>パーツ支出記録</h2>
        <p></p>
         {!! $spends->render() !!}
    @foreach ($spends as $spend)
        @if($spend->user_id === $login_user_id)
            <table class="table">
                <tr>
                    <td rowspan="2" width="150"><strong>{{ $spend->date }}</strong></td>
                    <td width="300">{{$spend->genru->name }}<br><strong>{{ $spend->part->name }}</strong></td>
                    <td><strong>{{ $spend->which }}:</strong>{{$spend->purpose}}</td>
                    <td width="120">{{ $spend->amount }}{{$spend->part->unit}}</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>備考：</strong>{{$spend->other}}</td>
                   <td>
                     <a href="{{ action('SpendController@delete', ['id' => $spend->id]) }}" class="badge badge-info btn-dell">削除</a>
                    </td>
                </tr>
            </table>
    <hr>
    <p>　</p>
        @endif
    @endforeach
 {!! $spends->render() !!}
 </div>
@endsection