<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- My Font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Viga&display=swap');
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css_public/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css_public/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css_public/footer.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Samudera Selang</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('gambar/fix/logo.png')}}" width="49" height="49" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#profile_page">Profile</a>
                    <a class="nav-item nav-link" href="#persebaran_page">Persebaran Kantor</a>
                    <a class="nav-item nav-link" href="#produk_page">Produk</a>
                    <a class="nav-item btn btn-primary tombol" href="/franchise">Franchise</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid jumbotron-background-1">
        <div class="container">
            <p class="lead">Samudera Selang Cirebon</p>
            <h1 class="display-4"><span>Perusahaan Penjualan
                    Sparepart & Hose Hydraulik</span></h1>
            <a href="" class="btn btn-primary btn-lg tombol1">See Produk</a>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Info Perusahaan -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 info-panel">
                <div class="row">
                    <!-- Info 1 -->
                    <div class="col-lg">
                        <img src="{{ asset('storage/gambar/office 1.png')}}" alt="office">
                        <h4>10+</h4>
                        <p>Toko & Kantor</p>
                    </div>
                    <!-- Info 2 -->
                    <div class="col-lg">
                        <img src="{{ asset('storage/gambar/worker 1.png')}}" alt="worker">
                        <h4>100+</h4>
                        <p>Karyawan</p>
                    </div>
                    <!-- Info 3 -->
                    <div class="col-lg">
                        <img src="{{ asset('storage/gambar/delivery-box 1.png')}}" alt="product">
                        <h4>50+</h4>
                        <p>Product</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Info Perusahaan -->

    <!-- Profile Perusahaan -->
    <div class="container">
        <div class="row profile_perusahaan">
            <div class="col">
                <img src="{{ asset('storage/gambar/kantor_profile.png')}}" class="img-fluid profile_samudera" alt="profile_image">
            </div>
            <div class="col-lg-6">
                <h3 class="profile_samudera" id="profile_page">PROFILE SAMUDERA SELANG</h3>
                <p>PT. Samudera Selang yang berpusat di kota Cirebon Jawa Barat adalah perusahaan yang bergerak di bidang Import dan supply kebutuhan sparepart untuk pertambangan, industri minyak dan gas serta otomotif.</p>
            </div>
        </div>
    </div>
    <!-- Akhir Profile Perusahaan -->

    <!-- Persebaran Kantor -->
    <!-- Dropdown & Radio Text -->
    <div class="container mt-5">
        <div class="col">
            <h1 class="margin_produk text-center" id="persebaran_page">PERSEBARAN KANTOR</h1>
        </div>
        <div class="card-content" style="display: none">
            <div class="card-deck">
                @foreach ($user as $user)
                <div class="card" data-role="test">
                    <img class="card-img-top" src="{{ asset('storage/' . $user->img) }}" alt="kantor_cirebon">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->kota}}</h5>
                        <p class="card-text">{{$user->alamat}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="pagination">
        </div>
    </div>
    <!-- Akhir Dari Dropdown & Radio Text -->
    <!-- Akhir Persebaran Kantor -->

    <!-- Product -->
    <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <h1 class="margin_produk" id="produk_page">PRODUK YANG DITAWARKAN</h1>
            </div>
        </div>
        <div class="card-content1" style="display: none">
            <div class="card-deck" data-role="card-content1">
                @foreach ($user1 as $user1)
                <div class="card card1 card_produk">
                    <img class="card-image" src="{{ asset('storage/' . $user1->img_produk) }}" alt="$user1->img">
                    <div class="card-body">
                        <h5 class="nama_produk1">{{$user1->nama_produk}}</h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="pagination1">
        </div>
    </div>

    <!-- Akhir Product -->

    <!-- Footer -->
    <!-- Remove the container if you want to extend the Footer to full width. -->

    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #3C3C3C" id="footer_page">
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Links -->
            <section class="mt-5">
                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center pt-5">
                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">About us</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#produk" class="text-white">Office</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">Products</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">Franchise</a>
                        </h6>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-5" />

            <!-- Section: Text -->
            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>
                            Kami ingin menjadi bagian dari mitra anda untuk maju bersama menyongsong masa depan yang lebih sukses.
                        </p>
                        <b>
                            Contact Us : 081326694806
                        </b>
                    </div>
                </div>
            </section>
            <!-- Section: Text -->

            <!-- Section: Social -->
            <b>
                Follow Us
            </b>
            <section class="text-center mb-5">
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4 ml-2 mt-4">
                    <i class="fab fa-github"></i>
                </a>
            </section>
            <!-- Section: Social -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 Copyright :
            <a class="text-white" href=""> IT Demand Samudera Selang | All rights reserved</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- JS Paginaton Kantor -->
    <script type="text/javascript">
        function getPageList(totalPages, page, maxLength) {
            function range(start, end) {
                return Array.from(Array(end - start + 1), (_, i) => i + start);
            }

            var sideWidth = maxLength < 9 ? 1 : 2;
            var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
            var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

            if (totalPages <= maxLength) {
                return range(1, totalPages);
            }

            if (page <= maxLength - sideWidth - 1 - rightWidth) {
                return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
            }

            if (page >= totalPages - sideWidth - 1 - rightWidth) {
                return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
            }

            return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
        }

        $(function() {
            let numberOfItems = $(".card-content .card").length;
            let limitPerPage = 3; //How many card items visible per a page
            let totalPages = Math.ceil(numberOfItems / limitPerPage);
            let paginationSize = 5; //How many page elements visible in the pagination
            let currentPage;

            function showPage(whichPage) {
                if (whichPage < 1 || whichPage > totalPages) return false;

                currentPage = whichPage;

                $(".card-content .card").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

                $(".pagination li").slice(1, -1).remove();

                getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                    $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
                        .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                            .attr({
                                href: "javascript:void(0)"
                            }).text(item || "...")).insertBefore(".next-page");
                });

                $(".previous-page").toggleClass("disable", currentPage === 1);
                $(".next-page").toggleClass("disable", currentPage === totalPages);
                return true;
            }

            $(".pagination").append(
                $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({
                    href: "javascript:void(0)"
                }).text("Prev")),
                $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({
                    href: "javascript:void(0)"
                }).text("Next"))
            );

            $(".card-content").show();
            showPage(1);

            $(document).on("click", ".pagination li.current-page:not(.active)", function() {
                return showPage(+$(this).text());
            });

            $(".next-page").on("click", function() {
                return showPage(currentPage + 1);
            });

            $(".previous-page").on("click", function() {
                return showPage(currentPage - 1);
            });
        });
    </script>
    <!-- Akhir JS Kantor -->

    <!-- Awal JS Produk -->
    <script type="text/javascript">
        function paging() {
            let numberOfItems = $(".card-content1 .card").length;
            let limitPerPage = 3; //How many card items visible per a page
            let totalPages = Math.ceil(numberOfItems / limitPerPage);
            let paginationSize = 5; //How many page elements visible in the pagination
            let currentPage;

            function showPage(whichPage) {
                if (whichPage < 1 || whichPage > totalPages) return false;

                currentPage = whichPage;

                $(".card-content1 .card").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

                $(".pagination1 li").slice(1, -1).remove();

                getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                    $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
                        .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                            .attr({
                                href: "javascript:void(0)"
                            }).text(item || "...")).insertBefore(".next-page1");
                });

                $(".previous-page1").toggleClass("disable", currentPage === 1);
                $(".next-page1").toggleClass("disable", currentPage === totalPages);
                return true;
            }

            $(".pagination1").append(
                $("<li>").addClass("page-item").addClass("previous-page1").append($("<a>").addClass("page-link").attr({
                    href: "javascript:void(0)"
                }).text("Prev")),
                $("<li>").addClass("page-item").addClass("next-page1").append($("<a>").addClass("page-link").attr({
                    href: "javascript:void(0)"
                }).text("Next"))
            );

            $(".card-content1").show();
            showPage(1);

            $(document).on("click", ".pagination1 li.current-page:not(.active)", function() {
                return showPage(+$(this).text());
            });

            $(".next-page1").on("click", function() {
                return showPage(currentPage + 1);
            });

            $(".previous-page1").on("click", function() {
                return showPage(currentPage - 1);
            });
        };
        $(document).ready(function() {
            $("#searchbox").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $('div[data-role="card-content1"]').filter(function() {
                    $(this).toggle($(this).find('h5').text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        paging();
    </script>

    <!-- Akhir JS Produk -->
    <!-- JS Search -->

</body>

</html>