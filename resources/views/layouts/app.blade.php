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
	<link rel="shortcut icon" href="{{ asset('img/icons/user.png')}}" /> 

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Absen Prakerin</title>

	<link href="{{ asset('css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="http://absenprakerin.test/admin">
					<span class="align-middle" style="font-family: 'Lucida Handwriting'">Absen Prakerin</span>
				</a>
				<ul class="sidebar-nav">
					@if (Auth::user()->role == 'admin')
					<li class="sidebar-header">Pages Admin</li>
		
					<li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.dashboard') }}">
							<i class="align-middle" data-feather="home"></i> 
							<span class="align-middle">Dashboard</span>
						</a>
					</li>
		
					<li class="sidebar-item {{ request()->routeIs('admin.datasiswa.index') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.datasiswa.index') }}">
							<i class="align-middle" data-feather="user"></i> 
							<span class="align-middle">Data Siswa</span>
						</a>
					</li>
		
					<li class="sidebar-item {{ request()->routeIs('admin.dataabsen.index') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.dataabsen.index') }}">
							<i class="align-middle" data-feather="check-square"></i> 
							<span class="align-middle">Data Absen</span>
						</a>
					</li>
		
					<li class="sidebar-item {{ request()->routeIs('admin.datajurnal.index') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.datajurnal.index') }}">
							<i class="align-middle" data-feather="book-open"></i> 
							<span class="align-middle">Data Jurnal</span>
						</a>
					</li>
					@endif

					@if (Auth::user()->role == 'siswa')
					<li class="sidebar-header">Pages Siswa</li>

					<li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.dashboard') }}">
							<i class="align-middle" data-feather="home"></i> 
							<span class="align-middle">Dashboard</span>
						</a>
					</li>
		
					<li class="sidebar-item {{ request()->routeIs('admin.form.index') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.form.index') }}">
							<i class="align-middle" data-feather="check-square"></i> 
							<span class="align-middle">Absensi</span>
						</a>
					</li>
		
					<li class="sidebar-item {{ request()->routeIs('admin.riwayatabsensi.index') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.riwayatabsensi.index') }}">
							<i class="align-middle" data-feather="clock"></i> 
							<span class="align-middle">Riwayat Absensi</span>
						</a>
					</li>
		
					<li class="sidebar-item {{ request()->routeIs('admin.jurnal.index') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.jurnal.index') }}">
							<i class="align-middle" data-feather="clipboard"></i> 
							<span class="align-middle">Jurnal</span>
						</a>
					</li>
					@endif
				</ul>
			</div>
		</nav>
		

		<div class="main">
			
		<nav class="navbar navbar-expand navbar-light navbar-bg">
			<a class="sidebar-toggle js-sidebar-toggle">
				<i class="hamburger align-self-center"></i>
			</a>

			<div class="navbar-collapse collapse">
				<ul class="navbar-nav navbar-align">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
							<img src="{{ asset('img/avatars/gambarprofil.jpg')}}" class="avatar img-fluid rounded me-1"/> 
								<span class="text-dark" style="font-family: 'Lucida Handwriting' ">{{ Auth::user()->name }}</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							
								<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
									<i class="align-middle me-1" data-feather="log-out"></i>Log out
								</a>

							<form id="form-logout" action="{{route('logout')}}" method="POST">
								@csrf
							</form>
						</div>
					</li>
				</ul>
			</div>
		</nav>

			<main class="content">
				<div class="container-fluid p-0">
						<div id="main-content">
					
							@yield('content')

						</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="http://absenprakerin.test/admin" target="_blank"><strong>AbsenPrakerin</strong></a> &copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{ asset('js/app.js')}}"></script>

	@stack('scripts')

</body>
</html>