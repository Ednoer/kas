<?php

  $koneksi = new mysqli("localhost", "root","","kas");

  $filename = "kas_rekap_exel-(".date('d-m-y').").xls";

  header("content-disposition: attachment; filename='$filename'");
  header("content-type: application/vdn.ms-exel");
?>

<h2>Laporan Rekapitulasi Kas</h2>

<table border="1">
  <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Tanggal</th>
      <th>Keterangan</th>
      <th>Jumlah</th>
      <th>Jenis</th>
      <th>Keluar</th>
  </tr>
  <?php

    $no=1;

    $sql = $koneksi->query("select * from kas");
    while($data=$sql->fetch_assoc()){




   ?>
   <tr class="odd gradeX">
       <td><?php echo $no++; ?></td>
       <td><?php echo $data['kode']; ?></td>
       <td><?php echo date('d F Y',strtotime($data['tgl'])); ?></td>
       <td><?php echo $data['keterangan']; ?></td>
       <td align="right"><?php echo number_format($data['jumlah']).",-"; ?></td>
       <td><?php echo $data['jenis'] ?></td>
       <td align="right"><?php echo number_format($data['keluar']).",-"; ?></td>
   </tr>

  <?php
  @$total_masuk=$total_masuk+$data['jumlah'];
  @$total_keluar=$total_keluar+$data['keluar'];
  @$total=$total_masuk-$total_keluar;
    } ?>
  </tbody>
  <tr>
    <th colspan="4" style="text-align: center; font-size: 20px;">Total Kas Masuk</th>
    <th colspan="3" style="font-size: 18px; text-align: right;"><?php echo"Rp ".number_format($total_masuk).",-";?></th>
  </tr>
  <tr>
    <th colspan="4" style="text-align: center; font-size: 20px;">Total Kas Keluar</th>
    <th colspan="3" style="font-size: 18px; text-align: right;"><?php echo"Rp ".number_format($total_keluar).",-";?></th>
  </tr>
  <tr>
    <th colspan="4" style="text-align: center; font-size: 20px;">Saldo Kas</th>
    <th colspan="3" style="font-size: 18px; text-align: right;"><?php echo"Rp ".number_format($total).",-";?></th>
  </tr>
</table>
