@extends('app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
            <a href="{{route('profile', ['id' => 2])}}">profile</a>
            @php
                $links =[
            ['link' => 'https://laravel.com/docs','name' => 'Docs'],
['link' => 'https://laracasts.com','name' => 'Laracasts'],
['link' => 'https://laravel-news.com','name' => 'News'],
['link' => 'https://blog.laravel.com','name' => 'Blog'],
['link' => 'https://nova.laravel.com','name' => 'Nova'],
['link' => 'https://vapor.laravel.com','name' => 'Vapor'],
['link' => 'https://github.com/laravel/laravel','name' => 'GitHub'],
['link' => 'https://github.com/laravel/laravel','name' => 'GitHub']];
            @endphp
            @include('support.links', ['links' => $links])
        </div>
    </div>
@endsection

