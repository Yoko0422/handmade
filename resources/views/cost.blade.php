@extends('layout')

@section('title', '原価計算')

@section('content')
<div class="main">
    
<script type="text/javascript">
for (let i = 1; i <= 10; i++){
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


<h2>原価計算</h2>
<p>　</p>

<form action="{{ action('CostController@store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<table border="1">
    <tr>
        <th>分類</th><th>パーツ名</th><th>個数</th><th>原価</th>
    </tr>
    
        @for($count=1; $count<=10; $count++)
            <tr>
                <td>
                    <div class="col-sm-8">
                        <select name="genru_name" id="maincategory{{$count}}">
                            <option value="" data-category="">-------------------</option>
                                @foreach($genrus as $genru)
                                    @if($genru->user_id === $login_user_id)
                                        <option value="{{$genru->id}}">{{$genru->name}}</option>
                                    @endif
                                @endforeach
                        </select>
                    </div>
                </td>
                <td>
                    <div class="col-sm-4">
                        <select name="part_name{{$count}}" id="subcategory{{$count}}">
                            <option value="" data-category="">-------------------</option>
                                @foreach($parts as $part)
                                    @if($part->user_id === $login_user_id)
                                    <option value="{{$part->id}}" class="{{ $part->genru_id}}" data-category="{{$part->genru->id}}">{{$part->name}}</option>
                                    @endif
                                @endforeach
                        </select>
                    </div>
                </td>
                <td>
                    <input type="number" class="form-control" name="price"  value="{{ old('price') }}">
                </td>
                <td>
                        
                </td>
            </tr>
     @endfor
     
     
     
    
    <tr>
        
                <td>
                <div class="col-sm-2">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="reset" class="btn btn-outline-dark">リセット</button>
                        <button type="submit" class="btn btn-outline-dark">計算</button>
                    </div>
              </td>
            </tr>
            </form>
        </td>
        
    </tr>
    
    
</table>

</div>

@endsection