@extends('layout')

@section('title', 'KARIN　-ハンドメイド支援アプリ-')

@section('content')

    <body>
        <table style="width:100%;background-image:url(image/top.jpg);margin-top:72px;border: 4px #000000 solid;">
            <tr>
                <td width=50%>
                    <img src="image/1.png">
                </td>
                <td style="padding:50px">
                   
                    <div class="h1 text-left">手持ちのパーツ/材料</div>
                    <div class="h1 text-center">パーツ/材料の在庫</div>
                    <div class="h1 text-right">作品の原価</div>
                    <P> </P>
                    <div class="h3 text-center">を簡単に把握するためのwebアプリ</div>
                    <p>　</p>
                    <div class="h5">ハンドメイド</div>
                    <div class="h5">クラフト</div>
                    <div class="h5">コスプレ衣装・造形</div>
                    <div class="h5">お菓子作り等にも</div>
                    <div class="text-center">
                        <button type="button" class="btn btn-lg btn-outline-dark">新規登録はこちらから</button>
                    </div>
                </td>
            </tr>
        </table>
        
<p>　</p>        

        <div class="container">
            <div class="row">
                
                <div class="offset-sm-2 col-sm-3">
                     <img src="image/top1.jpg" width="250">
                </div>
                <div class="col-sm-4">
                    <div class="h4">パーツ一覧/パーツ登録</div>
                    <p> </p>
                    <div>「パーツ登録」で登録された情報は</div>
                    <div>「パーツ一覧」に表示</div>
                    <div> 入力された価格と内容量から単価も自動計算</div>
                    <div>今あるパーツの種類と個数の管理が簡単に。</div>
                </div>
            </div>
            
            <p>　</p>
                
             <div class="row">
                <div class="offset-sm-2 col-sm-4">
                    <div class="h4">パーツ支出一覧/パーツ支出登録</div>
                    <p> </p>
                    <div>「パーツ支出一覧登録」ページで</div>
                    <div>パーツの消費/購入記録を登録。</div>
                    <div>消費/購入記録は「パーツ一覧」の在庫数に自動反映されるから、今使いたいパーツがいくつあるか一目でわかる。</div>
                </div>
                <div class="col-sm-3">
                     <img src="image/top2.jpg" width="250">
                </div>
            </div>
            
            <p>　</p>
            
             <div class="row">   
                <div class="offset-sm-2 col-sm-3">
                     <img src="image/top3.jpg" width="250">
                </div>
                 <div class="col-sm-4">
                    <div class="h4">原価計算</div>
                    <div>登録したパーツと個数を入力すれば、</div>
                    <div>使ったパーツ毎の原価を総原価が表示されるから、作品の値段を決める時に便利。</div>
              
                </div>
            </div>
        </div>
    
    <p>　</p>   
         
</body>

@endsection