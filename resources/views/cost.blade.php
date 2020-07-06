@extends('layout')

@section('title', '原価計算')

@section('content')
<div class="main">
    
    <h2>原価計算</h2>
    
    <p>　</p>
    <script type="text/javascript">
        for (let i = 0; i <= 9; i++){
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

    <form action="{{action('CostController@calc')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    
        <table class="table-sm table-borderless">
            <tr>
                <td>      
                
                    <table>
                        <tr>
                            <th>分類</th>
                            <th>パーツ名</th>
                            <th>個数</th>
                        </tr>
                        
                         @for($i=0; $i<= 9; $i++)
                        <tr>
                            <td>
                                <select name="genru_name" id="maincategory{{$i}}">
                                <option value="" data-category="">-------------------</option>
                                @foreach($genrus as $genru)
                                    @if($genru->user_id === $login_user_id)
                                        <option value="{{$genru->id}}" @if(old('genru_name')=="{{$genru->id}}") selected  @endif>{{$genru->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            
                            <td>
                                <select name="part_name{{$i}}" id="subcategory{{$i}}">
                                <option value="" data-category="">-------------------</option>
                                @foreach($parts as $part)
                                    @if($part->user_id === $login_user_id)
                                        <option value="{{$part->id}}" class="{{ $part->genru_id}}" data-category="{{$part->genru->id}}" @if(old('part_name')=="{{$part->id}}") selected  @endif>{{$part->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>
                            
                            <td width="100">
                                <input type="number" class="form-control" name="amount{{$i}}"  value="{{ old('amount') }}">
                            </td>
                        </tr>
                        @endfor
                    </table>
                    
                </td>
                
                <td width="500" class="align-baseline" style="background-color:#808080">
                    
                    <table>
                        
                        <tr><th> </th></tr>
                        
                        <tr>
                            <td rowspan="10" id="copy">
                                @for($i=0; $i<= 9; $i++)
                                <div>
                                    @isset($name[$i])
                                     ・ {{$name[$i]}}/
                                    @endisset
                                    
                                    @isset($_REQUEST['amount'.$i])
                                      {{$REQUEST['amount'.$i]}}
                                    @endisset
                                    
                                    @isset($unit[$i])
                                      {{$unit[$i]}}/
                                    @endisset
                                    
                                    @isset($sum[$i])
                                      ￥{{$sum[$i]}}-
                                    @endisset
                                </div>
                                @endfor
                                <hr>
                                 <strong>総原価：</strong>￥{{array_sum($sum)}}-
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

@endsection