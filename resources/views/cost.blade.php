@extends('layout')

@section('title', '原価計算')

@section('content')
<div class="container">
<div class="main">
    
    <h2>原価計算</h2>
    
    
    
     <form action="" method="get" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
                <div class="offset-sm-2 col-sm-2">
                     <select name="form_count">
                        <option value="">--</option>
                        <option value="10">10パーツ</option>
                        <option value="20">20パーツ</option>
                        <option value="30">30パーツ</option>
                        <option value="40">40パーツ</option>
                        <option value="50">50パーツ</option>
                        <option value="60">60パーツ</option>
                        <option value="70">70パーツ</option>
                        <option value="80">80パーツ</option>
                        <option value="90">90パーツ</option>
                        <option value="100">100パーツ</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-outline-dark">入力フォーム数決定</button>
                </div>
                <div>
                </div>
         </div>
     </form>
    
<p> </p>
<hr>
   
   @if($count > 0)
    <form action="{{action('CostController@calc')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input id="form_count" type="hidden" name="form2" value={{$count}}>
    
        <table class="table-sm table-borderless">
            <tr>
                <td>      
                
                    <table>
                        <tr>
                            <th>分類</th>
                            <th>パーツ名</th>
                            <th>個数</th>
                        </tr>
                        
                         @for($i=0; $i <= $count; $i++)
                        <tr>
                            <td>
                                <select name="genru_name{{$i}}" id="maincategory{{$i}}">
                                <option value="" data-category="">-------------------</option>
                                @foreach($genrus as $genru)
                                    @if($genru->user_id === $login_user_id)
                                        <option value="{{$genru->id}}">{{$genru->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            
                            <td>
                                <select name="part_name{{$i}}" id="subcategory{{$i}}">
                                <option value="" data-category="">-------------------</option>
                                @foreach($parts as $part)
                                    @if($part->user_id === $login_user_id)
                                        <option value="{{$part->id}}" class="{{ $part->genru_id}}" data-category="{{$part->genru->id}}">{{$part->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            
                            <td width="100">
                                <input type="number" class="form-control size-input-zip3" maxlength="3" name="amount{{$i}}"  value="{{ old('amount') }}">
                            </td>
                        </tr>
                        @endfor
                    </table>
                    
                </td>
                
                <td width="450" class="align-baseline" style="background-color:#badcad">
                    
                    <table>
                        
                        <tr><th> </th></tr>
                        
                        <tr>
                            <td id="copyTarget">
                                @for($i=0; $i<= $count; $i++)
                                <div>
                                    @isset($gname[$i])
                                     ・ {{ $gname[$i]}} / 
                                     @endisset
                                    @isset($name[$i])
                                      {{ $name[$i]}} / 
                                    @endisset
                                    
                                    @isset($_REQUEST['amount'.$i])
                                      {{ $_REQUEST['amount'.$i] }}
                                    @endisset
                                    
                                    @isset($unit[$i])
                                      {{ $unit[$i] }} / 
                                    @endisset
                                    
                                    @isset($sum[$i])
                                      ￥{{ number_format($sum[$i], 1) }}-
                                    @endisset
                                </div>
                                @endfor
                                <hr>
                                 <strong>総原価：</strong>￥@isset($sum){{number_format(array_sum($sum), 1)}}-@endisset
                            </td>
                        </tr>
                        
                    </table>
                    
                </td>
                
            </tr>
            
            <tr>
                <td colspan="2">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="reset" class="btn btn-outline-dark">リセット</button>
                    <button type="submit" class="btn btn-outline-dark">計算</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
    
    <script type="text/javascript">
        var count = $('#form_count').val();
        
        console.log(count);
        
        
        for (let i = 0; i <= count ; i++){
        document.addEventListener("DOMContentLoaded", function(){
        // 初期値が設定されている場合は最上位を選択させない
        var firstChange = ($("#subcategory" + i).val() == "");
        
        $("#maincategory" + i).on("change",function(){
        if(firstChange){
        // 最上位を選択（現在選択項目を解除）
        $("#subcategory" + i + "option[value='']").prop('selected',true);
        }
        firstChange = true;
        
        $("#subcategory" + i + " option").hide();
        $("#subcategory" + i + " option[data-category='']").show();
        $("#subcategory" + i + " option[data-category=\"" + this.value + "\"]").show();
        }).change();
        });
        };
    </script>
@endif

@endsection