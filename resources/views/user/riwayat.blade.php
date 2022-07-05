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
            <div id="accordion{{$key}}" class="mb-3">
                <div class="card-1">
                    <div class="card-header" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}" id="head{{$key}}">
                        <div class="d-flex">
                            <p class="mb-0">
                                Invoice : {{$item['invoice']}}
                            </p>
                            <p class="mb-0 ml-4">
                                Tanggal Transaksi : {{$item['timestamp']}}
                            </p>
                            <p class="mb-0 ml-auto">
                                Status : {{$item['status']}}
                            </p>
                            <p class="mb-0 rotate ml-auto">
                                <i class="fas fa-chevron-right"></i>
                            </p>
                        </div>
                    </div>
                    <div id="collapse{{$key}}" class="collapse" aria-labelledby="head{{$key}}" data-parent="#accordion{{$key}}">
                        <div class="card-body-1">
                            <div class="card card-keranjang">
                                <div class="d-flex">
                                    <h5>Detail Pembelian Barang</h5>
                                    <a class="ml-auto" href="/detail_pembelian/{{$item['pesanan_id']}}">Detail</a>
                                </div>
                                <table id="myTable" class="table table-striped bg-white">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th class="w-220">Picture</th>
                                            <th class="w-220">Nama Barang</th>
                                            <th>Quantity</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item['data'] as $barang)
                                        <?php
                                        $i = 1;
                                        $total_harga_all = $item['total_harga'] + $barang->harga_pengiriman;
                                        ?>
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><img width="100" src="{{ asset('/storage/'.$barang->img_produk)}}" alt="{{$barang->img_produk}}"></td>
                                            <td>{{$barang->nama_produk}}</td>
                                            <td>{{$barang->quantity}} Meter</td>
                                            <td>Rp. {{number_format($barang->harga,0,',','.')}}</td>
                                            <td>Rp. {{number_format($barang->total_harga,0,',','.')}}</td>
                                        </tr>
                                        @endforeach
                                        <tr style="font-weight: bold;">
                                            <td colspan="4"></td>
                                            <td>Kode Unik :</td>
                                            <td>Rp. {{number_format($barang->random,0,',','.')}}</td>
                                        </tr>
                                        <tr style="font-weight: bold;">
                                            <td colspan="4"></td>
                                            <td>Ongkos Kirim :</td>
                                            <td>Rp. {{number_format($barang->harga_pengiriman,0,',','.')}}</td>
                                        </tr>
                                        <tr style="font-weight: bold;">
                                            <td colspan="4"></td>
                                            <td>Total Harga :</td>
                                            <td>Rp. {{number_format($total_harga_all,0,',','.')}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if ($item['status'] == 'Dikirim')
                            <?php
                            $kurir = $item['kurir'];
                            ?>
                            <div class="card card-keranjang">
                                <h5>Pengiriman</h5>
                                <p>Nomor Resi : {{$item['nomor_resi']}}</p>
                                @if ($item['kurir'] == 'tiki.png')
                                <p>Jasa Pengiriman : <img width="80" src="{{ asset('/gambar/kurir/'.$kurir)}}" alt=""></p>
                                <a target="_blank" href="https://www.tiki.id/id/tracking">Lacak Paket Anda</a>
                                @endif
                                @if ($item['kurir'] == 'jne.png')
                                <p>Jasa Pengiriman : <img width="80" src="{{ asset('/gambar/kurir/'.$kurir)}}" alt=""></p>
                                <a target="_blank" href="https://www.jne.co.id/id/tracking/trace">Lacak Paket Anda</a>
                                @endif
                                @if ($item['kurir'] == 'pos.png')
                                <p>Jasa Pengiriman : <img width="80" src="{{ asset('/gambar/kurir/'.$kurir)}}" alt=""></p>
                                <a target="_blank" href="https://www.posindonesia.co.id/id/tracking">Lacak Paket Anda</a>
                                @endif
                                @if ($item['status'] == 'Dikirim')
                                <form method="POST" action="/selesai/{{$item['pesanan_id']}}">
                                    @csrf
                                    <button type="submit" style="width: max-content;" class="btn btn-primary">Barang Telah Diterima</button>
                                </form>
                                @endif
                            </div>
                            @endif
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