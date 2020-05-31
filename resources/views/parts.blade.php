@extends('layout')

@section('title', 'パーツ一覧')

@section('content')
<div class="main">
    
    <h2>パーツ一覧</h2>
    <p></p>
<table>
    <tr>
        <th>番号</th><th>パーツ名</th><th>価格</th><th>個数</th><th>単価</th><th>在庫数</th><th>購入店</th><th>備考</th>
    </tr>
    <tr>
        @foreach ($parts as $part)
        <td>{{ $part->id }}</td>,
        <td>{{ $part->name }}</td>,
        <td>{{ $part->price }}</td>,
        <td>{{ $part->value }}</td>
        <td>{{ $part->bit }}</td>
　　    <td>{{ $part->stock }}</td>
        <td>{{ $part->shop }}</td>
        <td>{{ $part->other }}</td> 
       @endforeach
   </tr>
</table>

@foreach ($parts as $part)
<div class="row">

    <div class="col-sm-1">
        No.{{ $part->id }} //ID
    </div>
    <div class="col-sm-4">
        <strong>{{ $part->name }}</strong> //パーツ名
    </div>
    <div class="col-sm-2">
        ￥{{ $part->price }}-　//価格
        </div>
    <div class="col-sm-2">
       {{ $part->value }} {{ $part->unit }}　//個数　単位
    </div>
    </div>

<div class="row">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-4">
        <strong></strong>
    </div>
    <div class="col-sm-2">
       単価：{{ $part->bit }}＠{{ $part->unit }} //単価＠単位
    </div>
    <div class="col-sm-2">
        在庫数：{{ $part->stock }}　//在庫数
    </div>
</div>

<div class="row">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-1">
        <strong>備考：</strong>
    </div>
    <div class="col-sm-7">
        {{ $part->other }}　//備考欄
    </div>
    
</div>
@endforeach


</div>
@endsection