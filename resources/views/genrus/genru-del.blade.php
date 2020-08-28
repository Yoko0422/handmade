@extends('g-layout')

@section('title', '分類名一覧')

@section('content')

<div class="container main">
    <div class="row">
        <div class="offset-sm-6 col-sm-5">
            
            <form action="{{ action('GenruController@edit') }}" method="post" enctype="multipart/form-data" target="_top">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $genru->id }}">
                <div>
                    <strong>{{$genru->name}}</strong>
                </div>
                <p> </p>
                <div>上記の分類名を削除すると、関連するパーツ情報とパーツ支出情報も削除されます。</div>
                <div>削除を実行してもよろしいですか？</div>
                <p> </p>
                <div>
                    <a href="{{ action('GenruController@delete', ['id' => $genru->id]) }}" class="btn btn-outline-dark" target="_top">削除する</a>
                </div>
            </form>
                    
        </div>
    </div>
</div>

 @endsection
