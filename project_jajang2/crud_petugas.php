<?php
include 'koneksi.php';

if (isset($_POST['btnSimpan'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];


    $cek_username = mysqli_query($koneksi, "SELECT username FROM dat_petugas WHERE username = '$username'");

    if (mysqli_fetch_assoc($cek_username)) {
        echo "<script>alert('Username anda sudah terdaftar')</script>";
    } else if ($password != $password2) {
        echo "<script>alert('Password tidak sama')</script>";
    } else {

        $simpan = mysqli_query($koneksi, "INSERT INTO dat_petugas (id, nama_petugas, telp, level, username, password) VALUES('','$nama_petugas','$telp','$level','$username','$password')");

        if ($simpan) {
            echo "<script>alert('Data akun berhasil dibuat'); document.location='petugas.php';</script>";
        } else {
            echo "<script>alert('Data akun gagal dibuat')</script>";
        }
    }
}

if(isset($_POST['btnHapus'])){
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi, "DELETE FROM dat_petugas WHERE id = '$id'");

    if($hapus){
        echo "<script>alert('Data berhasil hapus'); document.location='petugas.php'</script>";
    } else {
        echo "<script>alert('Data Gagal hapus'); document.location='petugas.php'</script>";
    }
}

if(isset($_POST['btnUbah'])){
    $id = $_POST['id'];
    $nama_petugas = $_POST['nama_petugas'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordLama = $_POST['passwordLama'];

    if($password === ""){
        mysqli_query($koneksi, "UPDATE dat_petugas SET nama_petugas = '$nama_petugas', telp = '$telp', level = '$level', username = '$username', password = '$passwordLama' WHERE id = '$id'");
        echo "<script>alert('Data berhasil diubah'); document.location='petugas.php';</script>";
    }else{
        mysqli_query($koneksi, "UPDATE dat_petugas SET nama_petugas = '$nama_petugas', telp = '$telp', level = '$level', username = '$username', password = '$password' WHERE id = '$id'");
        echo "<script>alert('Data berhasil diubah'); document.location='petugas.php';</script>";
    }
}

?>
