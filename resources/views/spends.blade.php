@extends('layout')

@section('title', 'パーツ支出一覧')

@section('content')

<div class="main">
        <h2>パーツ支出一覧</h2>
        <p></p>
         {!! $spends->render() !!}
         
<table class="table table-sm table-hover">
    <tr>
        <th>日付</th><th>分類名</th><th>パーツ名</th><th>用途</th><th>数量</th><th>購入店</th><th>購入価格</th><th>削除</th>
    </tr>     
    
    @foreach ($spends as $spend)
        @if($spend->user_id === $login_user_id)
                <tr>
                    <td><strong>{{ $spend->date }}</strong></td>
                    <td>{{$spend->genru->name }}</td>
                    <td><strong>{{ $spend->part->name }}</strong></td>
                    <td><strong>{{ $spend->which }}:</strong>{{$spend->purpose}}</td>
                    <td>{{ $spend->amount }}{{$spend->part->unit}}</td>
                    <td>{{$spend->shop}}</td>
                    <td>{{$spend->price}}</td>
                    <td><a href="{{action('SpendController@delete', ['id' => $spend->id])}}" class="badge badge-info btn-dell">削除</a></td>
                 </tr>
                 @isset($part->other)
                <tr>
                    <td colspan="8">{{ $spend->other }}</td>
                </tr>
                @endisset
        @endif
    @endforeach
    </table>
    
 {!! $spends->render() !!}
 </div>
@endsection