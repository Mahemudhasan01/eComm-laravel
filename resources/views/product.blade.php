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

    <body class="bg-dark">
        <div class="slideshow">
            @foreach ($products as $item)
                <div class="mySlides fade">
                    <a href=" {{ route('product.detail', ['id' => $item['product_id']]) }} ">
                        <img class="slider-img" src="  {{ url('frontend/images') . '/' . $item['gallery'] }} "
                            style="width:100%">
                        <div class="text bg-dark"> {{ $item['name'] }} </div>
                    </a>
                </div>
            @endforeach
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <div class="tranding-items container">
            <h2 class="text-center text-white">Trending Products</h2>
            @foreach ($products as $item)
                <div class="trending-products">
                    <a href=" {{ route('product.detail', ['id' => $item['product_id']]) }} ">
                        <img src=" {{ url('frontend/images') . '/' . $item['gallery'] }} ">
                    </a>
                </div>
            @endforeach
        </div>
        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }
        </script>
    </body>

    </html>
@endsection
