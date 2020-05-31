@extends('layout')

@section('content')
<div class="main">
    
<h2>パーツ登録</h2>
<p>　</p>
<form action="{{ action('PartController@pstore') }}" method="post" enctype="multipart/form-data">

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
    <label>価格</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="price">
    </div>
    <div class="col-sm-1">
    <label>　　個数</label>
    </div>
    <div class="col-sm-2">
     <input type="text" class="form-control" name="value">
    </div>
<div class="col-sm-1">　　単位</div>
    <div class="col-sm-2">
    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="unit">
        <option selected>－SELECT-</option>
        <option value="1">個</option>
        <option value="2">本</option>
        <option value="3">枚</option>
        <option value="4">cm</option>
        <option value="5">m</option>
        <option value="6">g</option>
        <option value="7">kg</option>
        <option value="8">cc</option>
      </select>
      </div>
</div>

<p>　</p>
<div class="row">
<div class="col-sm-1">
<label>店名</label>
</div>
<div class="col-sm-8">
<input type="text" class="form-control" name="shop">
</div>
</div>
<p>　</p>
<div class="row">
<div class="col-sm-1">
<label>備考</label>
</div>
<div class="col-sm-8">
<textarea class="form-control" name="other" rows="3"></textarea>
</div>
</div>
<p>　</p>
{{ csrf_field() }}
<div class="row">
    <div class="col-sm-8">
        
    </div>
    <div class="col-sm-1"></div>
    <button type="submit">パーツ登録</button>
    </div>
</div>
</form>

</div>
 @endsection
