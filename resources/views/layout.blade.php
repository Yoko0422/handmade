<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
        <title>@yield('title')</title>
        <style>.main{ padding-top: 50px;} </style>
    </head>
    <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href={{ route('app.index')}}><h1>アプリケーション名</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href={{ route('parts.list') }}>パーツ一覧 <span class="sr-only">(current)</span></a>
      _
      <a class="nav-item nav-link disactive" href={{ route('parts.new') }}>パーツ登録</a>
      <a class="nav-item nav-link active" href={{ route('spends.list') }}>パーツ支出記録</a>
      _
      <a class="nav-item nav-link disactive" href={{ route('spends.new') }}>パーツ支出登録</a>
    </div>
  </div>
</nav>

        <div class='container'>
            @yield('content')
        </div>
    </body>
</html>