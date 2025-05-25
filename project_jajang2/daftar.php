<?php
// masukan file koneksi agar variabel $koneksi dapat digunakan (terhubung dengan databse) | baris 3
include 'koneksi.php';

// jika tombol dengan name btnDaftar ditekan maka buat variabel baru yang diisikan dari setiap name yang ada pada form | baris 6 - 12
if (isset($_POST['btnDaftar'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	// buat variabel baru untuk menyamakan nik dan username yang ada di database dengan kolom yang diinputkan user pada form | baris 16 - 18

	$cek_nik = mysqli_query($koneksi, "SELECT nik FROM dat_masyarakat WHERE nik = '$nik'");

	$cek_username = mysqli_query($koneksi, "SELECT nik FROM dat_masyarakat WHERE username = '$username'");

	// buat kondisi untuk melakukan cek nik dan username | baris 21 - 25
	if (mysqli_fetch_assoc($cek_nik)) {
		// jika nik dan username yang di inputkan user pada kolom nik dan username ada di database maka muncul peringatan | baris 21 - 25
		echo "<script>alert('Nik sudah digunakan')</script>";
	} else if (mysqli_fetch_assoc($cek_username)) {
		echo "<script>alert('Username sudah digunakan')</script>";
	} else if ($password != $password2) {
		// jika password yang di inputkan user pada kolom password dan ulangi password tidak sama maka muncul peringatan | baris 26 - 28
		echo "<script>alert('Password tidak sama')</script>";
	} else {

		// kondisi jika semua terpenuhi dalam artian nik dan username blm terdaftar di database atau password juga sama dengan ulangi password.

		// buat variabel baru yang disikan perintah untuk memasukan data dari form kedalam tabel yang ada pada database dengan nama tabel dat_pengaduan | baris 35

		$simpan = mysqli_query($koneksi, "INSERT INTO dat_masyarakat (id, nik, nama, telp, username, password) VALUES ('', '$nik', '$nama', '$telp', '$username', '$password')");

		// buat kondisi ketika perintah diatas berhasil dan tidak berhasil | baris 39 - 46

		if ($simpan) {
			echo "<script>alert('Data Akun Berhasil Dibuat');
        document.location='index.php';
        </script>";
		} else {
			echo "<script>alert('Data Akun Gagal Dibuat'); document.location='index.php';
        </script>";
		}
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
		<div class="authentication-header"></div>
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3 class="">Daftar Akun Baru</h3>
										<p>Sudah punya akun? <a href="index.php">Login</a>
										</p>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST" action="">
											<div class="col-sm-6">
												<label for="nik" class="form-label">NIK</label>
												<input type="text" class="form-control" name="nik" placeholder="NIK 16 DIGIT ANGKA" minlength="16" maxlength="16" onkeypress="return hanyaAngka(event)" required>
											</div>
											<div class="col-sm-6">
												<label for="nama" class="form-label">Nama</label>
												<input type="text" class="form-control" name="nama" placeholder="Nama"required>
											</div>
											<div class="col-12">
												<label for="telp" class="form-label">Telp</label>
												<input type="text" class="form-control" name="telp" placeholder="Telp" minlength="12" maxlength="12" onkeypress="return hanyaAngka(event)" required>
											</div>
											<div class="col-12">
												<label for="username" class="form-label">Username</label>
												<input type="text" class="form-control" name="username" placeholder="Username"required>
											</div>
											<div class="col-12">
												<label for="password" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password" placeholder="Password"required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<label for="password" class="form-label">Ulangi Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password2" placeholder="Ulangi Password"required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>

											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="btnDaftar"><i class='bx bx-user'></i>Daftar</button>
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