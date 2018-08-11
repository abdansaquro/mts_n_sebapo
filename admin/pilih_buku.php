<?php
$kode_buku = $_GET['kode_buku'];

if($kode_buku){
		header("Location: index.php?hal=peminjaman&kode_buku=$kode_buku");
}
?>