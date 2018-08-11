<?php
include "konek.php";
$kode_buku = $_GET['kode_buku'];
mysql_query("delete from `buku` where kode_buku = '$kode_buku'");
echo "<script>
			window.location='index.php?hal=buku&pesan=Berhasil dihapus'</script>";
?>


 
