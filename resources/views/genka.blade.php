@extends('layout')

@section('title', '原価計算')

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

<form action="{{ action('GenkaController@store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}


<p>  </p>

<div class="row">
    <div class="col-sm-2">
    <label>分類</label>
    </div>
    <div class="col-sm-8">
         {{Form::select('genru_id', $array_genru, null, ['id' => 'maincategory'])}}
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-2">
     {{ Form::label('name', 'パーツ名') }}
    </div>
    <div class="col-sm-4">
       <select name="part_id" id="subcategory">
            <option value="" data-category="">-------------------</option>
            @foreach($parts as $part)
            <option value="{{$part->id}}" class="{{ $part->genru_id}}" data-category="{{$part->genru->id}}">{{$part->name}}</option>
            @endforeach
            </select>
    </div>
    <div class="col-sm-4">
    </div>
</div>


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