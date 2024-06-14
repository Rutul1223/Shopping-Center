@extends('master')
@section('content')


<div class="custom-product">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($products as $key => $item)
                <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner">
            @foreach ($products as $item)
                <div class="item {{ $item['id'] == 1 ? 'active' : '' }}">
                    <a href="detail/{{ $item['id'] }}">
                        <img class="slider-img" src="{{ $item['gallery'] }}" alt="{{ $item['name'] }}">
                        <div class="carousel-caption slider-text">
                            <h3>{{ $item['name'] }}</h3>
                            <p>{{ $item['description'] }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="trending-wrapper">
        <h1>Trending Products</h1>
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-3">
                    <div class="trending-item">
                        <a href="detail/{{ $item['id'] }}">
                            <img class="trending-img" src="{{ $item['gallery'] }}" alt="{{ $item['name'] }}">
                            <div class="trending-item-info">
                                <h3>{{ $item['name'] }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
