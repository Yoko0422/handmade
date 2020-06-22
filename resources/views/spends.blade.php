@extends('layout')

@section('title', 'パーツ支出記録')

@section('content')
<div class="main">
        <h2>パーツ支出記録</h2>
        <p></p>
         {!! $spends->render() !!}
    @foreach ($spends as $spend)
    <table class="table" border=1>
        <tr>
            <td>{{ $spend->id }}</td>
            <td>{{ $spend->part->name }}</td>
            <td>{{ $spend->date }}</td>
            <td>{{ $spend->which }}</td>
            <td>{{ $spend->amount }}</td>
            <td>{{ $spend->purpose }}</td>
        </tr>
        <tr>
            <td> </td>
            <td colspam="4">備考：</td>
           <td>
            編集
           ｜
            削除
            </td>
        </tr>
    </table>
    <p>　</p>
    @endforeach
 {!! $spends->render() !!}
 </div>
@endsection