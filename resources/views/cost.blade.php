@extends('layout')

@section('title', '原価計算')

@section('content')
<div class="main">
    
<script>

for (var count = 1; count <= 10; count++){

    document.addEventListener("DOMContentLoaded", function(){
        // 初期値が設定されている場合は最上位を選択させない
        var firstChange = ($("#subcategory" + count).val() == "");
    
        $("#maincategory" + count).on("change",function(){
            if(firstChange){
                // 最上位を選択（現在選択項目を解除）
                $("#subcategory+count option[value='']").prop('selected',true);
            }
            firstChange = true;
    
            $("#subcategory+count option").hide();
            $("#subcategory+count option[data-category='']").show();
            $("#subcategory+count option[data-category=\"" + this.value + "\"]").show();
        }).change();
    });
};

/*
$(function(){
$('tr #category').each(function(i){
  $(this).attr('class','sample' + (i+1));
});
});


//２番目以降のフォーム
document.addEventListener("DOMContentLoaded", function(){
    // 初期値が設定されている場合は最上位を選択させない
    var firstChange = ($('sample' + $i + '#subcategory').val() == "");

    $("#maincategory".$i).on("change",function(){
        if(firstChange){
            // 最上位を選択（現在選択項目を解除）
            $("#subcategory.$i option[value='']").prop('selected',true);
        }
        firstChange = true;

        $("#subcategory.$i option").hide();
        $("#subcategory.$i option[data-category='']").show();
        $("#subcategory.$i option[data-category=\"" + this.value + "\"]").show();
    }).change();
});

$("#container tr").each(function (i) {
  i = i+1;
  //変更をクリックしたときの処理
    $('.item_' + i + ' .change span').click(function() {
    //変更をクリックしたときの表示・非表示処理
  
      
  });
  //保存orキャンセルをクリックしたときの処理
  $('.item_' + i + ' .edit span').click(function() {
    //保存orキャンセルをクリックしたときの処理
  });
});
*/

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
            <tr id="category">
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