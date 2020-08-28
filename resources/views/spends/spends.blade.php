@extends('layout')

@section('title', 'パーツ支出一覧')

@section('content')
<div class="container">

    <div class="main">
            <h2>パーツ支出一覧</h2>
            <p></p>
             {!! $spends->render() !!}
             
    <table class="table table-sm table-hover">
        <tr style="background-color:#badcad">
            <th>日付</th><th>分類名</th><th>パーツ名</th><th>用途</th><th>数量</th><th>購入店</th><th>購入価格</th><th>削除</th>
        </tr>     
        
        @foreach ($spends as $spend)
            @if($spend->user_id === $login_user_id)
                    <tr>
                        <td><strong>{{ $spend->date }}</strong></td>
                        
                        <td>
                             @if(mb_strlen($spend->genru->name) >= 20)
                                 <span class="sfont">{{ $spend->genru->name }}</span>
                             @else
                                {{ $spend->genru->name }}
                             @endif
                        </td>
                        
                        <td>
                            @if(mb_strlen($spend->part->name) >= 20)
                                 <span class="sfont">{{$spend->part->name }}</span>
                             @else
                                {{ $spend->part->name }}
                             @endif
                        </td>
                        
                        <td>
                            <strong>{{ $spend->which }}:</strong>
                            @if(mb_strlen($spend->purpose) >= 10)
                                 <span class="sfont">{{$spend->purpose }}</span>
                             @else
                                {{ $spend->purpose }}
                             @endif
                        </td>
                        
                        <td>{{ $spend->amount }}{{$spend->part->unit}}</td>
                        
                        <td>
                            @if(mb_strlen($spend->shop) >= 10)
                                 <span class="sfont">{{$spend->shop }}</span>
                             @else
                                {{ $spend->shop }}
                             @endif
                        </td>
                        
                        <td>{{$spend->price}}</td>
                        <td><a href="{{action('SpendController@delete', ['id' => $spend->id])}}" class="badge badge-info btn-dell">削除</a></td>
                     </tr>
                     @isset($part->other)
                    <tr>
                        <td colspan="8"><span class="sfont">{{ $spend->other }}</span></td>
                    </tr>
                    @endisset
            @endif
        @endforeach
        </table>
        
     {!! $spends->render() !!}
     </div>
</div>

@endsection