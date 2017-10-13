<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!--<link rel="manifest" href="https://5cf5c268.ngrok.io/manifest.json">-->
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

        <title>Notification Sendgrid App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Welcome to Notifications App
                </div>
            </div>
        </div>
        <footer>
            <blockquote>
                Copyright 2017 - Made by Jean Manzo & TigerMediaGroup
            </blockquote>
        </footer>
    </body>
</html>
