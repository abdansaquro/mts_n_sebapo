<?php
include "konek.php";
$kode_kategori = $_GET['kode_kategori'];
mysql_query("delete from `kategori` where kode_kategori = '$kode_kategori'");
echo "<script>
			window.location='index.php?hal=kategori&pesan=Berhasil dihapus'</script>";
?>


 
