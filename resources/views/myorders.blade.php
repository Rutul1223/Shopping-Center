@extends('master')
@section('content')

<div class="container custom-product">
    <div class="trending-wrapper">
        <h4>Orders list</h4>

        @foreach ($orders as $item)
            <div class="row searched-item cart-list-devider">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <a href="detail/{{ $item->id }}">
                        <img class="trending-img" src="{{ $item->gallery }}">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <div class="">
                        <h2>{{ $item->name }}</h2>
                        <h5>Delivery Status: {{ $item->status }}</h5>
                        <h5>Payment Status: {{ $item->payment_status }}</h5>
                        <h5>Payment method: {{ $item->payment_method }}</h5>
                        <h5>Delivery Address: {{ $item->address }}</h5>
                        <h5>Price: Rs. {{ $item->price }}</h5>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
