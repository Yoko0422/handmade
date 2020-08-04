@extends('layout')

@section('title', 'パーツ登録')

@section('content')
<div class="main">

<h2>パーツ登録</h2>
<p>　</p>
<form action="{{ action('PartController@store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}




<table class="table table-sm">
<tr>
    <th>分類名</th>
    <td colspan="4">
        <input type="text" name="genru" list="genrus" placeholder="テキスト入力or選択" autocomplete="off" value="{{ old('genru') }}">
        <datalist id="genrus">
        <select name="genru_name">
        @foreach($genrus as $genru)
        @if($genru->user_id === $login_user_id)
        <option value="{{$genru->name}}">{{$genru->name}}</option>
        @endif
        @endforeach
        </select>
        </datalist>
    </td>
</tr>

<tr>
    <th>パーツ名</th>
    <td colspan="2">
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off">
    </td>
</tr>

<tr>
    <th>価格</th>
    <td>
         <input type="number" class="form-control" name="price"  value="{{ old('price') }}">
    </td>
    <th>内容量</th>
    <td>
         <input type="number" class="form-control" name="value" value="{{ old('value') }}">
    </td>
    <th>単位</th>
    <td>
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
    </td>
</tr>

<tr>
    <th>店名</th>
    <td colspan="4">
         <input type="text" class="form-control" name="shop" value="{{ old('shop') }}">
    </td>
</tr>

<tr>
    <th>備考</th>
    <td colspan="4">
        <textarea class="form-control" name="other" rows="3" value="{{ old('other') }}"></textarea>
    </td>
</tr>
</table>


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






<div class="row">
    <div class="col-sm-1">
    <label><strong>分類名</strong></label>
    </div>
    <div class="col-sm-8">
           <input type="text" name="genru" list="genrus" placeholder="テキスト入力or選択" autocomplete="off" value="{{ old('genru') }}">
            <datalist id="genrus">
            <select name="genru_name">
            @foreach($genrus as $genru)
             @if($genru->user_id === $login_user_id)
            <option value="{{$genru->name}}">{{$genru->name}}</option>
             @endif
            @endforeach
            </select>
            </datalist>
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label><strong>パーツ名</strong></label>
    </div>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label><strong>価格</strong></label>
    </div>
    <div class="col-sm-2">
        <input type="number" class="form-control" name="price"  value="{{ old('price') }}">
    </div>
    <div class="col-sm-1">
    <label><strong>　内容量</strong></label>
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
