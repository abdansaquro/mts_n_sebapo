<?php

error_reporting(0);

include "konek.php";

$kode_peminjaman2				= $_POST['kode_peminjaman'];
$kode_buku2						= $_POST['kode_buku'];
$kode_anggota2					= $_POST['kode_anggota'];
$tgl_pinjam2					= $_POST['tgl_pinjam'];
$tgl_harus_kembali2				= $_POST['tgl_harus_kembali'];
$tgl_kembali2					= $_POST['tgl_kembali'];
$status2						= $_POST['status'];


mysql_query("insert into peminjaman values(
				'$kode_peminjaman2',
				'$kode_buku2',
				'$kode_anggota2',
				'$tgl_pinjam2',
				'$tgl_harus_kembali2',
				'$tgl_kembali2',
				'$status2')") or die(mysql_error());		

echo "<script>window.location='index.php?hal=peminjaman&pesan=Berhasil disimpan'</script>";	

?>