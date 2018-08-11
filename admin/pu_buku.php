<?php

include "konek.php";

$kode_buku			= $_POST['kode_buku'];
$judul				= $_POST['judul'];
$kode_kategori		= $_POST['kode_kategori'];
$pengarang			= $_POST['pengarang'];
$penerbit			= $_POST['penerbit'];
$tempat_terbit		= $_POST['tempat_terbit'];
$tahun_terbit		= $_POST['tahun_terbit'];
$stok				= $_POST['stok'];
/*
if($kode_buku == "" or $judul == "" or $kode_kategori == "" or $pengarang == "" or $penerbit == "" or $tempat_terbit == "" or $tahun_terbit == "" or $stok == ""){

	echo "<script type='text/javascript'>
			alert('Data yang diinput belum lengkap'); history.go(-1);</script>";
			
}else{
*/
	mysql_query("update buku set
				kode_buku		= '$kode_buku',
				judul			= '$judul',
				kode_kategori	= '$kode_kategori',
				pengarang		= '$pengarang',
				penerbit		= '$penerbit',
				tempat_terbit	= '$tempat_terbit',
				tahun_terbit	= '$tahun_terbit',
				stok			= '$stok'
				where kode_buku		= '$kode_buku'") or die(mysql_error());

	echo "<script>window.location='index.php?hal=buku&pesan2=Berhasil disimpan'</script>";

/* } */
?>