<?php

  $id = $_GET['id'];

  $koneksi->query("delete from kas where kode ='$id'");

 ?>

 <script type="text/javascript">
 alert("Hapus data berhasil");
  window.location.href="?page=masuk";
</script>
