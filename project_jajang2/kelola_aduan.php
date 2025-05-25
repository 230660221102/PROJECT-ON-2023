<?php

include 'koneksi.php';
session_start();

if (!isset($_SESSION['loginpa'])) {
    header('Location: loginpetugas.php');
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
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<link rel="stylesheet" href="assets/css/datatables.min.css">
	<link rel="stylesheet" href="assets/css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
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
								<p class="user-name mb-0"><?php echo $_SESSION['nama_petugas']; ?></p>
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
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">kelola Pengaduan</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data kelola Pengaduan</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<!-- membuat card yang diisi dengan tampilan tabel data | baris 63 - 196 -->
				<div class="card">
            <div class="card-header bg-info text-white">Data Kelola Pengaduan</div>
            <div class="card-body">
                
                <table class="table" id="dataKelolaPengaduan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
            
                        $tampil = mysqli_query($koneksi, "SELECT dat_pengaduan.id, dat_pengaduan.tgl_pengaduan, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.deskripsi, dat_masyarakat.nik, dat_masyarakat.nama FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik WHERE dat_pengaduan.status_pengaduan = 'proses' ORDER BY dat_pengaduan.id DESC ");
                        while ($data = mysqli_fetch_assoc($tampil)) :
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nik']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['tgl_pengaduan']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td>
                                    <a href="gambar/<?php echo $data['gambar']; ?>" target="_blank">
                                        <img src="gambar/<?php echo $data['gambar']; ?>" width="80" height="80" alt="">
                                    </a>
                                </td>
                                <td><?php echo $data['deskripsi']; ?></td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#kelolapengaduan<?php echo $data['id']; ?>" class="btn btn-success">Tanggapi</a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#detailPengaduan<?php echo $data['id']; ?>" class="btn btn-success">Detail</a>

                                    
                                </td>
                            </tr>
                            

                             <!-- Modal Ubah Data -->
                            <div class=" modal fade" id="kelolapengaduan<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Kelola Pengaduan Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="crud_kelola_pengaduan.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                
                                            <div class=" mb-3">
                                                 <label for="">Konfirmasi Status</label>
                                                   <select name="status_pengaduan" id="" class="form-control">
                                                       <option value="terima">Terima</option>
                                                        <option value="tolak">Tolak</option>
                                                   </select>
                                            </div>
                                           

                                                <div class=" mb-3">
                                                    <label for="">Tanggapan</label>
                                                    <textarea name="tanggapan" id="" rows="6" class="form-control"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Modal Detail Pengaduan -->
                            <div class="modal fade" id="detailPengaduan<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pengaduan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="crud_pengaduan.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="">Judul</label>
                                                    <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Gambar</label>
                                                    <a href="gambar/<?php echo $data['gambar'] ?>" target="_blank">
                                                        <img src="gambar/<?php echo $data['gambar'] ?>" width="50%" height="50%" alt="">
                                                    </a>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="">Deskripsi</label>
                                                    <textarea name="deskripsi" id="" rows="10" class="form-control" disabled><?php echo $data['deskripsi']; ?></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
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
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/widgets.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/datatables.min.js"></script>
	<script src="assets/js/dataTables.responsive.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataKelolaPengaduan').DataTable({
				responsive: true
			});

		});
	</script>
</body>

</html>