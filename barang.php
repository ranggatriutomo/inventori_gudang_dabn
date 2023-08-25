<?php include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Table
        <small>Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="barang.php">Table Barang</a></li>
      <!--   <li class="active"></li> -->
      </ol>
  </section>  

  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="">
            
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                 <a href="input_barang.php" class="btn btn-block btn-primary btn-sm">Tambah Stock</a> 
              </h3>
               <h3 class="box-title">
                 <a href="proses.php" class="btn btn-block btn-primary btn-sm">Export Excel</a> 
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form name="form1" method="post" action="">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                 <!--  <th>Kode Barang</th> -->
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                 <!--  <th>Lokasi</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
                  <th>Gambar</th> -->
                  <!-- <th>Gambar</th> -->
                <!--   <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $barang = mysqli_query($koneksi, "select *, count(tbasset.id_kategori) as jumlah from tbasset 
                        left join tbkategori on tbasset.id_kategori = tbkategori.id_kategori where id_lokasi   = 27
                        GROUP BY tbasset.id_kategori");
                        $no=1;
                        foreach ($barang as $row){
                          
                        //   SELECT a.*, b.*, COUNT(a.id_kategori)as jumlah 
                        // FROM tbasset a, tbkategori b
                        // WHERE a.id_kategori=b.id_kategori
                        // GROUP BY a.id_kategori

            echo "<tr>
            <td>$no</td>
            <td><a href='detail.php?id_kategori=".$row['id_kategori']."'><span class='glyphicon glyphicon-file'></span> ".$row['nama_kategori']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['satuan']."</td>

             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
            <a href="#top">Ke Atas!<a>

      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once('footer.php');?>
