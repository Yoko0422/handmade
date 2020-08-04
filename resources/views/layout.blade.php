<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='utf-8'>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <meta name='csrf-token' content='{{ csrf_token() }}'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
        <script type=”text/javascript” src=”//code.jquery.com/jquery-1.11.0.min.js”></script>
        <script type=”text/javascript” src=”//code.jquery.com/jquery-migrate-1.2.1.min.js”></script>
        <script type=”text/javascript” src=”slick/slick.min.js”></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='{{ asset("js/app.js") }}' defer></script>
        <script>
              $(function(){
              $(".btn-dell").click(function(){
              if(confirm("削除してよろしいですか？")){
              //そのままsubmit（削除）
              }else{
              //cancel
              return false;
              }
              });
              });
        </script>
        <title>@yield('title')</title>
        <style>
          .main{padding-top: 60px;} 
          .hide {display: none;}
        </style>
    </head>
    <body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#badcad">
    <a class="navbar-brand" href="{{ url('/') }}"><h3>KARIN</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarText">
            @auth
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-item nav-link active" href={{ route('parts.list') }}>パーツ一覧 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-item nav-link disactive" href={{ route('parts.new') }}>パーツ登録</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-item nav-link active" href={{ route('spends.list') }}>パーツ支出一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-item nav-link disactive" href={{ route('spends.new') }}>パーツ支出登録</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-item nav-link active" href={{route('cost')}}>原価計算</a>
                    </li>
                </ul>
            @endauth
        <span class="navbar-text">
        <ul class="navbar-nav ml-auto">
        @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
        @else
        <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        </div>
        </li>
        @endguest
        </ul>
        </span>
        </div>
        </div>
</nav>        


        <div class='container'>
            @yield('content')
        </div>
    </body>
</html>