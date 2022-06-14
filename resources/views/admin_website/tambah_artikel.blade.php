<!DOCTYPE html>
<html lang="en">

@include('layout_admin.head')

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        @include('layout_admin.header')
        @include('layout_admin.sidebar')
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <h3 class="text-themecolor text-center">Tambah Data Produk</h3>
                </div>
            </div>

            <div class="container-fluid">
                <div class="page-conten" id="content">
                    <div class="card mt-3">
                        <div class="card-header bg-info text-white text-center">
                            Masukkan Data Produk
                        </div>
                        <div class="card-body">
                            <form method="post" action="/add_artikel" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Kategori Artikel</label>
                                    <select class="form-control" name="kategori_artikel" required>
                                        <option value="" disabled selected>Pilihan</option>
                                        <option value="Hydraulic Hose">Hydraulic Hose</option>
                                        <option value="Industrial Hose">Industrial Hose</option>
                                        <option value="Pipa Nozel">PIPA NOZEL / INJECTION & NAPLE</option>
                                        <option value="Flexible Stainless">FLEXIBLE STAINLESS & INTERLOCK SS 304 - GALVANIS</option>
                                        <option value="Assesories ">ASSESORIES UNTUK HEAVY DUTY</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <select class="form-control" name="header_produk" required>
                                        <option value="" disabled selected>Pilihan</option>
                                        <option value="Hydraulic Hose">Hydraulic Hose</option>
                                        <option value="Industrial Hose">Industrial Hose</option>
                                        <option value="Pipa Nozel">PIPA NOZEL / INJECTION & NAPLE</option>
                                        <option value="Flexible Stainless">FLEXIBLE STAINLESS & INTERLOCK SS 304 - GALVANIS</option>
                                        <option value="Assesories ">ASSESORIES UNTUK HEAVY DUTY</option>
                                    </select>
                                    <div class="form-group">
                                        <label>Konten Paragraf 1</label>
                                        <input type="text" name="content_produk" class="form-control" placeholder="Masukan Konten Paragraf 1" required>
                                        <div class="form-group">
                                            <label>Konten Paragraf 2</label>
                                            <input type="text" name="content_produk_2" class="form-control" placeholder="Masukan Konten Paragraf 2" required>
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