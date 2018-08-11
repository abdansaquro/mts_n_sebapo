<?php
include "konek.php";
$kode_peminjaman_detail = $_GET['kode_peminjaman_detail'];
mysql_query("delete from `peminjaman_detail` where kode_peminjaman_detail = '$kode_peminjaman_detail'");
echo "<script>
			window.location='index.php?hal=datapeminjaman&pesan=Berhasil dihapus'</script>";
?>


 
