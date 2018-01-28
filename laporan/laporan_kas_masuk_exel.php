<?php

  $koneksi = new mysqli("localhost", "root","","kas");

  $filename = "kas_masuk_exel-(".date('d-m-y').").xls";

  header("content-disposition: attachment; filename='$filename'");
  header("content-type: application/vdn.ms-exel");
?>

<h2>Laporan Kas Masuk</h2>

<table border="1">
  <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Tanggal</th>
      <th>Keterangan</th>
      <th>Jumlah</th>
  </tr>
  <?php

    $no=1;

    $sql = $koneksi->query("select * from kas where jenis = 'masuk'");
    while($data=$sql->fetch_assoc()){




   ?>
   <tr class="odd gradeX">
       <td><?php echo $no++; ?></td>
       <td><?php echo $data['kode']; ?></td>
       <td><?php echo date('d F Y',strtotime($data['tgl'])); ?></td>
       <td><?php echo $data['keterangan']; ?></td>
       <td align="right"><?php echo number_format($data['jumlah']).",-"; ?></td>
   </tr>

  <?php
  @$total=$total+$data['jumlah'];

    } ?>
  </tbody>
    <tr>
      <th colspan="4" style="text-align: center; font-size: 20px;">Total Kas Masuk</th>
      <th style="font-size: 18px; text-align: right;"><?php echo"Rp ".number_format($total).",-";?></th>
    </tr>
</table>
