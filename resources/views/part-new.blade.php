@extends('layout')

@section('content')
<div class="main">
    
<h2>パーツ登録</h2>

<form action="index" method="post" enctype="multipart/form-data">

<div class="row">
    <div class="col-sm-1">
    <label>パーツ名</label>
    </div>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="name">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>価格　￥</label>
    </div>
    <div class="col-sm="1">
        <input type="text" class="form-control" name="price">
    </div>
    <div class="col-sm-1">
    <label>　　個数</label>
    </div>
    <div class="col-sm-"1">
     <input type="text" class="form-control" name="name">
    </div>
<div class="col-sm-1">　　単位</div>
    <div class="col-sm-１">
    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
        <option selected>－SELECT-</option>
        <option value="1">個</option>
        <option value="2">本</option>
        <option value="3">枚</option>
        <option value="1">cm</option>
        <option value="2">m</option>
        <option value="3">g</option>
        <option value="1">kg</option>
        <option value="2">cc</option>
      </select>
      </div>
</div>

<p>　</p>
<div class="row">
<div class="col-sm-1">
<label>店名</label>
</div>
<div class="col-sm-8">
<input type="text" class="form-control" name="name">
</div>
</div>
<p>　</p>
<div class="row">
<div class="col-sm-1">
<label>備考</label>
</div>
<div class="col-sm-8">
<input type="text" class="form-control" name="name" cols="3">
</div>
</div>

{{ csrf_field() }}
<button type="submit">パーツ登録</button>
</form>

</div>
 @endsection
