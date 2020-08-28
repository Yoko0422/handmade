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
                                        @if($genru->user_id === $login_user_id)
                                            @if($genru->id == $part->genru_id)
                                                <option value="{{$genru->name}}" selected>{{$genru->name}}</option>
                                            @else
                                                <option value="{{$genru->name}}">{{$genru->name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                   
                        <div><strong>パーツ名</strong></div>
                        <div class="form-margin">
                             <input type="text" class="form-control lg" name="name" value="{{ $part->name }}">
                        </div>
                        
                        <div><strong>価格</strong>　(円)</div>
                        <div class="form-margin">
                            <input type="number" class="form-control sm" name="price"  value="{{ $part->price }}">
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-4">
                             <div><strong>内容量</strong></div>
                             <div class="form-margin">
                                <input type="number" class="form-control sm" name="value" value="{{ $part->value }}">
                             </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <div><strong>単位</strong></div>
                                    <div class="form-margin">
                                        <select class="custom-select" name="unit" value="{{ $part->unit }}">
                                             @if($part->unit == '個')
                                                <option value='個' selected>個</option>
                                                <option value='枚'>枚</option>
                                                <option value='cm'>cm</option>
                                                <option value='m'>m</option>
                                                <option value='g'>g</option>
                                                <option value='kg'>kg</option>
                                                <option value='cc'>cc</option>
                                             @elseif($part->unit == '枚')
                                                <option value='個'>個</option>
                                                <option value='枚' selected>枚</option>
                                                <option value='cm'>cm</option>
                                                <option value='m'>m</option>
                                                <option value='g'>g</option>
                                                <option value='kg'>kg</option>
                                                <option value='cc'>cc</option>
                                             @elseif($part->unit == 'cm')
                                                <option value='個'>個</option>
                                                <option value='枚'>枚</option>
                                                <option value='cm' selected>cm</option>
                                                <option value='m'>m</option>
                                                <option value='g'>g</option>
                                                <option value='kg'>kg</option>
                                                <option value='cc'>cc</option>
                                             @elseif($part->unit == 'm')
                                                <option value='個'>個</option>
                                                <option value='枚'>枚</option>
                                                <option value='cm'>cm</option>
                                                <option value='m' selected>m</option>
                                                <option value='g'>g</option>
                                                <option value='kg'>kg</option>
                                                <option value='cc'>cc</option>
                                             @elseif($part->unit == 'g')
                                                <option value='個'>個</option>
                                                <option value='枚'>枚</option>
                                                <option value='cm'>cm</option>
                                                <option value='m'>m</option>
                                                <option value='g' selected>g</option>
                                                <option value='kg'>kg</option>
                                                <option value='cc'>cc</option>
                                             @elseif($part->unit == 'kg')
                                                <option value='個'>個</option>
                                                <option value='枚'>枚</option>
                                                <option value='cm'>cm</option>
                                                <option value='m'>m</option>
                                                <option value='g'>g</option>
                                                <option value='kg' selected>kg</option>
                                                <option value='cc'>cc</option>
                                             @else
                                                <option value='個'>個</option>
                                                <option value='枚'>枚</option>
                                                <option value='cm'>cm</option>
                                                <option value='m'>m</option>
                                                <option value='g'>g</option>
                                                <option value='kg'>kg</option>
                                                <option value='cc' selected>cc</option>
                                             @endif
                                        </select>
                                    </div>
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
