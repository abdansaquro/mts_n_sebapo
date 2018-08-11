<?php

//error_reporting(0);

include "konek.php";


$kode_pengembalian		= $_POST['kode_pengembalian'];
$kode_peminjaman		= $_POST['kode_peminjaman'];

$q1 = mysql_query("select * from peminjaman where kode_peminjaman = '$kode_peminjaman'") or die (mysql_error());
$data1 = mysql_fetch_array($q1);
$tgl_harus_kembali = $data1['tgl_harus_kembali'];
$kode_buku22 = $data1['kode_buku'];


#tgl skrng
$tglnow = date('Y-m-d');

# kurangi tgl
$tgl_harus_kembali2=strtotime($tgl_harus_kembali);
$tglnow2=strtotime($tglnow);
$keterlambatan=($tglnow2-$tgl_harus_kembali2)/(24 *3600);


if($keterlambatan < 1){
	$keterlambatan2 = 0;
}else{
	$keterlambatan2 = $keterlambatan;
}

#hitung denda
$denda2 = ($keterlambatan*1)*1000;

if($denda2 < 1){
	$denda3 = 0;
}else if($denda2 > 1){
	$denda3 = $denda2;	
}

#simpan
mysql_query("insert into pengembalian values (
			'$kode_pengembalian',
			'$kode_peminjaman',
			'$keterlambatan2',
			'$denda3')") or die (mysql_error());

mysql_query("update peminjaman set status = 'Kembali' where kode_peminjaman = '$kode_peminjaman'");
mysql_query("update peminjaman set tgl_kembali = '$tglnow' where kode_peminjaman = '$kode_peminjaman'");
mysql_query("update buku set stok = stok + 1 where kode_buku = '$kode_buku22'");

echo "<script>
			window.location='index.php?hal=pengembalian&pesan=Berhasil disimpan dengan denda Rp. $denda3'</script>";
			
/*

#tgl skrng
$tglnow = date('Y-m-d');

# kurangi tgl
$batas_pinjam2=strtotime($batas_pinjam);
$tglnow2=strtotime($tglnow);
$keterlambatan=($tglnow2-$batas_pinjam2)/(24 *3600);


if($keterlambatan < 1){
	$keterlambatan2 = 0;
}else{
	$keterlambatan2 = $keterlambatan;
}

#hitung denda
$denda2 = ($keterlambatan*$jumlah_kembali)*300;

if($denda2 < 1){
	$denda3 = 0;
}else if($denda2 > 1){
	$denda3 = $denda2;	
}



if($kode_peminjaman_detail == ""){
	echo "<script>alert('Data yang anda inputkan belum lengkap');
			window.location='index.php?hal=pengembalian'</script>";			
}else if($jumlah_kembali == ""){
	echo "<script>alert('Data yang anda inputkan belum lengkap');
			window.location='index.php?hal=pengembalian&kode_peminjaman_detail=$kode_peminjaman_detail'</script>";
}else if($jumlah_kembali > $sisa_pinjam){
	echo "<script>alert('jumlah kembali tdk boleh lebih besar dari jumlah pinjam');
			window.location='index.php?hal=pengembalian&kode_peminjaman_detail=$kode_peminjaman_detail'</script>";
}else{
#simpan data
# $denda3 utk denda
mysql_query("insert into pengembalian values(
						0,
						'$kode_peminjaman_detail',
						'$tglnow',
						'$jumlah_kembali',
						'$keterlambatan2',
						'$denda3')") or die (mysql_error()) ;	 

# mengurangi sisa pinjam di tabel peminjaman detail
mysql_query("update peminjaman_detail set sisa_pinjam = sisa_pinjam - $jumlah_kembali where kode_peminjaman_detail = $kode_peminjaman_detail;") or die (mysql_error());				
# menambah stok di tabel buku
mysql_query("update buku set stok = stok + $jumlah_kembali where kode_buku ='$kode_buku'") or die (mysql_error());				
echo "<script>
			window.location='index.php?hal=pengembalian&pesan=Berhasil dikembalikan dengan denda Rp. $denda3'</script>";

}

*/
?>