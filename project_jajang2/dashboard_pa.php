 <?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['loginpa'])) {
    header('Location: loginpetugas.php');
}
$id = $_SESSION['id'];

$data1 =mysqli_query($koneksi, "SELECT * FROM dat_pengaduan" );
$jmlpengaduan = mysqli_num_rows($data1);

$data2 =mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'terima'" );
$jml_terima = mysqli_num_rows($data2);

$data3 =mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'tolak'" );
$jml_tolak = mysqli_num_rows($data3);

$data4 =mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'proses'" );
$jml_proses = mysqli_num_rows($data4);

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>SIPEKA</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">SIPEKA</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

				<li class="menu-label">Main</li>
				<li>
					<a href="dashboard_pa.php">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<?php if ($_SESSION['level'] == 'admin') { ?>
					<li class="menu-label">Master</li>
					<li>
					
						<a href="kelola_aduan.php">
							<div class="parent-icon"><i class="bx bx-message-alt-add"></i>
							</div>
							<div class="menu-title">Kelola Pengaduan</div>
						</a>
					</li>
					<li>
						<a href="kelola_tanggapan.php">
							<div class="parent-icon"><i class='bx bx-envelope-open'></i>
							</div>
							<div class="menu-title">Kelola Tanggapan</div>
						</a>
					</li>
	                 <li>
						<a href="petugas.php">
							<div class="parent-icon"><i class='bx bx-envelope-open'></i>
							</div>
							<div class="menu-title">Petugas</div>
						</a>
					</li>
					<li>
						<a href="laporan.php">
							<div class="parent-icon"><i class='bx bx-envelope-open'></i>
							</div>
							<div class="menu-title">Laporan</div>
						</a>
					</li>
				<?php } else { ?>
	                <li class="menu-label">Master</li>
					<li>
						<a href="kelola_aduan.php">
							<div class="parent-icon"><i class="bx bx-message-alt-add"></i>
							</div>
							<div class="menu-title">Kelola Pengaduan</div>
						</a>
					</li>
					<li>
						<a href="kelola_tanggapan.php">
							<div class="parent-icon"><i class='bx bx-envelope-open'></i>
							</div>
							<div class="menu-title">Kelola Tanggapan</div>
						</a>
					</li>
				<?php } ?>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu-left d-none d-lg-block">
						<ul class="nav">
						</ul>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-notifications-list">
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-message-list">
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-7.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php echo $_SESSION['nama_petugas']; ?></p
								<p class="designattion mb-0"><?php echo $_SESSION['level']; ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="logoutpa.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Jumlah Pengaduan</p>
										<h5 class="mb-0"><?php echo $jmlpengaduan; ?></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Jumlah Diproses</p>
										<h5 class="mb-0"><?php echo $jml_proses; ?></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Jumlah Diterima</p>
										<h5 class="mb-0"><?php echo $jml_terima; ?></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Jumlah Ditolak</p>
										<h5 class="mb-0"><?php echo $jml_tolak ?></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">SMK Informatika Sumedang © 2023</p>
		</footer>
	</div>
	
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="assets/plugins/highcharts/js/exporting.js"></script>
	<script src="assets/plugins/highcharts/js/variable-pie.js"></script>
	<script src="assets/plugins/highcharts/js/export-data.js"></script>
	<script src="assets/plugins/highcharts/js/accessibility.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index2.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.customers-list');
		new PerfectScrollbar('.store-metrics');
		new PerfectScrollbar('.product-list');
	</script>
</body>

</html>