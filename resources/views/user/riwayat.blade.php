<!doctype html>
<html lang="en">
@include('layout_user.head')

<body>
    @include('layout_user.navbar_riwayat')
    <!-- Table Checkout -->
    <div class="mt-5">
        <div class="container-xl">
            <div class="card-body">
                <h4 class="card-title text-center m-30">Data Table Checkout</h4>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th class="w-220">Nama Barang</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Harga Pengiriman</th>
                                <th>Detail Alamat</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $riwayat)
                            <tr>
                                <td>{{$riwayat->nama_barang}}</td>
                                <td>{{$riwayat->harga}}</td>
                                <td>{{$riwayat->quantity}}</td>
                                <td>{{$riwayat->harga_pengiriman}}</td>
                                <td>{{$riwayat->detail_alamat}}</td>
                                <td>{{$riwayat->total_harga}}</td>
                                <td>{{$riwayat->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>