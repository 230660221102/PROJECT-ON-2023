<?php

// masukan file koneksi agar variabel $koneksi dapat digunakan (terhubung dengan database) | baris 4
include 'koneksi.php';
// memanggil fungsi session pada php | baris 6
session_start();

// buat kondisi jika session login ada maka pindah menuju halaman dashboard.php 9 - 11
if (isset($_SESSION['login'])) {
	header("Location: dashboard.php");
}

// jika tombol dengan name btnMasuk ditekan maka buat variabel baru yang diisikan dari setiap name yang ada pada form | baris 14 - 16
if (isset($_POST['btnMasuk'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// buat variabel baru untuk menyamakan username yang diinputkan user dengan username yang ada di database | baris 19
	$data = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE username = '$username'");

	// buat kondisi jika username yang diinputkan oleh user ada di database maka buat variabel baru yang merubah data objek menjadi array
	if (mysqli_num_rows($data) === 1) {
		$baris = mysqli_fetch_assoc($data);
		// buat kondisi untuk melakukan cek password yang diinputkan oleh user apakah sama dengan password yang ada di database

		// jika password ada di dalam database maka pindah halaman dan buat session yang disi dari data array berdasarkan username yang diinputkan oleh user 
		if ($password == $baris['password']) {

			header("Location: dashboard.php");
			$_SESSION['id'] = $baris['id'];
			$_SESSION['login'] = true;
			$_SESSION['nik'] = $baris['nik'];
			$_SESSION['nama'] = $baris['nama'];
			exit;
		} else {
			// jika password tidak ada dalam database maka muncul peringatan
			echo "<script>alert('username atau Password anda salah!')</script>";
		}
	} else {
		// jika username tidak ada dalam database maka muncul peringatan
		echo "<script>alert('username atau Password anda salah!')</script>";
	}
}

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
	<title>SIPEKA</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<div class="authentication-header bg bg-light"></div>
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3 class="">Login Masyarakat</h3>
										<p>Belum punya akun ? <a href="daftar.php">Buat akun baru</a>
										</p>
									</div>
									<div class="form-body">
										<form class="row g-3" action="" method="POST">
											<div class="col-12">
												<label for="Username" class="form-label">Username</label>
												<input type="text" name="username" class="form-control" placeholder="Username"required>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Password" name="password"required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="btnMasuk" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Masuk</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>