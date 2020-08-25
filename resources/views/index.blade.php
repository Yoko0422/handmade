@extends('layout')

@section('title', 'KARIN　-ハンドメイド支援アプリ-')

@section('content')

    <body>
        <table width="100%" class="index-table">
            <tr>
                <td width=50%>
                    <img src="image/1.png">
                </td>
                <td style="padding:50px">
                   
                    <div class="h1 text-left"><span class="under">手持ちのパーツ/材料</span></div>
                    <div class="h1 text-center"><span class="under">パーツ/材料の在庫</span></div>
                    <div class="h1 text-right"><span class="under">作品の原価</span></div>
                    <P> </P>
                    <div class="h3 text-center">を簡単に把握するためのwebアプリ</div>
                    <p>　</p>
                    <div class="h5"><span class="under2">ハンドメイド</span></div>
                    <div class="h5"><span class="under2">クラフト</span></div>
                    <div class="h5"><span class="under2">コスプレ衣装・造形</span></div>
                    <div class="h5"><span class="under2">お菓子作り等にも</span></div>
                    <div class="text-center">
                        <a href={{route('register')}}>
                        <button type="button" class="btn btn-lg btn-outline-dark">新規登録はこちらから</button>
                        </a>
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
                <div class="col-sm-3">
                    <div class="h4">パーツ一覧/パーツ登録</div>
                    <p> </p>
                    <div>「パーツ登録」で登録された情報は「パーツ一覧」に即座に表示。</div>
                    <div> 入力された価格と内容量から単価も自動計算されるから、</div>
                    <div>今あるパーツの種類と個数の管理が簡単。</div>
                </div>
            </div>
            
            <p>　</p>
                
             <div class="row">
                <div class="offset-sm-2 col-sm-4">
                    <div class="h4">パーツ支出一覧/パーツ支出登録</div>
                    <p> </p>
                    <div>パーツの消費/購入記録を登録すれば、。</div>
                    <div>消費/購入記録は「パーツ一覧」の在庫数に自動反映されるから、今使いたいパーツがいくつあるか一目でわかる。</div>
                </div>
                <div class="col-sm-4">
                     <img src="image/top2.jpg" width="250">
                </div>
            </div>
            
            <p>　</p>
            
             <div class="row">   
                <div class="offset-sm-2 col-sm-3">
                     <img src="image/top3.jpg" width="250">
                </div>
                 <div class="col-sm-3">
                    <div class="h4">原価計算</div>
                    <div>登録したパーツと個数を入力すれば、</div>
                    <div>使ったパーツ毎の原価を総原価が表示されるから、作品の値段を決める時に便利。</div>
              
                </div>
            </div>
        </div>
    
    <p>　</p>   
         
</body>

@endsection