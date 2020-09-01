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
                Create a product
            </div>
            <form action="{{url('/products')}}" method="post">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price">
                <label for="size">Size</label>
                <input type="text" name="size" id="size">
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="clothes">clothes</option>
                    <option value="shoes">shoes</option>
                    <option value="electronics">electronics</option>
                </select>
                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection
