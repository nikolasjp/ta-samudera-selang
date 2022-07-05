<!doctype html>
<html lang="en">

@include('layout_user.head')

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

    <!-- Hose Home -->
    <div class="body-hose">
        <div class="container">
            <div class="text-hose">
                <div class="col-lg-8">
                    <h5 class="tagline">Produk</h5>
                    <h1 class="tagline-core-left">{{$artikel[0]->header_produk}}</h1>
                    <p class="tagline-core-right">
                        {{$artikel[0]->content_produk}}
                    </p>
                </div>
            </div>
            <img src="{{ asset('/gambar/produk/user.png')}}" class="img-user tagline-down-delay" alt="user">
        </div>
    </div>

    <!-- Penjelasan Tambahan -->
    <div class="container">
        <div class="padding text-center">
            <h1 class="tagline">{{$artikel[0]->header_produk}}</h1>
            <p class="mt-4 tagline-core-left-delay">{{$artikel[0]->content_produk_2}}</p>
        </div>
    </div>

    <!-- List Produk -->
    <div class="body-produk-hose">
        <h1 class="tagline-down">List Produk {{$artikel[0]->header_produk}}</h1>
        <div class="container-xl">
            <div class="row">
                @foreach ($produk_hose as $produk_hose)
                <div class="col-lg-3 tagline-delay">
                    <div class="card_produk_hose mt-5">
                        <img width="100" src="{{ asset('/storage/'.$produk_hose->img_produk)}}" alt="{{$produk_hose->nama_produk}}">
                        <h5>{{$produk_hose->nama_produk}}</h5>
                        <div class="card-produk-hover text-center">
                            <h5>{{$produk_hose->nama_produk}}</h5>
                            <p class="mt-3">{{$produk_hose->detail_produk}}</p>
                            <p>Stok {{$produk_hose->status_stok}}</p>
                            <a href="/beli_produk/{{$produk_hose->id_produk}}" class="hyper-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Kosultasi -->
    <div class="container mt-5">
        <div class="box-konsultasi tagline">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1>Konsultasi dengan ahlinya</h1>
                    <h4>Untuk mendapat solusi terbaik tentang {{$artikel[0]->header_produk}}</h4>
                </div>
                <a href="https://api.whatsapp.com/send?phone=+6282217277481&text=Halo,%20saya%20konsumen%20samudera%20selang,%20saya%20ingin%20bertanya" target="_blank" class="col-lg-3 btn btn-konsultasi top-mobile">Konsultasi Sekarang</a>
            </div>
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