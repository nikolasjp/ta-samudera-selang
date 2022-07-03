<!doctype html>
<html lang="en">
@include('layout_user.head')

<body style="background: rgba(216, 216, 216, 0.32);">
    @include('layout_user.navbar_riwayat')
    <!-- Table Checkout -->
    <div class="mt-5">
        <div class="container-xl">
            <h4 class="card-title text-center m-30">Riwayat Pembelian</h4>
            @foreach ($pesanan as $key => $item)
            <div id="accordion{{$key}}" class="mt-3">
                <div class="card-1">
                    <div class="card-header" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}" id="head{{$key}}">
                        <div class="d-flex">
                            <p class="mb-0">
                                Invoice : {{$item['invoice']}}
                            </p>
                            <p class="mb-0 ml-4">
                                Tanggal Transaksi : {{$item['timestamp']}}
                            </p>
                            <p class="mb-0 rotate ml-auto">
                                <i class="fas fa-chevron-right"></i>
                            </p>
                        </div>
                    </div>
                    <div id="collapse{{$key}}" class="collapse" aria-labelledby="head{{$key}}" data-parent="#accordion{{$key}}">
                        <div class="card-body-1 d-flex">
                            <div class="card card-2 p-3">
                                <h5>Detail Pembelian Barang</h5>
                                <!-- <p>Barang 1 :</p> -->
                                @foreach ($item['data'] as $barang)
                                <div class="d-flex">
                                    <p>Nama Barang : {{$barang->nama_produk}} |</p>
                                    <p class="ml-1">Quantity : {{$barang->quantity}} |</p>
                                    <p class="ml-1">Harga : Rp. {{number_format($barang->harga,0,',','.')}} |</p>
                                    <p class="ml-1">Total Harga : Rp. {{number_format($barang->total_harga,0,',','.')}} |</p>
                                </div>
                                @endforeach
                            </div>

                            <div class="card card-2 p-3">
                                <h5>Rincian Pembayaran</h5>
                                <p>Metode Pembayaran : Bank BCA</p>
                                <p>Total Harga : Rp. {{number_format($item['total_harga'],0,',','.')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

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

    <script>
        $(".rotate").click(function() {
            $(this).toggleClass("down");
        });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>