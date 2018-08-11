<?php
include "konek.php";
$kode_anggota = $_GET['kode_anggota'];
mysql_query("delete from `anggota` where kode_anggota = '$kode_anggota'");
echo "<script>
			window.location='index.php?hal=anggota&pesan=Berhasil dihapus'</script>";
?>


 
