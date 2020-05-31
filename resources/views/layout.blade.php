<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<style>
		body {
			padding-top: 50px;
			background-color: lightgray;
		}

	</style>
</head>

    <body>
        <nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
            <a class='navbar-brand' href={{route('handmade')}}><h2>アプリケーション名</h2></a>
            ||
            <a class='navbar-brand' href={{route('parts.list')}}>パーツ一覧</a>
            |
            <a class='navbar-brand' href={{route('spends.list')}}>パーツ支出記録</a>
        </nav>
        <div class='container'>
            @yield('content')
        </div>
    </body>
</html>