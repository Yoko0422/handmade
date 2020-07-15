@extends('layout')

@section('title', 'パーツ一覧')

@section('content')

<div class="main">
        <h2>パーツ一覧</h2>
        <p></p>
         {!! $parts->render() !!}
         
<table class="table table-sm table-hover">
    <tr>
        <th scope="col">分類名</th>
        <th scope="col">パーツ名</th>
        <th scope="col">価格@内容量</th>
        <th scope="col">単価</th>
        <th scope="col">在庫数</th>
        <th scope="col">購入店</th>
        <th scope="col">編集/削除</th>
    </tr>
    
        @foreach ($parts as $part)
            @if($part->user_id === $login_user_id)
            <tr>
                <td>{{$part->genru->name }}</td>
                <td><strong>{{ $part->name }}</strong></td>
                <td>￥{{ $part->price }} @ {{ $part->value }} {{ $part->unit }}</td>
                <td>￥{{ number_format($part->bit, 1) }} @ {{ $part->unit}}</td> <!--価格＠個数-->
                <td>
                @if(isset($part->stock))
                    {{ $part->stock->stock }} <!--在庫数-->
                @endif
                {{ $part->unit }}</td>
                <td>{{ $part->shop }}</td> <!--単価-->
                <td>
                    <a href="{{ action('PartController@update', ['id' => $part->id]) }}" class="badge badge-info">編集</a>
                    <a href="{{ action('PartController@delete', ['id' => $part->id]) }}" class="badge badge-info btn-dell">削除</a>
                </td>
            </tr>
            @isset($part->other)
            <tr>
                <td colspan="7">{{ $part->other }}</td>
            </tr>
            @endisset
            @endif
        @endforeach
</table>

    <div class="row">
        <div class="col-sm-9">
            {!! $parts->render() !!}
        </div>
        <div class="col-sm-3">
         
        </div>
    </div>
      
</div>

@endsection