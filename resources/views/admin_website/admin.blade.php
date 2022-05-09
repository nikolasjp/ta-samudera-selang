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
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
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
                        <!-- Admin Cabang -->
                        <li class="nav-small-cap">Admin Cabang</li>
                        <li> <a class="waves-effect waves-dark" href="dashboard_admin" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        <li> <a class="waves-effect waves-dark" href="tambah_barang" aria-expanded="false"><i class="mdi mdi-dropbox"></i><span class="hide-menu">Tambah Barang</span></a>
                        </li>
                        </li>

                        <!-- Admin Company Profile -->
                        <li class="nav-small-cap">Admin Company Profile</li>
                        <li> <a class="waves-effect waves-dark" href="admin" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="tambah_kantor" aria-expanded="false"><i class="mdi mdi-map-marker-multiple"></i><span class="hide-menu">Tambah Kantor</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="tambah_produk" aria-expanded="false"><i class="mdi mdi-dropbox"></i><span class="hide-menu">Tambah Produk</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="tambah_mitra" aria-expanded="false"><i class="mdi mdi-dropbox"></i><span class="hide-menu">Tambah Mitra</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="tambah_artikel" aria-expanded="false"><i class="mdi mdi-dropbox"></i><span class="hide-menu">Tambah Artikel</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <h3 class="text-themecolor text-center">Dashboard Admin Company Profile</h3>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Card 1 -->
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card card-ukuran">
                                    <div class="card-body analytics-info card-background-1">
                                        <h3 class="card-title">TOTAL KANTOR</h3>
                                        <div class="stats-row">
                                            <div class="right stat-item">
                                                <h1 class="text-success text-right">{{sizeof($user)}}</h1>
                                                <h4 class="text-right">Kantor Tersedia</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-lg-3">
                                <div class="card card-ukuran">
                                    <div class="card-body card-background-2 analytics-info">
                                        <h3 class="card-title">TOTAL PRODUK</h3>
                                        <div class="stats-row">
                                            <div class="right stat-item">
                                                <h1 class="text-success text-right">{{sizeof($user1)}}</h1>
                                                <h4 class="text-right">Produk Tersedia</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-lg-3">
                                <div class="card card-ukuran">
                                    <div class="card-body card-background-3 analytics-info">
                                        <h3 class="card-title">TOTAL MITRA</h3>
                                        <div class="stats-row">
                                            <div class="right stat-item">
                                                <h1 class="text-success text-right">{{sizeof($mitra)}}</h1>
                                                <h4 class="text-right">Mitra Tersedia</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div class="col-lg-3">
                                <div class="card card-ukuran">
                                    <div class="card-body card-background-4 analytics-info">
                                        <h3 class="card-title">TOTAL ARTIKEL</h3>
                                        <div class="stats-row">
                                            <div class="right stat-item">
                                                <h1 class="text-success text-right">{{sizeof($produk_detail)}}</h1>
                                                <h4 class="text-right">Artikel Tersedia</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table Kantor -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center m-30">Data Table Kantor</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th class="w-220">Daerah Kantor</th>
                                                <th>Alamat</th>
                                                <th>Image</th>
                                                <th class="w-200">Perintah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->kota}}</td>
                                                <td>{{$user->alamat}}</td>
                                                <td>{{$user->img}}</td>
                                                <td>
                                                    <a href="/ubah_kantor/{{$user->id}}" class="btn btn-warning"> Edit </a>
                                                    <a href="/delete/{{$user->id}}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger"> Hapus </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table Produk -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center m-30">Data Table Produk</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable1" class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Image</th>
                                                <th>Detail Produk</th>
                                                <th>Status</th>
                                                <th>Perintah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user1 as $user1)
                                            <tr>
                                                <td>{{$user1->id_produk}}</td>
                                                <td>{{$user1->nama_produk}}</td>
                                                <td>{{$user1->img_produk}}</td>
                                                <td>{{$user1->detail_produk}}</td>
                                                <td>{{$user1->status_stok}}</td>
                                                <td>
                                                    <a href="/ubah_produk/{{$user1->id_produk}}" class="btn btn-warning"> Edit </a>
                                                    <a href="/delete_produk/{{$user1->id_produk}}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger"> Hapus </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Mitra -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center m-30">Data Table Mitra</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable2" class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Mitra</th>
                                                <th>Image</th>
                                                <th>Perintah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mitra as $mitra)
                                            <tr>
                                                <td>{{$mitra->id}}</td>
                                                <td>{{$mitra->nama_mitra}}</td>
                                                <td>{{$mitra->img_mitra}}</td>
                                                <td>
                                                    <a href="/ubah_mitra/{{$mitra->id}}" class="btn btn-warning"> Edit </a>
                                                    <a href="/delete_mitra/{{$mitra->id}}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger"> Hapus </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Artikel -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center m-30">Data Table Artikel Produk</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable3" class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori Artikel</th>
                                                <th>Header Produk</th>
                                                <th>Content Paragraf 1</th>
                                                <th>Content Paragraf 2</th>
                                                <th>Perintah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produk_detail as $produk_detail)
                                            <tr>
                                                <td>{{$produk_detail->id}}</td>
                                                <td>{{$produk_detail->kategori_artikel}}</td>
                                                <td>{{$produk_detail->header_produk}}</td>
                                                <td>{{$produk_detail->content_produk}}</td>
                                                <td>{{$produk_detail->content_produk_2}}</td>
                                                <td>
                                                    <a href="/ubah_artikel/{{$produk_detail->id}}" class="btn btn-warning"> Edit </a>
                                                    <a href="/delete_artikel/{{$produk_detail->id}}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger"> Hapus </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable1').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable3').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable2').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>