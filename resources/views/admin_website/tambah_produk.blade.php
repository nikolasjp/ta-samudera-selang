<!DOCTYPE html>
<html>

<head>
    <title>Tambah Produk Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css_public/nav.css') }}">
    <link href='{{ asset('gambar/logo.png')}}' rel='shourtcut icon'>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center"><img src="{{ asset('gambar/avatar.png')}}" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h4 class="m-0">Halo,</h4>
                    <p class="font-weight-light text-muted mb-0">admin</p>
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Menu</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="/admin" class="nav-link text-dark bg-light">
                    <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="/tambah" class="nav-link text-dark bg-light">
                    <i class="fas fa-map-marked-alt mr-3 text-primary fa-fw"></i>
                    Tambah Kantor
                </a>
            </li>
            <li class="nav-item">
                <a href="/tambah_produk" class="nav-link text-dark bg-light">
                    <i class="fa fa-cart-plus mr-3 text-primary fa-fw"></i>
                    Tambah Produk
                </a>
            </li>
        </ul>
    </div>
    <div class="page-content p-5" id="content">
        <h1 class="text-center mt-3">Tambah Data Produk</h1>
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Menu</small></button>
        <div class="card mt-3">

            <div class="card-header bg-info text-white text-center">
                Masukkan Data Produk
            </div>
            <div class="card-body">
                <form method="post" action="/add_produk" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" placeholder="Masukan Nama Lengkap Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Upload Gambar Produk</label>
                        <input class="form-control" type="file" name="img_produk">
                    </div>
                    <button type="submit" class="btn btn-success" name="">Simpan</button>
                    <button type="reset" class="btn btn-danger" name="">Bersihkan</button>
                    <a href="/admin" class="btn btn-warning">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
</body>

</html>