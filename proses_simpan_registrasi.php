<?php
// Load file koneksi.php
include "conn.php";

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

  // Proses simpan ke Database
  $query = "INSERT INTO user VALUES('".$id."', '".$nama."', '".$username."', '".$password."', '".$level."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='user.php'>Kembali Ke Form</a>";
  }

?>