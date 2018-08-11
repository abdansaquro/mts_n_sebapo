<?php
#PANGGIL KONEKSI
include "konek.php";

#AMBIL DAATA YANG DI SUBMIT
$kode_buku			= $_POST['kode_buku'];
$judul				= $_POST['judul'];
$kode_kategori		= $_POST['kode_kategori'];
$pengarang			= $_POST['pengarang'];
$penerbit			= $_POST['penerbit'];
$tempat_terbit		= $_POST['tempat_terbit'];
$tahun_terbit		= $_POST['tahun_terbit'];
$stok				= $_POST['stok'];

#CEK KODE BUKU YG SAAMA

#if($kode_buku == "" or $judul == "" or $kode_kategori == "" or $pengarang == "" or $penerbit == "" or $tempat_terbit == "" or $tahun_terbit == "" or $stok_awal == ""){
#	echo "<script type='text/javascript'>
#			alert('Data yang diinput belum lengkap'); history.go(-1);</script>";
#}else 
	if(mysql_num_rows(mysql_query("select kode_buku from buku where kode_buku = '$kode_buku'")) > 0){
	
	echo "<script>window.location='index.php?hal=buku&pesan=Kode buku tersebut udh ada di database'</script>";
	
}else{
#SIMPAN KE DB	
	mysql_query("insert into buku value(
					'$kode_buku',
					'$judul',
					'$kode_kategori',
					'$pengarang',
					'$penerbit',
					'$tempat_terbit',
					'$tahun_terbit',
					'$stok')") or die (mysql_error());
	#TAMPILKAN PESAN				
	echo "<script>window.location='index.php?hal=buku&pesan2=Berhasil disimpan'</script>";

}
?>