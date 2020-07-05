@extends('layout')

@section('title', 'パーツ使用/購入記録登録')

@section('content')
<div class="main">
    
<script>
document.addEventListener("DOMContentLoaded", function(){
    // 初期値が設定されている場合は最上位を選択させない
    var firstChange = ($("#subcategory").val() == "");

    $("#maincategory").on("change",function(){
        if(firstChange){
            // 最上位を選択（現在選択項目を解除）
            $("#subcategory option[value='']").prop('selected',true);
        }
        firstChange = true;

        $("#subcategory option").hide();
        $("#subcategory option[data-category='']").show();
        $("#subcategory option[data-category=\"" + this.value + "\"]").show();
    }).change();
});
</script>


<h2>パーツ使用/購入記録を登録する</h2>
<p>　</p>

<form action="{{ action('SpendController@store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}


<div class="row">
    <div class="col-sm-2">
    <label><strong>日付</strong></label>
    </div>
    <div class="col-sm-8">
     <input type="date" name="date" value="{{ old('date') }}"></input>
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-2">
     <label><strong>購入/消費</strong></label>
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
    <label><strong>分類名</strong></label>
    </div>
    <div class="col-sm-8">
        <select name="genru_id" id="maincategory">
            <option value="" data-category="">-------------------</option>
            @foreach($array_genrus as $array_genru)
                @if($array_genru->user_id === $login_user_id)
                    <option value="{{$array_genru->id}}">{{$array_genru->name}}</option>
                @endif
            @endforeach
            </select>
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-2">
      <label><strong>パーツ名</strong></label>
    </div>
    <div class="col-sm-4">
       <select name="part_id" id="subcategory">
            <option value="" data-category="">-------------------</option>
            @foreach($parts as $part)
                @if($part->user_id === $login_user_id)
                    <option value="{{$part->id}}" class="{{ $part->genru_id}}" data-category="{{$part->genru->id}}">{{$part->name}}</option>
               @endif
            @endforeach
            </select>
    </div>
    <div class="col-sm-4">
    </div>
</div>

<p>　</p>

<div class="row">
    
    <div class="col-sm-1">
    <label><strong>数量</strong></label>
    </div>
    <div class="col-sm-2">
     <input type="number" class="form-control" name="amount" value="{{ old('amount') }}">
    </div>
    
    <div class="col-sm-1">
    <label>購入価格</label>
    </div>
    <div class="col-sm-2">
      <input type="number" class="form-control" name="price" value="{{ old('price') }}">
    </div>
    
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>購入店</label>
    </div>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="shop" value="{{ old('shop') }}">
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-1">
    <label>目的</label>
    </div>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="purpose" value="{{ old('purpose') }}">
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