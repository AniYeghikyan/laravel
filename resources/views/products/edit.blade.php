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
                Edit a product
            </div>
            <form action="{{url("/products/$product->id")}}" method="post">
                @csrf
                @method('PUT')
                <label for="name">Name</label>
                <input type="text" name="name" id="name"
                       value="{{$product->name}}">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price"
                       value="{{$product->price}}">
                <label for="size">Size</label>
                <input type="text" name="size" id="size"
                       value="{{$product->size}}">
                <label for="category">Category</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                        @if($category === $product->category)
                            <option value="{{$category}}" selected>
                                {{ucfirst($category)}}
                            </option>
                        @else
                        <option value="{{$category}}">
                            {{ucfirst($category)}}
                        </option>
                        @endif
                    @endforeach
                </select>
                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection
