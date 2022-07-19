@php
//Fech Cart Number
use App\Http\Controllers\ProductController;

if (Session::has('user')) {
    $cartitem = ProductController::cartItems();
} else {
    $cartitem = 0;
}

@endphp

<!doctype html>
<html lang="en">

<head>
    <title>E-Commerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- J Quert --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <a class="navbar-brand text-white" href="#">E-Comm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href=" {{ route('product') }} ">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Brands
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href="#">Action</a>
                        <a class="dropdown-item text-white" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-white" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link pull-left text-white" href=" {{ route('product.cart') }} ">Add
                        Cart({{ $cartitem }})
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pull-left text-white" href=" {{ route('product.my.order') }} ">Order
                    </a>
                </li>
                {{-- Check and Show Btn --}}
                @if (session::has('user'))
                    <div class="dropdown show">
                        <li class="nav-item">
                            <a class="nav-link text-white" href=" {{ route('logout') }} ">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href=" {{ url('/') }} ">Login</a>
                        </li>
                @endif

            </ul>
            <form action=" {{ route('product.search') }} " class="form-inline my-2 my-lg-0">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 text-white" type="submit">Search</button>
                {{-- reset after search --}}
                <a href=" {{ route('product') }} ">
                    <button class="btn btn-outline-warning my-2 my-sm-0 text-white" type="button">Reset</button>
                </a>
            </form>
        </div>
    </nav>

</body>

</html>
