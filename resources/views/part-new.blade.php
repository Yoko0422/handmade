@extends('layout')

@section('title', 'パーツ登録')

@section('content')
<div class="main">

<h2>パーツ登録</h2>
<p>　</p>
<form action="{{ action('PartController@store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="row">
    <div class="col-sm-1">
    <label>分類</label>
    </div>
    <div class="col-sm-5">
           <input type="text" name="genru" list="genrus" placeholder="テキスト入力or選択" autocomplete="off" value="{{ old('genru') }}">
            <datalist id="genrus">
            <select name="genru_name">
            @foreach($genrus as $genru)
            <option value="{{$genru->name}}">{{$genru->name}}</option>
            @endforeach
            </select>
            </datalist>
    </div>
    <div class="col-sm-3">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>パーツ名</label>
    </div>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>価格</label>
    </div>
    <div class="col-sm-2">
        <input type="number" class="form-control" name="price"  value="{{ old('price') }}">
    </div>
    <div class="col-sm-1">
    <label>　内容量</label>
    </div>
    <div class="col-sm-2">
     <input type="number" class="form-control" name="value" value="{{ old('value') }}">
    </div>
<div class="col-sm-1">　　単位</div>
    <div class="col-sm-2">
    <select class="custom-select my-1 mr-sm-2" name="unit">
        <option value='個'>個</option>
        <option value='本'>本</option>
        <option value='枚'>枚</option>
        <option value='cm'>cm</option>
        <option value='m'>m</option>
        <option value='g'>g</option>
        <option value='kg'>kg</option>
        <option value='cc'>cc</option>
      </select>
      </div>
</div>

<p>　</p>
<div class="row">
<div class="col-sm-1">
<label>店名</label>
</div>
<div class="col-sm-8">
    <input type="text" class="form-control" name="shop" value="{{ old('shop') }}">
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
<div>
</div>

</div>

 @endsection
