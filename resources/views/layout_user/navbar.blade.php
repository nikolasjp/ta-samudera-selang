    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light nav-fixed fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('gambar/fix/logo.png')}}" width="49" height="49" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto align-items-center">
                    <a class="nav-item nav-link active" href="#">Home<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="/contact">Persebaran Kantor</a>
                    <a class="nav-item nav-link" href="#produk_page">Produk</a>
                    <a class="nav-item nav-link btn btn_franchise" href="/franchise">Franchise</a>
                    <a style="font-size: 20px;" class="nav-item nav-link mr-2" href="/keranjang"><i class="fas fa-cart-plus">
                            <p class="red-info">0</p>
                        </i></a>
                    <a class="nav-item" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar_user.png" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <div class="dw-user-box">
                                <div class="u-text">
                                    <p>Hi, Login Untuk Berbelanja</p>
                                    <p class="text-muted"></p><a href="/login" class="btn btn-rounded btn-primary btn-sm"> Login <i class="fas fa-sign-in-alt"></i></a>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->