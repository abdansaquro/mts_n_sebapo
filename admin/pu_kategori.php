<?php

include "konek.php";

$kode_kategori		= $_POST['kode_kategori'];
$kategori			= $_POST['kategori'];

if($kategori == ""){

	echo "<script type='text/javascript'>
			alert('Data yang anda input belum lengkap'); history.go(-1);</script>";

}else{

	mysql_query("update kategori set
			kategori		= '$kategori'
			where kode_kategori		= '$kode_kategori'") or die (mysql_error());
			
	echo "<script>window.location='index.php?hal=kategori&pesan2=Berhasil disimpan'</script>";

}
?>