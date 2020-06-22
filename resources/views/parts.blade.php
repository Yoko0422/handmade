@extends('layout')

@section('title', 'パーツ一覧')

@section('content')
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

<table class="table">
    
    <tr>
        <td width="500">{{ $part->genru }}<br><strong><font size="5">{{ $part->name }}</font></strong></td>
        <td width="150"><strong>価格：</strong><br>￥{{ $part->price }} @ {{ $part->value }} {{ $part->unit }}</td>
        <td width="120"><strong>単価：</strong><br>￥{{ number_format($part->bit, 1) }} @ {{ $part->unit}}</td> <!--価格＠個数-->
        <td width="120"><strong>在庫数：</strong><br>{{ $part->stock->stock }} {{ $part->unit }}</td>
        <td width="200" colspan="2"><strong>店名：</strong><br>{{ $part->shop }}</td> <!--単価-->
    </tr>
    
    <tr>
        <td colspan="4"><strong>備考：</strong>{{ $part->other }}</td>
        <td><a href="{{ action('PartController@edit', ['id' => $part->id]) }}" class="nav-item nav-link disactive">編集</a></td>
        <td><a href="{{ action('PartController@delete', ['id' => $part->id]) }}" class="nav-item nav-link disactive">削除</a></td>
    </tr>
    
</table>

<p>　</p>

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