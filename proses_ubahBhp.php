<?php
// Load file koneksi.php
include "conn.php";

// Ambil Data yang Dikirim dari Form
$bhp_id = $_GET['bhp_id'];
$nama_barang = $_POST['nama_barang'];
$satuan = $_POST['satuan'];
$golongan_id = $_POST['golongan_id'];

  // Proses simpan ke Database
  $query = "UPDATE bhp SET nama_barang='".$nama_barang."', satuan='".$satuan."', golongan_id='".$golongan_id."' WHERE bhp_id='".$bhp_id."'";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: bhp.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='user.php'>Kembali Ke Form</a>";
  }

?>