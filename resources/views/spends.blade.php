@extends('layout')

@section('title', 'パーツ支出記録')

@section('content')

    <body>
        <h2>パーツ支出記録</h2>
        <p></p>
<table>
    <tr>
        <th>番号</th><th>パーツ名</th><th>使用/購入</th><th>個数</th><th>日付</th><th>用途</th><th>備考</th>
    </tr>
    <tr>
        @foreach ($spends as $spend)
        <td>{{ $spend->id }}</td>,
        <td>{{ $spend->part->name }}</td>,
        <td>{{ $spend->which }}</td>,
        <td>{{ $spend->value }}</td>,
        <td>{{ $spend->date }}</td>,
        <td>{{ $spend->purpose }}</td>,
        <td>{{ $spend->other }}</td> 
       @endforeach
   </tr>
</table>
    </body>

@endsection