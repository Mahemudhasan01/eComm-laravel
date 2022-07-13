@extends('layout.main')

@section('main-section')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="search-link row">
                @foreach ($products as $item)
                    <a href=" {{ route('product.detail', ['id' => $item['product_id']]) }} ">
                        <div class="col-sm-6 ">
                            <img class="detail-img" src=" {{ url('frontend/images') . '/' . $item['gallery'] }} ">
                        </div>
                        <div class="col-sm-6 mt-1">
                            <h2> Name: {{ $item['name'] }} </h2>
                            <h4> Price: {{ $item['price'] }} </h4>
                            <h6> Description: {{ $item['description'] }} </h6>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </body>

    </html>
@endsection
