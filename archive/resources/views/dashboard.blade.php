<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		{{ HTML::script('js/app.js') }}
		{{ HTML::script('js/test.js') }}
		{{ HTML::style('css/global.css')}}
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
            <div class="content">
                <div class="title m-b-md">
                    {{config('app.name')}}
                </div>

                <div class="links">
                    <a href="signin">Sign in</a>
                    <a href="signup">Sign up</a>
                    <a href="https://laravel-news.com">About Us</a>
                </div>
            </div>
    </body>
</html>
