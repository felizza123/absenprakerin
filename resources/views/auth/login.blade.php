<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('img/icons/user.png')}}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Login | Absen Prakerin</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<style>
	    body {
	        background-image: url('{{ asset('img/avatars/login.jpeg') }}'); 
	        background-size: cover;
	        background-repeat: no-repeat;
	        background-position: center center;
	        height: 100vh; 
	    }

	    .card {
	        background-color: rgba(255, 255, 255, 0.8); 
	    }
	</style>

</head>

<body>
	<form action="{{ route('login') }}" method="POST">
    @csrf
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4 ">
							<h1 class="h3">ABSEN PRAKERIN </h1>
						</div>
								<div class="m-sm-4">
									<div class="text-center">
										<img src="{{asset('img/avatars/gambarprofil.jpg')}}" alt="Siswa Prakerin" class="img-fluid rounded-circle" width="132" height="132" />
										
										<!-- Ganti warna teks "Selamat datang" -->
										<p class="lead mb-0 mt-3" style="color: #000000;">Selamat datang</p>
										
										<!-- Ganti warna teks "Silahkan login" -->
										<p style="color: #000000;">Silahkan login untuk melanjutkan</p>
									</div>
									
									<form>
										<div class="mb-3">
											<label class="form-label" style="color: #000000;">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>

										
										@error('email')
										<span class="invalid-feedback d-block" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									    @enderror

										<div class="mb-3">
											<label class="form-label" style="color: #000000;">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
										</div>

										
										@error('password')
										<span class="invalid-feedback d-block" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									    @enderror

										<div>
											<label class="form-check" style="color: #000000;">
                                            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                                <span class="form-check-label">
                                                     Remember me next time
                                                </span>
                                            </label>
										</div>
                                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
									</form>
								</form>
								</div>
					</div>
				</div>
			</div>
		</div>
	</main>

</body>

</html>