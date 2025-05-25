<?php
session_start();
include "koneksi.php";

if (isset($_POST ['btnSimpan'])){
	$id_pengaduan = $_POST['id'];
	$id_petugas = $_SESSION['id'];
	$tgl_tanggapan = date('Y-m-d');
	$status_pengaduan = $_POST['status_pengaduan'];
	$tanggapan = $_POST['tanggapan'];

	$simpan = mysqli_query($koneksi, "INSERT INTO dat_tanggapan (id,id_pengaduan,id_petugas,tgl_tanggapan,tanggapan) VALUES ('','$id_pengaduan','$id_petugas','$tgl_tanggapan','$tanggapan') ");

	mysqli_query($koneksi, "UPDATE dat_pengaduan SET status_pengaduan = '$status_pengaduan' WHERE id = '$id_pengaduan'");

	if ($simpan) {
		echo "<script>alert('Data berhasil disimpan'); document.location='kelola_aduan.php'</script>";


	} else {
		echo "<script>alert('Data gagal disimpan'); document.location='kelola_aduan.php'</script>";

	}
}
