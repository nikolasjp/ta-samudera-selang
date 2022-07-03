<!doctype html>
<html lang="en">
@include('layout_user.head')

<body>
    @include('layout_user.navbar_detail')
    <!-- Table Checkout -->
    <div class="mt-5">
        <div class="container-xl">
            <div class="card-body">
                <h4 class="card-title text-center m-30">Keranjang Checkout</h4>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th class="w-220">Nama Barang</th>
                                <th>Quantity</th>
                                <th>Harga</th>
                                <th>Perintah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            @foreach ($pesanan as $key => $item)
                            {{ @csrf_field() }}
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->nama_produk}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->harga}}</td>
                                <td style="width: 100px;"> <a href="/delete_pesanan_keranjang/{{$item->id}}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger"> Hapus </a></td>
                            </tr>
                            @endforeach
                            <td colspan="3">Total Harga :</td>
                            <td colspan="2">{{$total_harga}}</td>
                        </tbody>
                    </table>
                </div>
                <button style="margin-top: 12px;" type="submit" class="btn btn_franchise">Beli Produk</button>
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