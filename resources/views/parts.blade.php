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
        <td width="500">{{$part->genru->name }}<br><strong><font size="5">{{ $part->name }}</font></strong></td>
        <td width="150"><strong>価格：</strong><br>￥{{ $part->price }} @ {{ $part->value }} {{ $part->unit }}</td>
        <td width="120"><strong>単価：</strong><br>￥{{ number_format($part->bit, 1) }} @ {{ $part->unit}}</td> <!--価格＠個数-->
        <td width="120"><strong>在庫数：</strong><br>{{ $part->stock->stock }} {{ $part->unit }}</td>
        <td width="200"><strong>店名：</strong><br>{{ $part->shop }}</td> <!--単価-->
        <td>
            <div class="btn-group-vertical">
                {{ Form::submit('編集', ['class' => 'btn btn-outline-dark"']) }}
                {{ Form::submit('削除', ['class' => 'btn btn-outline-dark'])}}
            </div>
        </td>
    </tr>
    
    <tr>
        <td colspan="6">{{ $part->other }}</td>
    </tr>
    
</table>

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