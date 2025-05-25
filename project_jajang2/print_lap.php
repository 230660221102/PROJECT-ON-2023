<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <style>
        thead,
        thead td{
        vertical-align: middle !important;
        text-align: center ;
        border: 1px solid #000000;
        }

        table,
        tbody th,
        tbody td{
            border: 1px solid;
            padding: 5px;
        }

        table{

            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Laporan Pengaduan Masyarakat</h2>
    <table>
    <thead>
        <tbody>
    <tr>
        <th>No</th>
        <th>Nama Pengguna</th>
        <th>Tanggal Aduan</th>
        <th>Judul</th>
        <th>Gambar</th>
        <th>Deskripsi Aduan</th>
        <th>Nama Petugas</th>
        <th>Tanggal Tanggapan</th>
        <th>Tanggapan</th>
        <th>Status</th>
     </tr>
    </thead>
</tbody>

    <tbody> 

       <?php 
       $no = 1;
       $tampil = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik= dat_masyarakat.nik
       INNER JOIN dat_tanggapan ON dat_pengaduan.id= dat_tanggapan.id_pengaduan
       INNER JOIN dat_petugas ON dat_tanggapan.id_petugas= dat_petugas.id
        WHERE dat_pengaduan.status_pengaduan= 'terima' OR dat_pengaduan.status_pengaduan= 'tolak'");
        while ($data= mysqli_fetch_assoc($tampil)):
         ?> 
         <tr>
             <td><?php echo $no++; ?></td>
             <td><?php echo $data['nama']; ?></td>
             <td><?php echo $data['tgl_pengaduan']; ?></td>
             <td><?php echo $data['judul']; ?></td>
             <td> <a href="gambar/<?php echo $data['gambar'] ?>"target="_blank"><img src="gambar/<?php echo $data['gambar']?>" width="80" height="80"></a></td>
             <td><?php echo $data['deskripsi']; ?></td>
             <td><?php echo $data['nama_petugas']; ?></td>
             <td><?php echo $data['tgl_tanggapan']; ?></td>
             <td><?php echo $data['tanggapan']; ?></td>
             <td><?php echo $data['status_pengaduan']; ?></td>
         </tr>
     <?php endwhile; ?>
    </tbody>
    </table>
    <script>  
        window.print()
    </script>
</body>
</html>