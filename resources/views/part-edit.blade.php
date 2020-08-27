@extends('layout')

@section('title', 'パーツ情報編集')
@section('content')
<div class="container">
    <div class="row">
        <div class="offset-sm-2 col-sm-8 main">
 
            <div class="box30">
                
                <div class="box-title"><h2>パーツ情報編集</h2></div>
                
                <div>
                     @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                        <hr>
                </div>
                
                <div class="box">
                    <form action="{{ action('PartController@edit') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $part->id }}">
                   
                       <div><strong>分類名</strong><a href={{ route('genrus.list')}}>分類名を編集する</a></div>
                        <div class="form-margin">
                            <select name="genru" value="{{ $part->genru->name }}">
                                    @foreach($genrus as $genru)
                                        @if($genru->id == $part->genru_id)
                                            <option value="{{$genru->name}}" selected>{{$genru->name}}</option>
                                        @else
                                            <option value="{{$genru->name}}">{{$genru->name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                   
                        <div><strong>パーツ名</strong></div>
                        <div class="form-margin">
                             <input type="text" class="form-control lg" name="name" value="{{ $part->name }}">
                        </div>
                        
                        <div><strong>価格</strong></div>
                        <div class="form-margin">
                            <input type="number" class="form-control sm" name="price"  value="{{ $part->price }}">
                        </div>
                        
                         <div><strong>内容量</strong></div>
                        <div class="form-margin">
                            <input type="number" class="form-control sm" name="value" value="{{ $part->value }}">
                        </div>
                        
                        <div><strong>単位</strong></div>
                            <div class="form-margin">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="unit" value="個">
                                  <label class="form-check-label" for="inlineRadio1">個</label>
                                </div>
                                 <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="unit" value="本">
                                  <label class="form-check-label" for="inlineRadio1">本</label>
                                </div>
                                 <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="unit" value="枚">
                                  <label class="form-check-label" for="inlineRadio1">枚</label>
                                </div>
                                 <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="unit" value="cm">
                                  <label class="form-check-label" for="inlineRadio1">cm</label>
                                </div>
                                 <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="unit" value="m">
                                  <label class="form-check-label" for="inlineRadio1">m</label>
                                </div>
                                 <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="unit" value="g">
                                  <label class="form-check-label" for="inlineRadio1">g</label>
                                </div>
                                 <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="unit" value="kg">
                                  <label class="form-check-label" for="inlineRadio1">kg</label>
                                </div>
                                 <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="unit" value="cc">
                                  <label class="form-check-label" for="inlineRadio1">cc</label>
                                </div>
                            </div>
                        
                        <div><strong>販売店</strong></div>
                        <div class="form-margin">
                            <input type="text" class="form-control lg" name="shop" value="{{ $part->shop }}">
                        </div>
                        
                        <div><strong>備考</strong></div>
                        <div class="form-margin">
                           <textarea class="form-control" name="other" rows="3" value="{{ $part->other }}"></textarea>
                        </div>
                   
                    
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="reset" class="btn btn-outline-dark">リセット</button>
                        <button type="submit" class="btn btn-outline-dark">登録</button>
                    </div>
                    
                </div>
            </div>
                
        </form>

</div>

<p> </p>



 @endsection
