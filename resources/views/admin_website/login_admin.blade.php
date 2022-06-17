<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../gambar/fix/logo.png">
    <title>Samudera Selang</title>
    <script src="https://kit.fontawesome.com/4619c8d9c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css_public/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<body class="fix-header card-no-border">
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="/login_admin" method="POST">
                @csrf
                <h1>Sign in</h1>
                <span>use your admin account</span>
                <input type="text" name="nama" placeholder="Nama" />
                <input type="password" name="password" placeholder="Password" />
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Admin!</h1>
                    <p>Kami ingin menjadi bagian dari mitra anda untuk maju bersama menyongsong masa depan yang lebih sukses.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>