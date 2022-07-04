<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../gambar/fix/logo.png">
    <title>Admin Samudera Selang</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Apex Chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('css_public/card.css') }}">
</head>

<body class="fix-header card-no-border">
    <div id="main-wrapper">
        @include('layout_admin.navbar_ubah')
        @include('layout_admin.aside_ubah')
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <h3 class="text-themecolor text-center">Edit Produk</h3>
                </div>
            </div>

            <div class="container-fluid">
                <div class="page-conten" id="content">
                    <div class="card mt-3">
                        <div class="card-header bg-info text-white text-center">
                            Masukkan Data Produk    
                        </div>
                        <div class="card-body">
                            <form method="post" action="/edit_produk/{{$user1->id_produk}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori" required>
                                        <option value="{{$user1->kategori}}">{{$user1->kategori}}</option>
                                        <option value="Hydraulic Hose">Hydraulic Hose</option>
                                        <option value="Industrial Hose">Industrial Hose</option>
                                        <option value="Pipa Nozel">PIPA NOZEL / INJECTION & NAPLE</option>
                                        <option value="Flexible Stainless">FLEXIBLE STAINLESS & INTERLOCK SS 304 - GALVANIS</option>
                                        <option value="Assesories ">ASSESORIES UNTUK HEAVY DUTY</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukan Nama Lengkap Produk" value="{{$user1->nama_produk}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Produk</label>
                                    <input type="text" name="detail_produk" class="form-control" placeholder="Masukan Keterangan/Detail Produk" rows="3" value="{{$user1->detail_produk}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <select class="form-control" name="status_stok" required>
                                        <option value="{{$user1->status_stok}}">{{$user1->status_stok}}</option>
                                        <option value="Stok Tersedia">Stok Tersedia</option>
                                        <option value="Stok Tidak Tersedia">Stok Tidak Tersedia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="form-label">Upload Gambar Produk</label>
                                    <input class="form-control" type="file" name="img_produk" value="{{$user1->img_produk}}">
                                </div>
                                <button type="submit" class="btn btn-success" name="">Simpan</button>
                                <button type="reset" class="btn btn-danger" name="">Bersihkan</button>
                                <a href="/admin" class="btn btn-warning">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center"> © 2022 IT Demand Samudera Selang </footer>
    </div>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- This is data table -->
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>