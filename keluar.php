<?php include_once('header.php')?>
<!--  -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Form
        <small>Alat keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="keluar.php">Form Alat Keluar</a></li>
      <!--   <li class="active"></li> -->
      </ol>
  </section>

   <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post"  action="proses_simpan_keluar.php" enctype="multipart/form-data">
              <div class="box-body">
                
              <div class="form-group">
                <label>Nama Alat</label>
                <select class="form-control select2" multiple="multiple" name="id_barang[]" style="width: 100%;" required="required">
    

                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                        $sql="select a.*, b.* 
                        from tbasset a, tbkategori b 
                        where a.id_kategori=b.id_kategori and a.kondisi = 'baik' and a.id_lokasi = 27";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['id_barang'];?>"><?php echo $row['nama_kategori'] ; str_repeat('&nbsp;', 2); echo" -- "; echo $row['kode_barang'] ; ?></option>
                      <?php 
                      }
                      ?>
                </select>
                
                </div>


             <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control select2" name="id_lokasi" style="width: 100%;" id="form_prov" required="required">
                    <option selected="selected" value="">--Pilih Provinsi--</option>

                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="SELECT * FROM tblokasi";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['id_lokasi'];?>"><?php echo $row['nama_lokasi'] ;?></option>
                      <?php 
                      }
                      ?>
                </select>    
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Project</label>
                   <input type="text" name="project" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" id="exampleInputEmail1" placeholder="Nama Project" required="required">
                   <input type="hidden" name="created_by" value="<?php echo $_SESSION['username']; ?>" class="form-control"> 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Keluar</label>
                 <input type="date" name="date_out" class="form-control" autocomplete="off" required >
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">NEXT</button>
              </div>
            </form>
          </div>
          </div>

           <div class="col-xs-12">
          <div class="">
            
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form name="form1" method="post" action="">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Lokasi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $barang = mysqli_query($koneksi, "SELECT DISTINCT  a.id_lokasi, b.nama_lokasi 
                                                        from trx a, tblokasi b
                                                        where a.id_lokasi=b.id_lokasi and a.id_lokasi != 27 and a.date_in IS NULL");
                        $no=1;
                        foreach ($barang as $row){                                                 

            echo "<tr>
            <td>$no</td>

            <td>
            <a href='kembali.php?id_lokasi=".$row['id_lokasi']."'><span class='glyphicon glyphicon-map-marker'></span> ".$row['nama_lokasi']."
            </td>
                        
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

        </div>



      </section>

   
  </div>
  <!-- /.content-wrapper -->
   

 <?php include_once('footer.php')?>