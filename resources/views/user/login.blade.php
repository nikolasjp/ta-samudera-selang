<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="../gambar/fix/logo.png">
	<title>Samudera Selang</title>
	<script src="https://kit.fontawesome.com/4619c8d9c5.js" crossorigin="anonymous"></script>
	<!-- You can change the theme colors from here -->
	<link rel="stylesheet" href="{{ asset('css_public/login.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<body class="fix-header card-no-border">
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="/register_user" method="GET">
				<h1>Create Account</h1>
				<span>use your account for registration</span>
				<input type="text" name="nama" placeholder="Nama Lengkap" required />
				<input type="email" name="email" placeholder="Email" required />
				<input type="password" name="password" placeholder="Password" required />
				<button>Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="/login_user" method="POST">
				@csrf
				@if(Session::has("gagal_regis"))
				<p style="color:red;margin:0;margin-bottom:20px;"> {{Session::get("gagal_regis")}}</p>
				@endif
				<h1>Sign in</h1>
				<span>use your account</span>
				<input type="text" name="nama" placeholder="Nama" required />
				<input type="password" name="password" placeholder="Password" required />
				@if(Session::has("gagal"))
				<p style="color:red;margin:0;"> {{Session::get("gagal")}}</p>
				@endif
				<button style="margin-top: 10px;">Sign In</button>
				<a href="/">Kembali</a>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>Agar bisa berbelanja anda harus login terlebih dahulu !</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Daftar Menjadi User Samudera Selang Agar Dapat Berbelanja Tanpa Batas !</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>

</html>