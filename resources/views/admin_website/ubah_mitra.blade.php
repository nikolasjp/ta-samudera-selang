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
    <link rel="icon" type="image/png" sizes="16x16" href="../gambar/Fix/logo.png">
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
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <img src="../gambar/fix/logo.png" alt="homepage" style="width: 40px;" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            Samudera Selang
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse justify-content-right">
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown float-right">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar1.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../assets/images/avatar1.png" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Nicholass Jeffensen</h4>
                                                <p class="text-muted">Manager</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-power-off"></i> Logout</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" style="position: fixed;">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="../assets/images/avatar1.png" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5>Nicholass Jeffensen</h5>
                        <p class="text-muted">Manager</p>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <h3 class="text-themecolor text-center">Edit Lokasi</h3>
                </div>
            </div>

            <div class="container-fluid">
                <div class="page-conten" id="content">
                    <div class="card mt-3">
                        <div class="card-header bg-info text-white text-center">
                            Masukkan Data Lokasi
                        </div>
                        <div class="card-body">
                            <form method="post" action="/edit_mitra/{{$mitra->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Mitra</label>
                                    <input type="text" name="nama_mitra" class="form-control" placeholder="Masukan Nama Mitra" value="{{$mitra->nama_mitra}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="form-label">Ubah Gambar Mitra</label>
                                    <input class="form-control" type="file" name="img_mitra" value="{{$mitra->img}}">
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