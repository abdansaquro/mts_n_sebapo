<?php

include "konek.php";

#ambil data yg di input
$kode_anggota		= $_POST['kode_anggota'];
$nis				= $_POST['nis'];
$nisn				= $_POST['nisn'];
$nama				= $_POST['nama'];
$tempat_lahir		= $_POST['tempat_lahir'];
$tanggal_lahir		= $_POST['tanggal_lahir'];
$jenis_kelamin		= $_POST['jenis_kelamin'];
$kelas				= $_POST['kelas'];
$alamat				= $_POST['alamat'];
$pekerjaan				= $_POST['pekerjaan'];

#perintah cek kode buku yg sama
$q = mysql_num_rows(mysql_query("select kode_anggota from anggota where kode_anggota = '$kode_anggota'"));

if($kode_anggota == "" or $nis == "" or $nisn == "" or $nama == "" or 
$tempat_lahir == "" or $tanggal_lahir == "" 
or $kelas == "" or $alamat == "" or $pekerjaan == ""){
	echo	"<script type='text/javascript'>
					alert('Data yang diinput belum lengkap'); history.go(-1);
				</script>"; 	
}else if($q > 0){
		echo	"<script type='text/javascript'>
					alert('Kode anggota tersebut sudah ada di database'); history.go(-1);
				</script>";
}else{

	mysql_query("insert into anggota values(
					'$kode_anggota',
					'$nis',
					'$nisn',
					'$nama',
					'$tempat_lahir',
					'$tanggal_lahir',
					'$jenis_kelamin',
					'$kelas',
					'$alamat',
					'$pekerjaan'
					)");

	echo "<script>window.location='index.php?hal=anggota&pesan2=Berhasil disimpan'</script>";
	

}		
?>