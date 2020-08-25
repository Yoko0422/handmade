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
        <link href="{{ secure_asset('css/app.scss') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/custom.css') }}" rel="stylesheet">
        
    </head>
    
    <body>

            @yield('content')
        
    </body>
</html>