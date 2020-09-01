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
                Product
            </div>
            <table class="table table-striped" style="width: 100%">
                <tr>
                    <td>Name:</td>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>{{$product->category}}</td>
                <tr>
                    <td>Size:</td>
                    <td>{{$product->size}}</td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>{{$product->price}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
