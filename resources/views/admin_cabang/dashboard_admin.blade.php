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
                        </li>
                        <!-- Admin Company Profile -->
                        <li class="nav-small-cap">Admin Company Profile</li>
                        <li> <a class="waves-effect waves-dark" href="admin" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="tambah_kantor" aria-expanded="false"><i class="mdi mdi-map-marker-multiple"></i><span class="hide-menu">Tambah Kantor</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="tambah_produk" aria-expanded="false"><i class="mdi mdi-dropbox"></i><span class="hide-menu">Tambah Produk</span></a>
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
                    <h3 class="text-themecolor text-center">Dashboard Admin Cabang</h3>
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
                                        <h3 class="card-title">TOTAL BARANG</h3>
                                        <div class="stats-row">
                                            <div class="right stat-item">
                                                <h1 class="text-success text-right">{{sizeof($barang)}}</h1>
                                                <h4 class="text-right">Barang Tersedia</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-lg-3">
                                <div class="card card-ukuran">
                                    <div class="card-body card-background-2 analytics-info">
                                        <h3 class="card-title">BARANG MASUK</h3>
                                        <div class="stats-row">
                                            <div class="right stat-item">
                                                <h1 class="text-success text-right">{{$sumBarangMasuk}}</h1>
                                                <h4 class="text-right">Barang Masuk</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 3 -->
                            <div class="col-lg-3">
                                <div class="card card-ukuran">
                                    <div class="card-body card-background-3 analytics-info">
                                        <h3 class="card-title">BARANG KELUAR</h3>
                                        <div class="stats-row">
                                            <div class="right stat-item">
                                                <h1 class="text-danger text-right">{{$sumBarangKeluar}}</h1>
                                                <h4 class="text-right">Barang Keluar</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 4 -->
                            <div class="col-lg-3">
                                <div class="card card-ukuran">
                                    <div class="card-body card-background-4 analytics-info">
                                        <h3 class="card-title">STOK</h3>
                                        <div class="stats-row">
                                            <div class="right stat-item">
                                                <h1 class="text-success text-right">{{$sumStokBarang}}</h1>
                                                <h4 class="text-right">Stok Barang</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Data Table Barang</h4>
                                <!-- Modal Tambah Barang -->
                                <div class="button-box m-30">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                        Tambah Barang
                                    </button>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">
                                                    Tambah Barang Baru
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/add_barang" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>Kode Barang</label>
                                                            <input type="text" name="kode_barang" class="form-control" placeholder="ex : HS-001" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Barang</label>
                                                        <input type="text" name="nama_barang" class="form-control" placeholder="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Stok</label>
                                                        <input type="text" name="stok" class="form-control" placeholder="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Harga</label>
                                                        <input type="text" name="harga" class="form-control" placeholder="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Barang Masuk</label>
                                                        <input type="text" name="barang_masuk" class="form-control" placeholder="" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive mt-4">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                                <th>Barang Masuk</th>
                                                <th>Barang Keluar</th>
                                                <th>Perintah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barang as $barang)
                                            <tr>
                                                <td>{{$barang->kode_barang}}</td>
                                                <td>{{$barang->nama_barang}}</td>
                                                <td>{{$barang->stok}}</td>
                                                <td>{{$barang->harga}}</td>
                                                <td>{{$barang->barang_masuk}}</td>
                                                <td>{{$barang->barang_keluar}}</td>
                                                <td>
                                                    <div class="row ml-13">
                                                        <div class="button-box ml-3">
                                                            <button type="button" class="btn btn-warning no-button-box" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">
                                                                Edit
                                                            </button>
                                                        </div>
                                                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="exampleModalLabel2">
                                                                            Tambah Barang Baru
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="/edit_barang/{{$barang->id}}" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <div class="form-group">
                                                                                    <label>Kode Barang</label>
                                                                                    <input type="text" name="kode_barang" class="form-control" value="{{$barang->kode_barang}}" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Nama Barang</label>
                                                                                <input type="text" name="nama_barang" class="form-control" value="{{$barang->nama_barang}}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Stok</label>
                                                                                <input type="text" name="stok" class="form-control" value="{{$barang->stok}}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Harga</label>
                                                                                <input type="text" name="harga" class="form-control" value="{{$barang->harga}}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Barang Masuk</label>
                                                                                <input type="text" name="barang_masuk" class="form-control" value="{{$barang->barang_masuk}}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Barang Keluar</label>
                                                                                <input type="text" name="barang_keluar" class="form-control" value="{{$barang->barang_keluar}}" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                                    Close
                                                                                </button>
                                                                                <button type="submit" class="btn btn-warning">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="/delete_barang/{{$barang->id}}" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger ml-2"> Hapus </a>
                                                    </div>
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
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card responsive-over">
                            <div class="card-body">
                                <div id="harga">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
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
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
        // Chart
        $(document).ready(function() {
            const persons = [{
                    firstname: "Malcom",
                    lastname: "Reynolds"
                },
                {
                    firstname: "Kaylee",
                    lastname: "Frye"
                },
                {
                    firstname: "Jayne",
                    lastname: "Cobb"
                }
            ];

            "use strict";
            const dynamicWidth = 24 * 50;
            const chartWidth = dynamicWidth < window.innerWidth ? '100%' : dynamicWidth;
            var options = {
                zoom: {
                    enabled: true,
                    type: 'x'
                },
                colors: [
                    function({
                        value,
                        seriesIndex,
                        dataPointIndex,
                        w
                    }) {
                        if (dataPointIndex == 0) {
                            return '#90C79F'
                        } else if (dataPointIndex == 1) {
                            return '#5FB391'
                        } else if (dataPointIndex == 2) {
                            return '#449D84'
                        } else if (dataPointIndex == 3) {
                            return '#3E9073'
                        } else if (dataPointIndex == 4) {
                            return '#476F67'
                        } else if (dataPointIndex == 5) {
                            return '#276045'
                        } else if (dataPointIndex == 6) {
                            return '#76BEB9'
                        } else if (dataPointIndex == 7) {
                            return '#388C9B'
                        } else if (dataPointIndex == 8) {
                            return '#34616F'
                        } else if (dataPointIndex == 9) {
                            return '#384D61'
                        } else if (dataPointIndex == 10) {
                            return '#1D3552'
                        } else if (dataPointIndex == 11) {
                            return '#899FCA'
                        } else if (dataPointIndex == 12) {
                            return '#ABC2DF'
                        } else if (dataPointIndex == 13) {
                            return '#759FCF'
                        } else if (dataPointIndex == 14) {
                            return '#3D4A92'
                        } else if (dataPointIndex == 15) {
                            return '#1C549F'
                        } else if (dataPointIndex == 16) {
                            return '#37719D'
                        } else if (dataPointIndex == 17) {
                            return '#3885A6'
                        } else if (dataPointIndex == 18) {
                            return '#676EA3'
                        } else if (dataPointIndex == 19) {
                            return '#585898'
                        } else if (dataPointIndex == 20) {
                            return '#A09DCA'
                        } else if (dataPointIndex == 21) {
                            return '#C3A9CD'
                        } else if (dataPointIndex == 22) {
                            return '#95579B'
                        } else if (dataPointIndex == 23) {
                            return '#742779'
                        } else {
                            return 'fff'
                        }
                    }
                ],
                series: [{
                    type: "column",
                    data: ['{{$barang->stok}}'],
                }, ],
                chart: {
                    height: 350,
                    width: chartWidth,
                    type: "line",
                    toolbar: {
                        show: false
                    }
                },
                stroke: {
                    width: [0, 2],
                },
                grid: {
                    show: false,
                },
                labels: [
                    "{{$barang->nama_barang}}",
                    "31 JAN",
                    "15 FEB",
                    "28 FEB",
                    "15 MAR",
                    "31 MAR",
                    "15 APR",
                    "30 APR",
                    "15 MAY",
                    "31 MAY",
                    "15 JUN",
                    "30 JUN",
                    "15 JUL",
                    "31 JUL",
                    "15 AUG",
                    "31 AUG",
                    "15 SEP",
                    "30 SEP",
                    "15 OCT",
                    "31 OCT",
                    "15 NOV",
                    "30 NOV",
                    "15 DEC",
                    "31 DEC",
                ],
                title: {
                    text: 'JUMLAH BARANG TERJUAL - PERIODE 2022',
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold',
                        fontFamily: 'HelveticaNeue',
                        color: '#5A7D8D'
                    },
                },
                yaxis: {
                    show: false,
                },
                xaxis: {
                    type: "String",
                    tickAmount: 24,
                    tickPlacement: 'between',
                },
            };

            var chart = new ApexCharts(document.querySelector("#harga"), options);
            chart.render();
        });
    </script>
</body>

</html>