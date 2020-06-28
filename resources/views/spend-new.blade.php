@extends('layout')

@section('title', 'パーツ使用/購入記録登録')

@section('content')
<div class="main">
    

<h2>パーツ使用/購入記録を登録する</h2>
<p>　</p>

<form action="{{ action('SpendController@store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="row">
    <div class="col-sm-2">
    <label>日付</label>
    </div>
    <div class="col-sm-8">
     <input type="date" name="date"></input>
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-2">
     {{ Form::label('name', '購入/消費') }}
    </div>
    <div class="col-sm-1">
        {{ Form::radio('which', '購入', false, ['id' => 'radio-one', 'class' => 'form-check-input']) }}購入
    </div>
    <div class="col-sm-1">
        {{ Form::radio('which', '消費', false, ['id' => 'radio-two', 'class' => 'form-check-input']) }}消費
    </div>
    <div class="col-sm-6">
    </div>
</div>

<p>  </p>

<div class="row">
    <div class="col-sm-2">
    <label>分類</label>
    </div>
    <div class="col-sm-8">
         {{Form::select('genru_id)', $array_genru, ['id' => "select_genrus"]) }}
        <!--
        <select name="genru_id">
            <option>全て</option>
            @foreach($genrus as $genru)
            <option value="{{$genru->name}}">{{$genru->name}}</option>
            @endforeach
        </select>
        -->
    </div>
</div>


<p>　</p>

<div class="row">
    <div class="col-sm-2">
     {{ Form::label('name', 'パーツ名') }}
    </div>
    <div class="col-sm-4">
       <select name="genru_name">
            @foreach($parts as $part)
            <option value="{{$part->name}}" class="{{ $part->genru_id}}">{{$part->name}}</option>
            @endforeach
            </select>
    </div>
    <div class="col-sm-4">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>価格</label>
    </div>
    <div class="col-sm-2">
      
    </div>
    <div class="col-sm-1">
    <label>　個数</label>
    </div>
    <div class="col-sm-2">
     <input type="number" class="form-control" name="amount" value="{{ old('amount') }}">
    </div>
    <div class="col-sm-1">　　単位</div>
    <div class="col-sm-2">
    
      </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>購入店</label>
    </div>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="shop">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>目的</label>
    </div>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="purpose">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>備考</label>
    </div>
    <div class="col-sm-8">
    <textarea class="form-control" name="other" rows="3" value="{{ old('other') }}"></textarea>
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-7">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    <div class="col-sm-2">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="reset" class="btn btn-outline-dark">リセット</button>
            <button type="submit" class="btn btn-outline-dark">登録</button>
        </div>
    </div>
</div>
</form>

</div>

@endsection