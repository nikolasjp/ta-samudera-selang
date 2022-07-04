<!doctype html>
<html lang="en">
@include('layout_user.head')

<body>
    @include('layout_user.navbar_login')
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid jumbotron-background-1">
        <div class="container">
            <p class="lead tagline">Samudera Selang Cirebon</p>
            <h1 class="display-4 tagline-core-left"><span>Perusahaan Penjualan Sparepart & Hose Hydraulik</span></h1>
            <a href="#produk_page" class="btn btn_see_produk tagline-core-right">See Produk</a>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Info Perusahaan -->
    <div class="body-perusahaan">
        <div class=" container">
            <h1 class="text-center tagline" style="color: white;">Skala Kami</h1>
            <div class="row justify-content-center">
                <div class="col-lg-8 info-panel">
                    <div class="row">
                        <!-- Info 1 -->
                        <div class="col-lg tagline-core-left">
                            <img src="{{ asset('gambar/gambar/office 1.png')}}" alt="office">
                            <h4>{{sizeof($kantor)}}</h4>
                            <p>Toko & Kantor</p>
                        </div>
                        <!-- Info 2 -->
                        <div class="col-lg tagline-down">
                            <img src="{{ asset('gambar/gambar/worker 1.png')}}" alt="worker">
                            <h4>100+</h4>
                            <p>Karyawan</p>
                        </div>
                        <!-- Info 3 -->
                        <div class="col-lg tagline-core-right">
                            <img src="{{ asset('gambar/gambar/delivery-box 1.png')}}" alt="product">
                            <h4>{{sizeof($produk)}}</h4>
                            <p>Product</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Info Perusahaan -->

    <!-- Profile Perusahaan -->
    <div class="body-profile" id="profile_page">
        <div class="container">
            <div class="row align-items-center profile_perusahaan mt-5">
                <div class="col tagline-down">
                    <img src="{{ asset('gambar/gambar/kantor_profile.png')}}" class="img-fluid profile_samudera" alt="profile_image">
                </div>
                <div class="col-lg-6 mt-2 mobile-center">
                    <h1 class="tagline-core-left">Profile Samudera Selang</h1>
                    <p id="produk_page" class="tagline-core-left-delay">PT. Samudera Selang yang berpusat di kota Cirebon Jawa Barat adalah perusahaan yang bergerak di bidang Import dan supply kebutuhan sparepart untuk pertambangan, industri minyak dan gas serta otomotif.</p>
                    <p class="tagline-core-left-delay">Untuk meningkatkan pelayanan yang maksimal, kami hadir diberbagai kota antara lain Cirebon, Tegal, Semarang, Jogya, Cilacap, Tasikmalaya, Purwokerto, Klaten dengan didukung SDM yang mumpuni serta pelayanan 24 jam, dengan dukungan produk bergaransi.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Profile Perusahaan -->

    <!-- Menyediakan Apa yang Dibutuhkan -->
    <div class="body-produk">
        <div class="container-xl mt-5">
            <h1 class="text-center tagline">Kami Menyediakan yang Anda Butuhkan</h1>
            <div class="row mobile-center">
                <!-- Hose Hydaulic -->
                <div class="col-lg tagline-core-left">
                    <div class="card-produk">
                        <div class="icon">
                            <img src="{{ asset('/gambar/card/hose.png')}}" width="64px" alt="product">
                        </div>
                        <div class="card-produk-text">
                            <p>Hydraulic Hose</p>
                        </div>
                        <div class="card-produk-hover text-center">
                            <h5>Hydraulic Hose</h5>
                            <p class="mt-3">Adalah selang hydraulic dengan tekanan tinggi maupun rendah.</p>
                            <p>{{sizeof($produk_hydraulic)}} Produk</p>
                            <a href="/produk_hose" class="hyper-link"></a>
                        </div>
                    </div>
                </div>
                <!-- Industrial Hose -->
                <div class="col-lg tagline-core-right">
                    <div class="card-produk">
                        <div class="icon">
                            <img src="{{ asset('/gambar/card/excavator.png')}}" width="64px" alt="excavator">
                        </div>
                        <div class="card-produk-text">
                            <p>Industrial Hose</p>
                        </div>
                        <div class="card-produk-hover text-center">
                            <h5>Industrial Hose</h5>
                            <p class="mt-3">Adalah produk pipa flexible yang mana diaplikasikan untuk rem angin, rem oli serta sambungan pipa.</p>
                            <p>{{sizeof($produk_industrial)}} Produk</p>
                            <a href="/produk_industrial" class="hyper-link"></a>
                        </div>
                    </div>
                </div>
                <!-- PIPA NOZEL / INJECTION & NAPLE -->
                <div class="col-lg tagline-core-left-delay">
                    <div class="card-produk">
                        <div class="icon">
                            <img src="{{ asset('/gambar/card/forklift.png')}}" width="64px" alt="forklift">
                        </div>
                        <div class="card-produk-text">
                            <p>Pipa Nozel / Injection</p>
                        </div>
                        <div class="card-produk-hover text-center">
                            <h5>Pipa Nozel / Injection</h5>
                            <p class="mt-3">Adalah produk pipa untuk diaplikasikan pada unit engine berbahan solar.</p>
                            <p>{{sizeof($produk_pipa)}} Produk</p>
                            <a href="/produk_pipa_nozel" class="hyper-link"></a>
                        </div>
                    </div>
                </div>
                <!-- Felxible Stainless -->
                <div class="col-lg tagline-core-right-delay">
                    <div class="card-produk">
                        <div class="icon">
                            <img src="{{ asset('/gambar/card/excavator-2.png')}}" width="64px" alt="excavator-2">
                        </div>
                        <div class="card-produk-text">
                            <p>Felxible Stainless</p>
                        </div>
                        <div class="card-produk-hover text-center">
                            <h5>Felxible Stainless</h5>
                            <p class="mt-3">Adalah salah satu produk kami dengan system pembikinan pressing, welding and holding.</p>
                            <p>{{sizeof($produk_felxible)}} Produk</p>
                            <a href="/produk_felxible" class="hyper-link"></a>
                        </div>
                    </div>
                </div>
                <!-- Assesoris Heavy Duty -->
                <div class="col-lg tagline-core-left-delay-1">
                    <div class="card-produk">
                        <div class="icon">
                            <img src="{{ asset('/gambar/card/mechanical-arm.png')}}" width="64px" alt="mechanical-arm">
                        </div>
                        <div class="card-produk-text">
                            <p>Assesoris Heavy Duty</p>
                        </div>
                        <div class="card-produk-hover text-center">
                            <h5>Assesoris Heavy Duty</h5>
                            <p class="mt-3">Adalah serangkaian produk import untuk melengkapi penanggan sekalian untuk melakukan pembelanjaan</p>
                            <p>{{sizeof($produk_assesoris)}} Produk</p>
                            <a href="/produk_assesoris" class="hyper-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hadir di berbagai kota -->
    <div class="container-xl mt-5 mb-5">
        <h1 class="text-center tagline">Kami hadir diberbagai kota</h1>
        <div class="row align-items-center mt-5">
            <div class="col-lg-9">
                <div class="box-kota tagline-core-left-delay">
                    <div class="row">
                        <!-- Cirebon -->
                        <div class="col-lg">
                            <div class="card-kota">
                                <div class="card-kota-content">
                                    <h4>Kota Cirebon</h4>
                                    <img src="{{ asset('/gambar/kota/cirebon.png')}}" alt="cirebon">
                                </div>
                                <div class="card-produk-hover text-center">
                                    <p>Jalan Ahmad Yani, Kalijaga, Harjamukti, Cirebon City, West Java 45142</p>
                                </div>
                            </div>
                        </div>
                        <!-- Tegal -->
                        <div class="col-lg">
                            <div class="card-kota top-mobile">
                                <div class="card-kota-content">
                                    <h4>Kota Tegal</h4>
                                    <img src="{{ asset('/gambar/kota/tegal.png')}}" width="80px" style="white-space:nowrap;" alt="tegal">
                                </div>
                                <div class="card-produk-hover text-center">
                                    <p>Jalan Raya Pantura No.130, Margadana, Kec. Margadana, Kota Tegal, Jawa Tengah 52143</p>
                                </div>
                            </div>
                        </div>
                        <!-- Yogyakarta  -->
                        <div class="col-lg">
                            <div class="card-kota top-mobile">
                                <div class="card-kota-content">
                                    <h4>Kota Yogyakarta</h4>
                                    <img src="{{ asset('/gambar/kota/yogyakarta.png')}}" alt="yogyakarta">
                                </div>
                                <div class="card-produk-hover text-center">
                                    <p>Jalan Nasional 3, Demen 2, Demen, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 top-mobile text-center tagline-core-right-delay">
                <h5>Untuk meningkatkan pelayanan yang maksimal, kami hadir diberbagai kota antara lain</h3>
                    <a href="/contact" class="btn btn_see_all mt-2">Lihat Semua Lokasi</a>
            </div>
        </div>
    </div>

    <!-- Mitra Sejati -->
    <div class="body_mitra mobile-center">
        <div class="container">
            <div class="row align-items-center tagline">
                <div class="col-lg-6">
                    <div class="text_mitra">
                        <h1>Mitra Sejati Kami</h1>
                        <h5>Kepuasan Pelanggan adalah prioritas kami. Jadilah salah satu dari mereka.</h5>
                    </div>
                    <a href="/franchise" class="btn btn_mitra mt-2">Layanan Kami</a>
                </div>
                <div class="col-lg-6">
                    <div class="row mobile-center">
                        @foreach ($mitra as $mitra)
                        <img class="ml-4 mt-4" src="{{ asset('/storage/'.$mitra->img_mitra)}}" alt="{{$mitra->nama_mitra}}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kosultasi -->
    <div class="container mt-5">
        <div class="box-konsultasi tagline-down">
            <div class="row align-items-center mobile-center">
                <div class="col-lg-9">
                    <h1>Konsultasi dengan ahlinya</h1>
                    <h4>Untuk mendapat solusi terbaik tentang Selang</h4>
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
                        <h6 class="font-weight-bold">
                            <a href="#profile_page" class="text-white">About Us</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

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
                            <a href="#produk_page" class="text-white">Produk</a>
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

    <!-- Optional JavaScript -->

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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>