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
            <div class="row">
                <div class="col-sm-6 ">
                    <img class="detail-img" src=" {{ url('frontend/images') . '/' . $product['gallery'] }} ">
                </div>
                <div class="col-sm-6 mt-5">
                    <h2> Name: {{ $product['name'] }} </h2>
                    <h4> Price: {{ $product['price'] }} </h4>
                    <h5> Category: {{ $product['category'] }} </h5>
                    <h5> Description: {{ $product['description'] }} </h5>

                    <br><br>
                    <a href=" {{ route('product.addToCard', ['id' => $product['product_id']]) }} ">
                        <button type="submit" class="btn btn-success">Add To Card</button>
                    </a>
                    <br><br>
                    <a href=" {{ route('product.single.order', ['id' => $product['product_id']]) }} ">
                        <button class="btn btn-primary">Buy Now</button>
                    </a>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
