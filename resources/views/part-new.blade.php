@extends('layout')

@section('title', 'パーツ登録')

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-sm-2 col-sm-8 main">
 
            <div class="box30">
                
                <div class="box-title"><h2>パーツ登録</h2></div>
                
                <div>
                     @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                        <hr>
                </div>
                
                <div class="box"> 
            
                    <form action="{{ action('PartController@store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    
                    
                            <div><strong>分類名</strong></div>
                            <div class="form-margin">
                                <input type="text" class="lg" name="genru" list="genrus" placeholder="テキスト入力or選択" autocomplete="off"
                                value="{{ old('genru') }}">
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
        
                        
                            <div><strong>パーツ名</strong></div>
                            <div class="form-margin">
                                <input type="text" class="form-control lg" name="name" value="{{ old('name') }}" autocomplete="off">
                            </div>
                            
                            <div><strong>価格</strong></div>
                            <div class="form-margin">
                               <input type="number" class="form-control sm" name="price"  value="{{ old('price') }}">
                            </div>
                    
                            <div><strong>内容量</strong></div>
                            <div class="form-margin">
                                <input type="number" class="form-control sm" name="value" value="{{ old('value') }}">
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
                            
                    
                            <div>店名</div>
                            <div class="form-margin">
                               <input type="text" class="form-control lg" name="shop" value="{{ old('shop') }}">
                            </div>
                            
                            <div>備考</div>
                            <div class="form-margin">
                               <textarea class="form-control" name="other" rows="3" value="{{ old('other') }}"></textarea>
                            </div>
                       
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="offset-sm-2 col-sm-2">
                    
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
