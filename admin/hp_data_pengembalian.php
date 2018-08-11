<?php
include "konek.php";
$kode_pengembalian = $_GET['kode_pengembalian'];
mysql_query("delete from `pengembalian` where kode_pengembalian = '$kode_pengembalian'");
echo "<script>
			window.location='index.php?hal=datapengembalian&pesan=Berhasil dihapus'</script>";
?>