@extends('layout')

@section('title', 'パーツ一覧')

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
    
    <h2>パーツ一覧</h2>
    <p>　</p>
    
    <div class="row">
        <div class="col-sm-9">
            {!! $parts->render() !!}
        </div>
        <div class="col-sm-3">
         
        </div>
    </div>
      
   
@foreach ($parts as $part)
@if($part->user_id === $login_user_id)
<table class="table">
    
    <tr>
        <td width="500">{{$part->genru->name }}<br><strong><font size="5">{{ $part->name }}</font></strong></td>
        <td width="150"><strong>価格@内容量：</strong><br>￥{{ $part->price }} @ {{ $part->value }} {{ $part->unit }}</td>
        <td width="120"><strong>単価：</strong><br>￥{{ number_format($part->bit, 1) }} @ {{ $part->unit}}</td> <!--価格＠個数-->
        <td width="120"><strong>在庫数：</strong><br>
        @if(isset($part->stock))
        {{ $part->stock->stock }}
        @endif
        {{ $part->unit }}</td>
        <td width="200"><strong>店名：</strong><br>{{ $part->shop }}</td> <!--単価-->
        <td width="100">
            <div class="btn-group-vertical">
                <a href="{{ action('PartController@update', ['id' => $part->id]) }}" class="badge badge-info">編集</a>　
                <a href="{{ action('PartController@delete', ['id' => $part->id]) }}" class="badge badge-info btn-dell">削除</a>
            </div>
        </td>
    </tr>
    
    <tr>
        <td colspan="6">{{ $part->other }}</td>
    </tr>
    
</table>
    @endif
@endforeach

    <div class="row">
        <div class="col-sm-9">
            {!! $parts->render() !!}
        </div>
        <div class="col-sm-3">
         
        </div>
    </div>
      
</div>

@endsection