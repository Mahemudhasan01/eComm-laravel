@extends('layout.main')

@section('main-section')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Orders</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body class="bg-dark">
        <div class="container">
            <h2 class="p-3 mb-2 bg-success text-white text-center">Order List</h2>
            <div class="col-sm-10">
                @foreach ($myorder as $item)
                    <div class="search-link row">
                        <div class="col-sm-10">
                            <div class="col-sm-7">
                                <a href=" {{ route('product.detail', ['id' => $item->product_id]) }} ">
                                    <img class="detail-img" src=" {{ url('frontend/images') . '/' . $item->gallery }} ">

                                    <h2 class="text-white hr"> Name: {{ $item->name }} </h2><hr style="background: aliceblue">
                                    <h4 class="text-white hr"> Price: {{ $item->price }} </h4>
                                    <h6 class="text-white hr"> Description: {{ $item->description }} </h6><hr style="background: orange">
                                    <a href="{{ route('product.remove.cart', ['id' => $item->product_id]) }}"><button class="btn btn-danger">Cancel Order</button></a>
                                    <a href="{{ route('product.order') }}"><button class="btn btn-success"> Check Status</button></a>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>

    </html>
@endsection
