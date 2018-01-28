<?php

  $kode = $_GET['id'];

  $sql = $koneksi->query("select * from kas where kode = '$kode'");

  $tampil = $sql->fetch_assoc();



?>



<div class="panel panel-default">
    <div class="panel-heading">
      Ubah Data Masuk
    </div>
        <div class="panel-body">
              <div class="row">
                  <div class="col-md-12">

                      <form role="form" method="POST">
                          <div class="form-group">
                              <label>Kode</label>
                              <input class="form-control" name="kode" value="<?php echo $tampil['kode'];?>" readonly/>

                          </div>
                          <div class="form-group">
                              <label>Keterangan</label>
                              <textarea class="form-control" name="ket" rows="3"><?php echo $tampil['keterangan'];?></textarea>
                          </div>
                          <div class="form-group">
                              <label>Tanggal</label>
                              <input class="form-control" type="date" name="tgl" value="<?php echo $tampil['tgl'];?>"/>

                          </div>

                          <div class="form-group">
                              <label>Jumlah</label>
                              <input class="form-control" type="number" name="jml" value="<?php echo $tampil['keluar'];?>"/>

                          </div>

                          <div>
                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary"/>
                          </div>

                        </div>

                      </form>
                </div>
        </div>
      </div>
</div>
<?php
  $kode = @$_POST ['kode'];
  $ket = @$_POST ['ket'];
  $tgl = @$_POST ['tgl'];
  $keluar = @$_POST ['jml'];

  $simpan = @$_POST ['simpan'];

  if ($simpan) {
    $sql = $koneksi->query("update kas set kode='$kode', keterangan='$ket', tgl='$tgl', jumlah=0, jenis='keluar', keluar='$keluar' where kode='$kode'");

    if($sql){
      ?>
        <script type="text/javascript">

          alert("Data Berhasil Disimpan");
          window.location.href="?page=keluar";

        </script>
      <?php


    }
  }


?>
