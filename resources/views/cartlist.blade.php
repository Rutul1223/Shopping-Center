@extends('master')
@section('content')

<div class="custom-product">
    <div class="col-12">
        <div class="trending-wrapper">
            <h4>Results for Products</h4>
            @foreach ($products as $item)
                <div class="row searched-item cart-list-divider mb-3">
                    <div class="col-md-3 col-sm-6">
                        <a href="detail/{{ $item->id }}">
                            <img class="trending-img img-fluid" src="{{ $item->gallery }}" alt="{{ $item->name }}">
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="product-details">
                            <h2>{{ $item->name }}</h2>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="action-buttons">
                            <a href="/removecart/{{ $item->cart_Id }}" class="btn btn-warning">Remove From Cart</a><br><br>
                            <button class="btn btn-success">Buy Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <br><br>
        </div>
        <a class="btn btn-success" href="ordernow">Order Now</a><br><br>
    </div>
</div>

@endsection
