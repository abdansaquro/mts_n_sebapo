<?php

error_reporting(0);

include "konek.php";

$kode_peminjaman2				= $_POST['kode_peminjaman'];
$kode_buku2						= $_POST['kode_buku'];
$kode_anggota2					= $_POST['kode_anggota'];


				mysql_query("update peminjaman set
							kode_buku		= '$kode_buku2',
							kode_anggota	= '$kode_anggota2'
							where kode_peminjaman = '$kode_peminjaman2'
							") or die(mysql_error());
								
				mysql_query("update buku set stok = stok - 1 where kode_buku = '$kode_buku2'");				

				echo "<script>window.location='index.php?hal=peminjaman&pesan=Berhasil disimpan'</script>";	
				
?>