<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-comm project</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}
</body>

<style>
    .custom-login{
        height: 500px;
        padding-top: 100px;
    }
    img.slider-img{
        height: 500px !important;
    }
    /*-------------------------------------*/
    /* .custom-product{
        height: 600px;
    } */
    .custom-product {
        padding: 20px;
    }
    .carousel-caption {
        background: rgba(0, 0, 0, 0.5);
        padding: 20px;
        color: white;
    }
    .trending-item-info {
        margin-top: 10px;
    }
    .searched-item {
        border: 1px solid #ddd;
        padding: 10px;
    }
    .action-buttons {
        text-align: center;
        margin-top: 10px;
    }
    /*-------------------------------------*/
    .slider-text{
        background-color: #24465454 !important;
    }
    /* .trending-img{
        height: 100px;
    } */
    .trending-img {
        width: 100%;
        height: 200px;
    }
    /* .trending-img {
        max-width: 100%;
        height: auto;
    } */
    /* .trending-item{
        float:left;
        width: 20%;
    } */
    .trending-item {
        border: 1px solid #ddd;
        margin: 10px;
        padding: 10px;
        text-align: center;
    }

    /* .trending-wrapper{
        margin: 20px;
    } */
    .trending-wrapper {
        margin-top: 20px;
    }
    /* .detail-img{
        height: 200px;
    } */
    .detail-img {
        max-width: 100%;
        height: auto;
    }
    .search-box{
        width: 500px !important;
    }
    .cart-list-devider{
        border-bottom: 1px solid #CCC;
        margin-bottom:20px;
        padding-bottom:20px;
    }
    /* .cart-list-divider {
        border-bottom: 1px solid #ddd;
    } */

</style>

</html>
