@extends('layout.main')

@section('main-section')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Card</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body class="">
        <div class="container mt-5">
            <h2 class="text-white text-center bg-success">Order List</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td scope="row"></td>
                        <td>Price</td>
                        <td>
                            {{-- <pre> --}}
                            {{-- @php
                                print_r($price);die;
                            @endphp --}}
                            {{-- </pre> --}}
                            @if (isset($price))
                                {{ $price[0]['price'] }} ₹
                            @else
                                {{ $data }} ₹
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td>Tax</td>
                        <td>0 ₹</td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td>Delivery</td>
                        <td>100 ₹</td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td>Total Amount</td>
                        <td>
                            @if (isset($price))
                                {{ $price[0]['price'] + 100 }} ₹
                            @else
                                {{ $data + 100 }} ₹
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <form action=" {{ $url }} " method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="product_id" value="{{ isset($price[0]['product_id'])? ($price[0]['product_id']) : "" }}">
                    <label for=""> <b> Address </b></label>
                    <textarea name="address" class="form-control" placeholder="flat No. street Landmark ect." required></textarea> <br>
                    <label for=""> <b> Payment Method:- </b></label><br>
                    <input type="radio" value="online" class="" name="payment"> <span>Online Payment</span>
                    <input type="radio" value="card" class="ml-2" name="payment"> <span>Card Payment</span><br>
                    <input type="radio" value="cash" class="" name="payment"> <span>Cash on Delivery</span>
                    <input type="radio" value="net_banking" class="ml-2" name="payment"> <span>Net Banking</span>
                    <br><br><button type="submit" name="submit" class="btn btn-primary">Order Now</button>
                </div>
            </form>
        </div>
    </body>

    </html>
@endsection
