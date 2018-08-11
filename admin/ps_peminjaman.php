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

	if($kode_buku2 == "" or $kode_anggota2 == ""){
		echo "<script type='text/javascript'>alert('Data yang anda input tidak lengkap');history.go(-1)</script>";
	}else{

		#cek stok
		extract(mysql_fetch_array(mysql_query("select stok as s from buku where kode_buku = '$kode_buku2'"))) or die (mysql_error());

		#cek jumlah buku yg dipinjam
		$qry = mysql_query("SELECT count(kode_buku) as jumlah_buku FROM peminjaman where kode_anggota = '$kode_anggota2' and status = 'Pinjam'") or die (mysql_error());
		$dt = mysql_fetch_array($qry);
		$jumlah_buku2 = $dt['jumlah_buku'];
		 
		if($jumlah_buku2 >= 3){
			echo "<script>window.location='index.php?hal=peminjaman&pesan=Max pinjam hanya 3 buku'</script>";
		}else if($s < 1){	
			echo "<script>window.location='index.php?hal=peminjaman&pesan=Stok buku habis'</script>";
		}else{
				mysql_query("insert into peminjaman values(
								'$kode_peminjaman2',
								'$kode_buku2',
								'$kode_anggota2',
								'$tgl_pinjam2',
								'$tgl_harus_kembali2',
								'$tgl_kembali2',
								'$status2')") or die(mysql_error());
								
				mysql_query("update buku set stok = stok - 1 where kode_buku = '$kode_buku2'");				

				echo "<script>window.location='index.php?hal=peminjaman&pesan=Berhasil disimpan'</script>";				
	}
}



/*
#cari kode terbesar di tabel peminjaman detail
$q3= mysql_query("SELECT max(kode_peminjaman) + 1  as kode_peminjaman2  from peminjaman_detail") or die (mysql_error());
$data3 = mysql_fetch_array($q3);
$kode_peminjaman2 = $data3['kode_peminjaman2'];
//echo $kode_peminjaman2;

#utk cek data di peminjaman detail, jika kosong isi 1, jika ada jalankan kode peminjaman2
if($kode_peminjaman2 == ""){
	$kode_peminjaman3 = 1;
}else{
	$kode_peminjaman3 = $kode_peminjaman2;
}


$query = mysql_query("select * from peminjaman_temp");
while($data=mysql_fetch_array($query)){
	$simpan = mysql_query("insert into `peminjaman_detail` values(
						0,
					  '$kode_peminjaman3',
					  '$data[kode_buku]', 						  
					  '$data[jumlah_pinjam]',
					  '$data[jumlah_pinjam]'
					    )") or die (mysql_error());

mysql_query("update buku set stok = stok - '$data[jumlah_pinjam]' where kode_buku = '$data[kode_buku]'") or die (mysql_error());
}

$kode_anggota		= $_POST['kode_anggota'];

#cek tgl skrng
$tglskrg = date('Y-m-d'); 

#+ tgl skrng 3 hari		
$tgl1 = date('Y-m-d');// pendefinisian tanggal awal
$bataspinjam = date('Y-m-d', strtotime('+3 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 3 hari

#total 
$qT = mysql_query("select sum(jumlah_pinjam) as total_buku from peminjaman_temp") or die (mysql_error());
$data = mysql_fetch_array($qT);
$tb = $data['total_buku'];

if($tb < 1){
	echo "<script>alert('Buku yang dipinjam blum ada');
			window.location='index.php?hal=peminjaman'</script>";
}else{
$q = mysql_query("insert into peminjaman values(
					'$kode_peminjaman3',
					'$kode_anggota',
					'$tglskrg',
					'$bataspinjam',
					'$tb')") or die (mysql_error());

					
#hapus smua data di peminjaman temp
mysql_query("delete from peminjaman_temp") or die (mysql_error());
}
if($q){
	echo "<script>window.location='index.php?hal=peminjaman&pesan2=Berhasil disimpan'</script>";
} */
?>