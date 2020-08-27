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
                    <label>{{$genru->name}}</label>
                </div>
                <div>
                     <input type="text" class="form-control sm" name="name" value="{{ $genru->name }}">
                </div>
                <p> </p>
                <div>
                    <button type="submit" class="btn btn-outline-dark">分類名編集</button>
                </div>
            </form>
                    
        </div>
    </div>
</div>

 @endsection
