<?php
include "konek.php";
$kode_peminjaman = $_GET['kode_peminjaman'];
mysql_query("delete from `peminjaman` where kode_peminjaman = '$kode_peminjaman'");
echo "<script>
			window.location='index.php?hal=peminjaman&pesan=Berhasil dihapus'</script>";
?>


 
