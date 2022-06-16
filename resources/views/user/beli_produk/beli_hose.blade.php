<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../gambar/fix/logo.png">

    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css_public/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css_public/pagination.css') }}">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/4619c8d9c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Samudera Selang</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light nav-fixed fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('gambar/fix/logo.png')}}" width="49" height="49" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="/contact">Persebaran Kantor</a>
                    <a class="nav-item btn btn_franchise active" href="/franchise">Franchise</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- List Produk -->
    <div class="beli_tab">
        <div class="container">
            <div class="row">
                @csrf
                <div class="col-lg-3 tagline-delay">
                    <div class="card_produk_beli mt-5">
                        <img src="{{ asset('/storage/'.$produk_hose->img_produk)}}" alt="{{$produk_hose->nama_produk}}">
                    </div>
                </div>
                <div class="col-lg-9 tagline-delay">
                    <div class="text-beli mt-5 ml-4">
                        <h5>{{$produk_hose->nama_produk}}</h5>
                        <h5>Rp. {{$produk_hose->harga}} / meter</h5>
                        <h5>Stok : {{$produk_hose->status_stok}}</h5>
                        <h5>Pengiriman : Cabang Terdekat</h5>
                        <p style="font-weight:600; margin-top: 30px ;">Pengiriman Akan Dilakukan Paling Lambat 3 Hari Setelah Pemesanan !</p>
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST" action="/test_ongkir/{{$produk_hose->id_produk}}">
                                {{ @csrf_field() }}
                                <div class="d-flex">
                                    <div class="pad-4">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-left-minus btn btn-primary btn-number" data-type="minus" data-field="">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100" required>
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus btn btn-primary btn-number" data-type="plus" data-field="">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center form-group-sm">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Provinsi Asal</label>
                                            <select name="province_origin" class="form-control" required>
                                                <option value=""> -- Provinsi -- </option>
                                                @foreach ($provinces as $province=>$value)
                                                <option value="{{$province}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Kota Asal</label>
                                            <select name="city_origin" class="form-control" required>
                                                <option>--Kota--</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Provinsi Tujuan</label>
                                            <select name="province_destination" class="form-control" required>
                                                <option value=""> -- Provinsi -- </option>
                                                @foreach ($provinces as $province=>$value)
                                                <option value="{{$province}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Kota Tujuan</label>
                                            <select name="city_destination" class="form-control" required>
                                                <option>--Kota--</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ekspedisi</label>
                                            <select name="courier" class="form-control" required>
                                                <option value=""> -- Kurir -- </option>
                                                @foreach ($couriers as $courier=>$value)
                                                <option value="{{$courier}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @if(Session::has("gagal"))
                                    <p style="color:red;margin:0;"> {{Session::get("gagal")}}</p>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea class="form-control" name="detail_alamat" id="" rows="3" required></textarea>
                                </div>
                                <button style="margin-top: 12px;" type="submit" class="btn btn_franchise">Beli Produk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 col-lg-7">
                <h5>Deskripsi</h5>
                <p>{{$produk_hose->detail_produk}}</p>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #3C3C3C; margin-top: -57px;" id="footer_page">
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Links -->
            <section class="mt-5">
                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center pt-5">
                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">About us</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#produk" class="text-white">Office</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">Products</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">Franchise</a>
                        </h6>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-5" />

            <!-- Section: Text -->
            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>
                            Kami ingin menjadi bagian dari mitra anda untuk maju bersama menyongsong masa depan yang lebih sukses.
                        </p>
                        <b>
                            Contact Us : 082217277481
                        </b>
                    </div>
                </div>
            </section>
            <!-- Section: Text -->

            <!-- Section: Social -->
            <b>
                Follow Us
            </b>
            <section class="text-center mb-5">
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-github"></i>
                </a>
            </section>
            <!-- Section: Social -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 Copyright :
            <a class="text-white" href=""> IT Demand Samudera Selang | All rights reserved</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Akhir Footer -->

    <!-- Quantity -->
    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
    <!-- Navbar Scroll -->
    <script>
        const navbar = document.querySelector(".nav-fixed");
        window.onscroll = () => {
            if (window.scrollY > 0) {
                navbar.classList.add("nav-active");
            } else {
                navbar.classList.remove("nav-active");
            }
        };
    </script>

    <!-- Scroll Reveal -->
    <script>
        ScrollReveal({
            reset: true,
            distance: "60px",
            duration: 800,
            delay: 4,
            mobile: false,
        });
        ScrollReveal().reveal(".tagline", {
            delay: 100
        });
        ScrollReveal().reveal(".tagline-core-left", {
            delay: 200,
            origin: "left",
        });
        ScrollReveal().reveal(".tagline-core-left-delay", {
            delay: 600,
            origin: "left",
        });
        ScrollReveal().reveal(".tagline-core-left-delay-1", {
            delay: 1000,
            origin: "left",
        });
        ScrollReveal().reveal(".tagline-core-right-delay", {
            delay: 600,
            origin: "right",
        });
        ScrollReveal().reveal(".tagline-core-right", {
            delay: 300,
            origin: "right",
        });
        ScrollReveal().reveal(".tagline-down", {
            delay: 200,
            origin: "top",
        });
        ScrollReveal().reveal(".tagline-down-delay", {
            delay: 600,
            origin: "top",
        });
        ScrollReveal().reveal(".tagline-delay", {
            delay: 600,
        });
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="province_origin"]').on('change', function() {
                let provinceId = $(this).val();
                if (provinceId) {
                    jQuery.ajax({
                        url: '/province/' + provinceId + '/cities',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="city_origin"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_origin"]').empty();
                }
            });
            $('select[name="province_destination"]').on('change', function() {
                let provinceId = $(this).val();
                if (provinceId) {
                    jQuery.ajax({
                        url: '/province/' + provinceId + '/cities',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="city_destination"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').empty();
                }
            });
        });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>