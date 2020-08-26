@extends('layout')

@section('title', 'パーツ一覧')

@section('content')

<div class="container">
<div class="main">
        <h2>パーツ一覧</h2>
        <p></p>
         {!! $parts->render() !!}
         
<table class="table table-sm table-hover">
    <tr style="background-color:#badcad">
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
                <td>
                　@if(empty($part->genru->name))
                　未分類
                　@else
                      @if(mb_strlen($part->genru->name) >= 20)
                         <span class="sfont">{{ $part->genru->name }}</span>
                      @else
                            {{ $part->genru->name }}
                      @endif
                  @endif
                </td>
                
                <td>
                    @if(mb_strlen($part->name) >= 20)
                     <span class="sfont">{{ $part->name }}</span>
                    @else
                        <strong>{{ $part->name }}</strong>
                    @endif
                </td>
                
                <td>￥{{ $part->price }} @ {{ $part->value }} {{ $part->unit }}</td>
                
                <td>￥{{ number_format($part->bit, 1) }} @ {{ $part->unit}}</td> <!--価格＠個数-->
                
                <td><!--在庫数-->
                @if(isset($part->stock))
                    {{ $part->stock->stock }} 
                @endif
                {{ $part->unit }}
                </td>
                
                <td> <!--店名-->
                   @if(mb_strlen($part->shop) >= 10)
                     <span class="sfont">{{ $part->shop }}</span>
                    @else
                        {{ $part->shop }}
                    @endif 
                </td>
                
                <td>
                    <a href="{{ action('PartController@update', ['id' => $part->id]) }}" class="badge badge-info">編集</a>
                    <a href="{{ action('PartController@delete', ['id' => $part->id]) }}" class="badge badge-info btn-dell">削除</a>
                </td>
            
            </tr>
            @isset($part->other)
            <tr>
                <td colspan="7"><span class="sfont">{{ $part->other }}</span></td>
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
</div>

@endsection