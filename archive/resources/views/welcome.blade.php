@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="flex-center position-ref full-height">
       
        <div class="content">
            <div class="title m-b-md">
                {{config('app.name')}}
            </div>

            <div class="links">
                <a href="{{Route('signin')}}">Sign in</a>
                <a href="signup">Sign up</a>
                <a href="https://laravel-news.com">About Us</a>
            </div>
        </div>
	</div>
</div>
@endsection