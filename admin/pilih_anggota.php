<?php
$kode_anggota = $_GET['kode_anggota'];

if($kode_anggota){
		header("Location: index.php?hal=peminjaman&kode_anggota=$kode_anggota");
}
?>