@extends('layout')

@section('title', 'パーツ使用/購入記録登録')

@section('content')
<div class="main">
    
<h2>パーツ使用/購入記録を登録する</h2>
<p>　</p>

<form action="{{ action('SpendController@store') }}" method="post" enctype="multipart/form-data">

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
     <select class="select">
      <option>全て</option>
      //
    </select>
<script>
    $('.select').on('change', function(){
  // テキストを取得(例：北海道)
  var pname = $(this).children(':selected').text();

  $('.pname').each(function(){
    // 全て非表示にする(初期化)
    $(this).addClass('hide');

    // '全て'が選択されていれば
    if(pname == '全て'){
      // 表示する
      $(this).removeClass('hide');

    // テキスト(例：北海道)が一致していれば
    }else if($(this).html().match(pname)){
      // 表示する
      $(this).removeClass('hide');
    }
  });
});
</script>
    </div>
</div>

<p>　</p>

<div class="row">
    <div class="col-sm-2">
     {{ Form::label('name', 'パーツ名') }}
    </div>
    <div class="col-sm-4">
    {{ Form::select('array_values(part_id)', $array_part, ['class' => 'pname'])}}
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
       <script>
       $(function(){
           $('select').change(function() {
              const part = @json($part);
              var extraction_val = $('select').val();
              console.log(part[extraction_val]);
                if(extraction_val == 'part_id') {
                    $('part_id').css('display', 'block');
                }
                 console.log (part);
           });
        });
       </script>
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