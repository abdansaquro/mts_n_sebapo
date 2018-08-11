<?php
include "konek.php";

mysql_query("delete from peminjaman_detail where kode_peminjaman_detail = '$_GET[kode_peminjaman_detail]'") or die (mysql_error());

echo "<script>window.location='index.php?hal=pengembalian&pesan=Berhasil dihapus'</script>";

?>