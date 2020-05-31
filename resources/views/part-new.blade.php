@extends('layout')

@section('content')
    <h2>パーツ登録</h2>

<form action="index" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-sm-12">
<label for="comment_1">パーツ名</label>
<input type="text" class="form-control" name="name">
</div>
</div>
<label for="comment_1">価格</label>
<input type="text" class="form-control" name="price">
<label for="comment_1">個数</label>
<input type="text" class="form-control" name="value">
<label for="comment_1">店名</label>
<input type="text" class="form-control" name="shop">
<label for="comment_1">備考</label>
<input type="text" rows="2" class="form-control" name="other">
{{ csrf_field() }}
<button type="submit">パーツ登録</button>
</form>
</div>
 @endsection
