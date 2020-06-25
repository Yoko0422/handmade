@extends('layout')

@section('title', 'パーツ支出記録')

@section('content')
<div class="main">
        <h2>パーツ支出記録</h2>
        <p></p>
         {!! $spends->render() !!}
    @foreach ($spends as $spend)
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
            編集
           ｜
            削除
            </td>
        </tr>
    </table>
    <hr>
    <p>　</p>
    @endforeach
 {!! $spends->render() !!}
 </div>
@endsection