<?php
include "konek.php";
error_reporting(0);

$kode_buku					= $_POST['kode_buku'];
$jumlah_pinjam				= $_POST['jumlah_pinjam'];


#mencari total buku
$qT = mysql_query("select sum(jumlah_pinjam) as total_buku from peminjaman_temp") or die (mysql_error());
$data = mysql_fetch_array($qT);
$tb = $data['total_buku'];

#cek stok
if($kode_buku == ""){
	
}else{
	extract(mysql_fetch_array(mysql_query("select stok from buku where kode_buku = '$kode_buku'"))) or die (mysql_error());
}

if($kode_buku == "" or $jumlah_pinjam == ""){
	
	echo "<script type='text/javascript'>
			alert('Data yang anda input belum lengkap'); history.go(-1);</script>";

}else if($stok == 0){
	
	echo "<script>window.location='index.php?hal=peminjaman&pesan=Stok buku habis'</script>";
	
}else if($jumlah_pinjam >  $stok){
	
	echo "<script>window.location='index.php?hal=peminjaman&pesan=Jumlah pinjam tidak boleh lebih byk dari stok'</script>";
	
# query cek kode buku, udh ado apa idak
}else if(mysql_num_rows(mysql_query("SELECT kode_buku FROM `peminjaman_temp` WHERE kode_buku = '$kode_buku'")) > 0){
	
	echo "<script>window.location='index.php?hal=peminjaman&pesan=Kode Buku tersebut udh ada di database'</script>";
	
#max pinjam		
//}else if(($tb + $jumlah_pinjam) > 2){
	
//	echo "<script>window.location='index.php?hal=peminjaman&pesan=Max pinjam hanya 2 buku'</script>";
	
#simpan			
}else{
	
	$q = mysql_query("insert into peminjaman_temp values(
				0,
				'$kode_buku',
				'$jumlah_pinjam')") or die (mysql_error()); 
				
	echo "<script>window.location='index.php?hal=peminjaman&pesan2=Berhasil disimpan'</script>";
				
}

?>