<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
        <title>Lunchmap</title>
        <style> </style>
    </head>
    <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href={{ route('app.index')}}><h1>アプリケーション名</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href={{ route('parts.list')>パーツ一覧 <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">パーツ登録</a>
      <a class="nav-item nav-link" href="#">パーツ支出記録</a>
      <a class="nav-item nav-link disabled" href="#">パーツ支出登録</a>
    </div>
  </div>
</nav>

        <div class='container'>
            @yield('content')
        </div>
    </body>
</html>