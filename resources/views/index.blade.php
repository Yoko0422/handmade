@extends('layout')

@section('title', 'KARIN　-ハンドメイド支援アプリ-')

@section('content')

    <body>
        <div class="main">
        <h1>KARIN</h1>
        
        <p></p>
        <div>ハンドメイドやクラフト、調理などに役立つ、パーツや材料の在庫管理と原価計算ができるアプリ</div>
        <p>　</p>
        <div role="alert" style="background-color:#c1d8ac">
         <h5>パーツ一覧/パーツ登録</h5>
         <hr>
         <div>・「パーツ登録」で登録したパーツは「パーツ一覧」ですぐに確認できる</div>
         <div>・登録時に価格と内容量を記入して、パーツ毎の単価を瞬時に自動計算で表示</div>
         <div>　</div>
        </div>
        
        <p></p>
        
        <div role="alert" style="background-color:#b9d08b">
         <h5>パーツ支出一覧/パーツ支出登録</h5>
         <hr>
         <div>・パーツを購入/消費した時に登録しておけば、いつ何の目的で使用したかいつでも確認できる</div>
         <div>・購入/消費数は自動計算され、現在の在庫数が「パーツ一覧」のパーツ毎に表示される</div>
         <div>　</div>
        </div>
        
        <p></p>
        
        <div role="alert" style="background-color:#a8bf93">
         <h5>原価計算</h5>
         <hr>
         <div>・登録したパーツの個数を記入すれば、作品毎の原価計算がすぐにできて便利</div>
         <div>・入力フォームの数も好きなだけ設定できるから、パーツを何種類使っても大丈夫</div>
         <div>　</div>
        </div>
        
</div>
    </body>

@endsection