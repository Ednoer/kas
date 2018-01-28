<div class="panel-body">
      <button class="btn btn-success" data-toggle="modal" data-target="#myModal" style="margin-bottom: 8px">
        <i class="fa fa-plus"></i> Tambah Data
      </button>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" method="POST">
                      <div class="form-group">
                        <label>Kode</label>
                        <input class="form-control" name="kode" placeholder="Input Kode" />
                      </div>


                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="ket" rows="3"></textarea>
                      </div>


                      <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" name="tgl" type="date" />
                      </div>

                      <div class="form-group">
                        <label>Jumlah</label>
                        <input class="form-control" name="jml" type="number" />
                      </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                    </form>

                  </div>
              </div>
          </div>
      </div>
<div class="row">
      <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-primary">
              <div class="panel-heading">
                   Data Kas Keluar
              </div>
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode</th>
                                  <th>Tanggal</th>
                                  <th>Keterangan</th>
                                  <th>Jumlah</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php

                              $no=1;

                              $sql = $koneksi->query("select * from kas where jenis = 'keluar'");
                              while($data=$sql->fetch_assoc()){




                             ?>
                              <tr class="odd gradeX">
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['kode']; ?></td>
                                  <td><?php echo date('d F Y',strtotime($data['tgl'])); ?></td>
                                  <td><?php echo $data['keterangan']; ?></td>
                                  <td align="right"><?php echo number_format($data['keluar']).",-"; ?></td>
                                  <td>
                                    <a href="?page=keluar&aksi=ubah&id=<?php echo $data['kode'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
                                    <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="?page=keluar&aksi=hapus&id=<?php echo $data['kode'];?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                  </td>
                              </tr>
                              <?php
                                @$total=$total+$data['keluar'];
                                  }
                               ?>
                          </tbody>
                            <tr>
                              <th colspan="4" style="text-align: center; font-size: 20px;">Total Kas Keluar</th>
                              <th colspan="2" style="font-size: 18px; text-align: right;"><?php echo"Rp ".number_format($total).",-";?></th>
                            </tr>
                    </table>

                </div>
                <a href="./laporan/laporan_kas_keluar_exel.php" target="blank" class="btn btn-default" style="margin-top: 8px"><i class="fa fa-print"></i> ExportToExcel</a>
                <a href="./laporan/laporan_kas_masuk_pdf.php" target="blank" class="btn btn-default" style="margin-top: 8px"><i class="fa fa-print"></i> ExportToPdf</a>

                            <?php

                                if(isset($_POST['simpan'])){

                                  $kode = @$_POST['kode'];
                                  $ket = @$_POST['ket'];
                                  $tgl = @$_POST['tgl'];
                                  $keluar = @$_POST['jml'];

                                  $sql = $koneksi->query("insert into kas(kode, keterangan, tgl, jumlah, jenis, keluar)values('$kode', '$ket', '$tgl', '0', 'keluar','$keluar')");

                                  if($sql){
                                    ?>

                                      <script type="text/javascript">
                                        alert("Simpan data berhasil");
                                        window.location.href="?page=keluar";

                                      </script>


                                    <?php
                                  }

                            }

                            ?>


                        </div>

          </div>

      </div>
</div>
