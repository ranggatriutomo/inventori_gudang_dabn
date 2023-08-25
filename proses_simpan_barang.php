<?php
// Load file koneksi.php
include "conn.php";

// Ambil Data yang Dikirim dari Form
$kode_barang = $_POST['kode_barang'];
$id_kategori = $_POST['id_kategori'];
$id_merk = $_POST['id_merk'];
$id_lokasi = $_POST['id_lokasi'];
$kondisi = $_POST['kondisi'];
$tgl_masuk = $_POST['tgl_masuk'];
$keterangan = $_POST['keterangan'];
$jumlah_barang = $_POST['jumlah_barang'];
$satuan = "unit";
$created_by = $_POST['created_by'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$gambar;

// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;

// Proses upload
// if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $kd = substr($kode_barang,-3);
  for($i=0;$i<$jumlah_barang;$i++){

    $query = "INSERT INTO tbasset (kode_barang, id_kategori, tgl_masuk, id_merk, id_lokasi, kondisi, keterangan, jumlah_barang, gambar, satuan, created_by) VALUES('".substr($kode_barang,0,-3).''.sprintf("%03s",$kd++)."', '".$id_kategori."', '".$tgl_masuk."', '".$id_merk."', '".$id_lokasi."', '".$kondisi."', '".$keterangan."','".$jumlah_barang."', '".$fotobaru."', '".$satuan."', '".$created_by."')";
    $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
  }
    

   



  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: barang.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='input_barang.php'>Kembali Ke Form</a>";
  }
// }else{
//   // Jika gambar gagal diupload, Lakukan :
//   echo "Maaf, Gambar gagal untuk diupload.";
//   echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
// }
?>