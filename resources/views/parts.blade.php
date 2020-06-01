@extends('layout')

@section('title', 'パーツ一覧')

@section('content')
<div class="main">
    
    <h2>パーツ一覧</h2>
    <p></p>
    
@foreach ($parts as $part)

<table class="table">
    <tr>
        <td rowspan="2"><strong>No.{{ $part->id }}</strong></td> <!--番号-->
        <td rowspan ="2" colspan="2" width="50%"><strong><font size="5">{{ $part->name }}</font></strong></td>
        <td>{{ $part->price}} @ {{ $part->value }} {{ $part->unit }} 　| 　単価：@ {{ $part->unit }}</td> <!--価格＠個数-->
        <td rowspan="2">在庫数：<br>{{ $part->spend->value }}</td>
    </tr>
    <tr>
        <td>店名：</td> <!--単価-->
    </tr>
    <tr>
        <td> </td>
        <td colspan="3"><strong>備考：</strong>{{ $part->other }}</td>
        <td>
        編集
       ｜
        削除
        </td>
    </tr>
</table>
<p>　</p>

@endforeach

</div>
@endsection