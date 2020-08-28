@extends('layout')

@section('title', 'パーツ使用/購入記録登録')

@section('content')
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
                
                    <form action="{{ action('SpendController@store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    

                        <div><strong>日付</strong></div>
                        <div class="form-margin">
                           <input type="date" name="date" value="{{ old('date') }}"></input>
                        </div>
                        
                        
                        <div><strong>購入/消費</strong></div>
                            <div class="form-margin">
                                <div class="form-check form-check-inline">
                                   {{ Form::radio('which', '購入', false, ['id' => 'radio-one', 'class' => 'form-check-input']) }}購入
                                </div>
                                 <div class="form-check form-check-inline">
                                   {{ Form::radio('which', '消費', false, ['id' => 'radio-two', 'class' => 'form-check-input']) }}消費
                                </div>
                            </div>
                            
                        <div>購入/消費　詳細</div>
                        <div class="form-margin">
                           <input type="text" class="form-control lg" name="purpose" value="{{ old('purpose') }}">
                        </div>
                            
                        
                         <div><strong>分類名</strong></div>
                        <div class="form-margin">
                           <select name="genru_id" id="maincategory">
                            <option value="" data-category="">-------------------</option>
                            @foreach($array_genrus as $array_genru)
                                @if($array_genru->user_id === $login_user_id)
                                    <option value="{{$array_genru->id}}">{{$array_genru->name}}</option>
                                @endif
                            @endforeach
            </select>
                        </div>
                        
                         <div><strong>パーツ名</strong></div>
                        <div class="form-margin">
                           <select name="part_id" id="subcategory">
                                <option value="" data-category="">-------------------</option>
                                @foreach($parts as $part)
                                    @if($part->user_id === $login_user_id)
                                        <option value="{{$part->id}}" class="{{ $part->genru_id}}" data-category="{{$part->genru->id}}">{{$part->name}}</option>
                                   @endif
                                @endforeach
                            </select>
                        </div>
                        
                         <div><strong>数量</strong></div>
                        <div class="form-margin">
                           <input type="number" class="form-control sm" name="amount" value="{{ old('amount') }}">
                        </div>
                        
                         <div>購入価格</div>
                        <div class="form-margin">
                          <input type="number" class="form-control sm" name="price" value="{{ old('price') }}">
                        </div>
                        
                         <div>購入店</div>
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

 @endsection
