<!doctype html>
<html lang="en">
@include('layout_user.head')

<body style="background-color: rgba(216, 216, 216, 0.32);">
    @include('layout_user.navbar_keranjang')
    <!-- Table Checkout -->
    <div class="mt-4">
        <h4 class="card-title text-center m-30">Keranjang Checkout</h4>
        <div class="container-xl">
            <div class="card card-keranjang">
                <div class="card-body">
                    <div class="d-flex">
                        <h5 class="card-title m-30">List Barang</h5>
                        <a href="/#produk_page" class="ml-auto card-title m-30"><i class="fas fa-cart-plus"></i> Belanja Lagi</a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped bg-white">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th class="w-220">Picture</th>
                                    <th class="w-220">Nama Barang</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach ($belanja as $belanja)
                                <form class="form-horizontal" role="form" method="POST" action="/checkout_keranjang/{{$belanja->user_id}}">
                                    {{ @csrf_field() }}
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><img width="100" src="{{ asset('/storage/'.$belanja->img_produk)}}" alt="{{$belanja->img_produk}}"></td>
                                        <td>{{$belanja->nama_produk}}</td>
                                        <td>{{$belanja->quantity}} Meter</td>
                                        <td>Rp. {{number_format($belanja->harga,0,',','.')}}</td>
                                        <td style="width: 100px; text-align:center;"> <a href="/delete_pesanan_keranjang/{{$belanja->id}}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    @endforeach
                                    <td colspan="4">Total Harga :</td>
                                    <td colspan="2">Rp. {{number_format($total_harga,0,',','.')}}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-keranjang">
                <div class="text-left">
                    <h5>Detail Pengiriman</h5>
                </div>
                <div class="row align-items-center form-group-sm">
                    <div class="col-md-3 pad--15">
                        <div class="form-group">
                            <label for="">Pilih Kantor Terdekat</label>
                            <select name="city_origin" class="form-control" required>
                                <option value="108">Kantor Cirebon</option>
                                <option value="41">Kantor Banyumas</option>
                                <option value="398">Kantor Semarang</option>
                                <option value="472">Kantor Tegal</option>
                                <option value="468">Kantor Tasikmalaya</option>
                                <option value="196">Kantor Klaten</option>
                                <option value="209">Kantor Kudus</option>
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
                    @if(Session::has("gagal"))
                    <p style="color:red;margin:0;"> {{Session::get("gagal")}}</p>
                    @endif

                </div>

                <label>Kurir / Ekspedisi</label>
                <div class="d-flex justify-align-center align-items-center">
                    <div class="form-check text-center">
                        <div class="card-ekpedisi">
                            <img src="{{ asset('gambar/kurir/jne.png')}}" alt="kurir">
                            <p>JNE</p>
                        </div>
                        <input class="form-check-input" type="radio" name="courier" id="courier" value="jne">
                    </div>

                    <div class="form-check text-center">
                        <div class="card-ekpedisi">
                            <img src="{{ asset('gambar/kurir/tiki.png')}}" alt="kurir">
                            <p>TIKI</p>
                        </div>
                        <input class="form-check-input" type="radio" name="courier" id="courier" value="tiki">
                    </div>

                    <div class="form-check text-center">
                        <div class="card-ekpedisi">
                            <img src="{{ asset('gambar/kurir/pos.png')}}" alt="kurir">
                            <p>POS</p>
                        </div>
                        <input class="form-check-input" type="radio" name="courier" id="courier" value="pos">
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="">Alamat Lengkap Pembeli</label>
                    <textarea class="form-control" name="detail_alamat" id="" rows="3" required></textarea>
                </div>
            </div>
            <button style="margin-bottom: 20px;" type="submit" class="btn btn_franchise float-right">Beli Produk</button>
            </form>
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