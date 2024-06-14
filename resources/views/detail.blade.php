@extends('master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <img class="detail-img img-fluid" src="{{ $product['gallery'] }}" alt="{{ $product['name'] }}">
        </div>
        <div class="col-lg-6 col-md-12">
            <a href="/" class="btn btn-outline-primary mt-3">Go Back</a>
            <h2 class="mt-4">Name: {{ $product['name'] }}</h2>
            <h3>Price: {{ $product['price'] }}</h3>
            <h4>Category: {{ $product['category'] }}</h4>
            <h4>Description: {{ $product['description'] }}</h4>
            <br><br>
            <form action="/add_to_cart" method="POST">
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                @csrf
                <button class="btn btn-primary">Add to Cart</button>
            </form>
            <br><br>
            <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div><br>

@endsection
