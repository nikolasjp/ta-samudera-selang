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
                    <h3 class="text-themecolor text-center">Dashboard Admin Company Profile</h3>
                </div>
            </div>

            <div class="container-fluid">
                @include('layout_admin.card')
                <!-- Table Checkout -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-4">Data Checkout</h4>
                                <?php $pesanan = array_reverse($pesanan); ?>
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
                                            <p class="mt-2">Pesanan ID : {{$item['pesanan_id']}}</p>
                                            <p>Nama Pemesan : {{$item['nama']}}</p>
                                            @if ($item['status'] == 'Sedang Diproses' or $item['status'] == 'Terbayar')
                                            <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target=".bd-example-modal-sm{{$key}}">Bukti Pembayaran</button>
                                            <div class="modal fade bd-example-modal-sm{{$key}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <img src="{{ asset('/storage/'.$item['img_pembelian'])}}">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="table-responsive">
                                                <table id="myTable" class="table table-bordered table-striped">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Nama Barang</th>
                                                            <th>Quantity</th>
                                                            <th>Harga</th>
                                                            <th>Total Harga Barang</th>
                                                            <th>Create At</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($item['data'] as $barang)
                                                        <?php
                                                        $total_harga_all = $item['total_harga'] + $barang->harga_pengiriman;
                                                        ?>
                                                        <tr>
                                                            <td>{{$barang->nama_produk}}</td>
                                                            <td>{{$barang->quantity}} Meter</td>
                                                            <td>Rp. {{number_format($barang->harga,0,',','.')}}</td>
                                                            <td>Rp. {{number_format($barang->total_harga,0,',','.')}}</td>
                                                            <td>{{$barang->timestamp}}</td>
                                                        </tr>
                                                        @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: bold;" colspan="2">Harga Pengiriman :</td>
                                                            <td style="font-weight: bold;">Rp. {{number_format($barang->harga_pengiriman,0,',','.')}}</td>
                                                            <td style="font-weight: bold;">Detail Alamat :</td>
                                                            <td colspan="1">{{$barang->detail_alamat}}</td>
                                                        </tr>
                                                        <tr style="font-weight: bold;">
                                                            <td colspan="2">Total Harga :</td>
                                                            <td>Rp. {{number_format($total_harga_all,0,',','.')}}</td>
                                                            <td colspan="1"></td>
                                                            @if ($barang['status'] == 'Sedang Diproses')
                                                            <td><a href="/verif/{{$barang->pesanan_id}}" onclick="return confirm('Apakah anda yakin verifikasi pembayaran ini? ?')" class="btn btn-primary mt-2 float-right">Verifikasi Pembayaran</a>
                                                            </td>
                                                            @endif
                                                            @if ($barang['status'] == 'Terbayar')
                                                            <td>
                                                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target=".bd-example-modal-xl{{$key}}">Input Nomor Resi</button>
                                                            <div style="top: 30%;" class="modal fade bd-example-modal-xl{{$key}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div style="width: max-content;padding: 20px;" class="modal-content">
                                                                        <form method="post" action="/add_pengiriman/{{$barang->pesanan_id}}" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label>Nomor Resi</label>
                                                                                <input type="text" name="nomor_resi" class="form-control" placeholder="Masukan Nomor Resi" required>
                                                                            </div>
                                                                            <button type="submit" class="btn btn-success" name="">Simpan</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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