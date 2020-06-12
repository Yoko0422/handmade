@extends('layout')

@section('content')
<div class="main">

<h2>パーツ情報編集</h2>
<p>　</p>
<form action="{{ action('PartController@edit') }}" method="post" enctype="multipart/form-data">

<div class="row">
    <div class="col-sm-1">
    <label>分類</label>
    </div>
    <div class="col-sm-3">
    <select class="custom-select my-1 mr-sm-2" name="genru" value="{{ old('genru') }}">
        <option value='布'>布</option>
        <option value='メタル'>メタル</option>
      </select>
    </div>
    <div class="col-sm-5"></div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>パーツ名</label>
    </div>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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
<label>販売店</label>
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
<div>
</div>

</div>

 @endsection
