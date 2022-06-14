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
    <link rel="stylesheet" href="{{ asset('css_public/franchise.css') }}">

    <!-- Font Awesome -->
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
                    <a class="nav-item nav-link active" href="/contact">Persebaran Kantor</a>
                    <a class="nav-item btn btn_franchise" href="/franchise">Franchise</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="box"></div>
    <div class="container mt-7 tagline">
        <h1 class="mobile-center" style="font-weight: bold; color: white;">Lokasi Kami</h1>
    </div>

    <div class="container">
        <div class="row p-20 align-items-center">
            <div class="col-lg tagline-core-left mobile-center">
                <h1 class="text-kantor-pusat">Kantor Pusat</h1>
                <p>Jl. Ahmad Yani, Kalijaga, Kec. Harjamukti, Kota Cirebon, Jawa Barat 45142</p>
                <a href="https://maps.app.goo.gl/Te2XCQQrMbDHw5968">Lokasi</a>
            </div>
            <div class="col-lg">
                <img src="{{ asset('gambar/ills-kantor.jpg')}}" width="500px" style="border-radius: 40px;" alt="" class="img-fluid mt-4 tagline-core-right">
            </div>
        </div>
        <div class="row tagline-down-delay">
            @foreach ($user as $user)
            <div class="col-lg-4 mb-5 mobile-center">
                <h3 class="text-kantor-pusat">{{$user->kota}}</h3>
                <p>{{$user->alamat}}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #3C3C3C" id="footer_page">
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Links -->
            <section class="mt-5">
                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center pt-5">

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="font-weight-bold">
                            <a href="/contact" class="text-white">Kantor</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="font-weight-bold">
                            <a href="/franchise" class="text-white">Franchise</a>
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
                            Contact Us : 081326694806
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>