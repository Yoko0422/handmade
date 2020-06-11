@extends('layout')

@section('title', 'パーツ一覧')

@section('content')
<div class="main">
    
    <h2>パーツ一覧</h2>
    <p>　</p>
    
@foreach ($parts as $part)

<table class="table">
    <tr>
        <td width="500"><br><strong><font size="5">{{ $part->name }}</font></strong></td>
        <td width="120">価格：<br>{{ $part->price }} @ {{ $part->unit }}</td>
        <td width="120">単価：<br>{{ $part->bit }} @ {{ $part->unit}}</td> <!--価格＠個数-->
        <td width="120">在庫数：<br>{{ $part->spend->value }} {{ $part->unit }}</td>
        <td>店名：<br>{{ $part->shop }}</td> <!--単価-->
    </tr>
    <tr>
        <td colspan="4"><strong>備考：</strong>{{ $part->other }}</td>
        <td><a class="nav-item nav-link disactive">編集</a>
        <a href="{{ action('PartController@delete', ['id' => $part->id]) }}">削除</a>
    </tr>
</table>
<p>　</p>

@endforeach

</div>
@endsection