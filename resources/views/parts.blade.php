@extends('layout')

@section('title', 'パーツ一覧')

@section('content')

<body>
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
    </body>
    
@endsection