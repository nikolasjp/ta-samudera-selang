<!doctype html>
<html lang="en">
@include('layout_user.head')

<body>
    @include('layout_user.navbar_detail')
    <!-- Table Checkout -->
    <div class="mt-5">
        <div class="container-xl">
            <div class="card-body">
                <div class="d-flex">
                    <h4 class="card-title text-center m-30">Keranjang Checkout</h4>
                    <p class="ml-auto">Tanggal Transaksi : {{$pesanan['timestamp']}}</p>
                </div>
                <div class="card card-keranjang">
                    <h5 class="card-title m-30"><i class="fas fa-cart-plus"></i> List Barang</h5>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th class="w-220">Nama Barang</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach ($pesanan['data'] as $key => $item)
                                {{ @csrf_field() }}
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item['nama_produk']}}</td>
                                    <td>{{$item['quantity']}}</td>
                                    <td>Rp. {{number_format($item['harga'],0,',','.')}}</td>
                                    <td>Rp. {{number_format($item['total_harga'],0,',','.')}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="font-weight: bold;">Total Harga Barang :</td>
                                    <td>Rp. {{number_format($pesanan['total_harga'],0,',','.')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                $kurir = $item['kurir'];
                $total_harga_all = $pesanan['total_harga'] + $item['harga_pengiriman'] ?>
                <div class="card card-keranjang">
                    <div class="row align-items-center">
                        <div class="col-lg-9">
                            <h5 class="card-title m-30">Detail Pembayaran</h5>
                            <p>Invoice : {{$item['invoice']}}</p>
                            <p>Harga Pengiriman : Rp. {{number_format($item['harga_pengiriman'],0,',','.')}}</p>
                            <p>Jasa Pengiriman : <img width="60" src="{{ asset('/gambar/kurir/'.$kurir)}}" alt=""></p>
                            <p>Detail Alamat Pembeli : {{$item['detail_alamat']}}</p>
                            <p style="font-weight: bold;">Kode Unik : Rp. {{number_format($item['random'],0,',','.')}}</p>
                            <p style="font-weight: bold;">Total Harga : Rp. {{number_format($total_harga_all,0,',','.')}}</p>
                            @if ($pesanan['status_bayar'] == 'Belum Terbayar')
                            <p style="font-weight: bold; color: red;">Pembayaran dapat dilakukan melalui QR yang terdapat pada gambar !! -----></p>
                            @endif
                        </div>
                        @if ($pesanan['status_bayar'] == 'Belum Terbayar')
                        <div class="col-lg-3 text-right">
                            <img src="{{ asset('/gambar/qr_bca.png')}}">
                        </div>
                        @endif
                    </div>
                </div>
                @if ($pesanan['status_bayar'] == 'Belum Terbayar')
                <form action="/bukti_pembayaran/{{$item['pesanan_id']}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card card-keranjang">
                        <h5>Kirim Bukti Pembayaran Disini</h5>
                        <div class="form-group">
                            <input class="form-control height" type="file" accept="image/*" name="img_pembelian" required>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-right mb-2">
                        <a class="mr-2" href="/riwayat">Kembali</a>
                        <button type="submit" class="btn btn_franchise">Sudah Bayar</button>
                    </div>
                </form>
                @endif
                @if ($pesanan['status_bayar'] == 'Sedang Diproses' or $pesanan['status_bayar'] == 'Terbayar')
                <a class="btn btn-primary mb-3 float-right" href="/riwayat">Kembali</a>
                @endif
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
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>