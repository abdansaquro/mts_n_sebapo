<?php

include "konek.php";

$kode_kategori	= $_POST['kode_kategori'];	
$kategori		= $_POST['kategori'];

if(mysql_num_rows(mysql_query("select kode_kategori from kategori where kode_kategori = '$kode_kategori'")) > 0){
	
	echo "<script type='text/javascript'>
		alert('Kode kategori tersebut udh ada di database');history.go(-1)</script>";
	
}else if($kode_kategori == "" or $kategori == ""){
	echo "<script type='text/javascript'>
			alert('Data yang anda input belum lengkap'); history.go(-1);</script>";
}else{
	mysql_query("insert into kategori values(
				'$kode_kategori',
				'$kategori')") or die (mysql_error());

	echo "<script>window.location='index.php?hal=kategori&pesan2=Berhasil disimpan'</script>";
}			
?>