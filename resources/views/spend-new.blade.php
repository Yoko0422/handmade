@extends('layout')

@section('title', 'パーツ使用/購入記録登録')

@section('content')
<div class="main">
    
<h2>パーツ使用/購入記録を登録する</h2>
<p>　</p>

<form action="{{ action('SpendController@store') }}" method="post" enctype="multipart/form-data">

<div class="row">
    <div class="col-sm-1">
    <label>日付</label>
    </div>
    <div class="col-sm-8">
     <input type="date" name="date"></input>
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
     {{ Form::label('name', '購入/消費') }}
    </div>
    <div class="col-sm-6">
        {{ Form::radio('which', '購入', false, ['id' => 'radio-one', 'class' => 'form-check-input']) }}購入
        
        {{ Form::radio('which', '消費', false, ['id' => 'radio-two', 'class' => 'form-check-input']) }}消費
    </div>
    <div class="col-sm-2">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
     {{ Form::label('name', 'パーツ名') }}
    </div>
    <div class="col-sm-4">
    {{ Form::select('array_values(parts_id)', $parts) }}
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
{{ csrf_field() }}
<div class="row">
    <div class="col-sm-7">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    <div class="col-sm-2">
    <button type="submit">パーツ登録</button>
    </div>
</div>
</form>

</div>

@endsection