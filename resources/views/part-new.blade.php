@extends('layout')

@section('title', 'パーツ登録')

@section('content')
<div class="main">

<h2>パーツ登録</h2>
<p>　</p>
<form action="{{ action('PartController@store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="row">
    <div class="offset-sm-2 col-sm-5">
        
        <div><strong>分類名</strong></div>
        <div class="form-margin">
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
    
        <p> </p>
        
        <div><strong>パーツ名</strong></div>
        <div class="form-margin">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off">
        </div>

        <p> </p>
        
        <div><strong>価格</strong></div>
        <div class="form-margin">
           <input type="number" class="form-control" name="price"  value="{{ old('price') }}">
        </div>
        
        <p> </p>
        
        <div><strong>内容量</strong></div>
        <div class="form-margin">
            <input type="number" class="form-control" name="value" value="{{ old('value') }}">
        </div>
        
        <p> </p>
        
        <div><strong>単位</strong></div>
        <div>
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
        
        <p> </p>
        
        <div>店名</div>
        <div>
           <input type="text" class="form-control" name="shop" value="{{ old('shop') }}">
        </div>
        
        <p> </p>
        
        <div><strong>備考</strong></div>
        <div>
           <textarea class="form-control" name="other" rows="3" value="{{ old('other') }}"></textarea>
        </div>


<p>　</p>

<div>
    
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
