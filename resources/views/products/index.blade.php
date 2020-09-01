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
                Products
            </div>
            <p class="text-success">{{session('msg') ?? ''}}</p>
            <form action="{{url('products/create')}}">
                @csrf
                <input type="submit" class="btn btn-primary"
                       value="+" title="create a product">
            </form>
            <table class="table table-striped" style="width: 100%">
                <thead>
                <tr>
                    <th>N</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->size}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{url("/products/{$product->id}")}}" class="btn btn-outline-primary">view</a>
                            <a href="{{url("/products/{$product->id}/edit")}}" class="btn btn-outline-success">edit</a>
                            <form action="{{url("/products/{$product->id}")}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>No products</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

