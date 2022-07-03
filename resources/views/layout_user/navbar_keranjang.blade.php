    <!-- Navbar -->
    <nav style="background-color: black;" class="navbar navbar-expand-lg navbar-light nav-fixed">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('gambar/fix/logo.png')}}" width="49" height="49" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="/">Home<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link btn btn_franchise" href="/franchise">Franchise</a>
                    <a class="nav-item" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar_user.png" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <div class="dw-user-box">
                                <div class="u-text">
                                    <p>{{$belanja[0]->nama}}</p>
                                    <p class="text-muted"></p><a style="color: white;" href="/riwayat" class="btn btn-rounded btn-warning btn-sm"><i class="fas fa-cart-plus"></i> Riwayat Pembelian</a>
                                    @if(Session::has("gagal"))
                                    <p style="color:red;margin:0;"> {{Session::get("gagal")}}</p>
                                    @endif
                                    <p class="text-muted"></p><a href="/logout_user" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->