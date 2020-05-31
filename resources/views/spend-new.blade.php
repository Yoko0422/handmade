@extends('layout')

@section('content')
<div class="main">
    
<h2>パーツ使用/購入記録</h2>

<form action="part" method="post">
<div class="form-group">
<label for="comment_1">パーツ名</label>
<input type="text" class="form-control" name="name">
<label for="comment_1">価格</label>
<input type="text" class="form-control" name="price">
<label for="comment_1">個数</label>
<input type="text" class="form-control" name="value">
<label for="comment_1">店名</label>
<input type="text" class="form-control" name="shop">
<label for="comment_1">備考</label>
<input type="text" rows="2" class="form-control" name="other">
</div>
<button type="submit">パーツ登録</button>
</form>
    
</div>
@endsection