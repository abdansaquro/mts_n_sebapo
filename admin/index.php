<?php
error_reporting(0);
include "konek.php";
session_start();
	if($_SESSION['login'] !="1"){
		 echo "<script> window.location = 'login.php'</script>";
	}

$hal = $_GET['hal'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Perpus</title>
		<link rel="shortcut icon" type="image/x-icon" href="">
		<link rel="stylesheet" type="text/css" href="index.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>	
		<script type="text/javascript">
			function onlyNumbers(evt,e) {
				var charCode = (evt.which) ? evt.which : event.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;
				return true;
			}
			var loadFile = function(event,img) {
			    img.setAttribute("style","background-image:url('"+URL.createObjectURL(event.target.files[0])+"')");
			};
		</script>
	</head>
	<body onLoad="document.getElementById('').setAttribute('class','submenu active')">
		<div class="bg" style="background-image: url('gambar/a.jpg');">
			<div class="logo">
				<div class="contanerlogo">
					<div left></div>
					<div right></div>
					<div class="school" style="background-image:url('gambar/library-icon.png')">
						<!-- <img src="gambar/siperpus.png" width="350" align="left"> -->
						<h3>PERPUSTAKAAN</h3>
						<h2>MTs N Sebapo</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="containerbox">
			<section class="nav">
				<div class="menu">
						
					<div class="submenu" id="user" onClick="location.href='index.php?hal=buku'">
						<h3> <font><?php if($hal == "buku"){ echo "#";} ?>Buku</font></h3>
				    </div>
					
					<div class="submenu" id="user" onClick="location.href='index.php?hal=anggota'">
						<h3> <font><?php if($hal == "anggota"){ echo "#";} ?>Anggota</font></h3>
				    </div>
					
					<div class="submenu" id="user" onClick="location.href='index.php?hal=kategori'">
						<h3> <font><?php if($hal == "kategori"){ echo "#";} ?>Kategori</font></h3>
				    </div>
					
					<div class="submenu" id="user" onClick="location.href='index.php?hal=transaksi'">
						<h3> <font><?php if($hal == "transaksi"){ echo "#";} ?>Transaksi</font></h3>
				    </div>
					
					<div class="submenu" id="user" onClick="location.href='index.php?hal=laporan'">
						<h3> <font><?php if($hal == "laporan"){ echo "#";} ?>Laporan</font></h3>
				    </div>
					
					<div class="submenu" id="user" onClick="location.href='index.php?hal=setting'">
						<h3> <font><?php if($hal == "setting"){ echo "#";} ?>Pengaturan</font></h3>
				    </div>
					
					<div class="submenu" id="user" onClick="location.href='logout.php'">
						<h3> <font>Logout</font></h3>
				    </div>
					
			</section>
			<div style="width:90%;margin-left:5%;display:flex;display:-webkit-flex;">
				<div class="content" style="padding:10px"> 
				<!--
					<br><div class="afterlogin">Selamat Datang. <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <strong></strong> - <strong>adwa</strong></div>
				-->	
					
					<!-- utk ckeditor -->
		<script src="ckeditor/ckeditor.js"></script>
		  <!-- utk ckeditor -->


<!-- table -->	
<link rel="stylesheet" href="plugin_table/bootstrap.min.css">
<script src="plugin_table/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="plugin_table/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="plugin_table/jquery.dataTables.css">
<script type="text/javascript" src="plugin_table/jquery.min.js"></script>
<script type="text/javascript" src="plugin_table/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
	   $('#example').DataTable();
	} );
</script>
<!-- table sampe sni -->	

<?php

if($_GET['pesan']){
	echo "
	<div class='alert alert-info'>
		<strong>$_GET[pesan]</strong>
	</div>
";
}else if($_GET['pesan2']){
	echo "
	<div class='alert alert-info'>
		<strong>$_GET[pesan2]</strong>
	</div>
";
	
}
?>


<?php

if($hal == "buku"){
	include "buku.php";
}else if($hal == "anggota"){
	include "anggota.php";
}else if($hal == "kategori"){
	include "kategori.php";
}else if($hal == "transaksi"){
	include "transaksi.php";
}else if($hal == "laporan"){
	include "laporan.php";
}else if($hal == "setting"){
	include "setting.php";
}else if($hal == "detail_anggota"){
	include "detail_anggota.php";	
}else if($hal == "datapeminjaman"){
			include "datapeminjaman.php";
		}else if($hal == "detail_datapeminjaman"){
			include "detail_datapeminjaman.php";
		}else if($hal == "detail_datapengembalian"){
			include "detail_datapengembalian.php";	
		}else if($hal == "datapengembalian"){
			include "datapengembalian.php";
		}else if($hal == "detail_buku"){
			include "detail_buku.php";	
		}else if($hal == "peminjaman"){
			include "peminjaman.php";
		}else if($hal == "pengembalian"){
			include "pengembalian.php";
		}else if($hal == "laporan_peminjaman"){
			include "laporan_peminjaman.php";
		}else if($hal == "laporan_pengembalian"){
			include "laporan_pengembalian.php";	
		}else if($hal == "ubah_username"){
			include "ubah_username.php";
		}else if($hal == "ubah_password"){
			include "ubah_password.php";		
		}else{
			echo "<h1>Halaman yang anda maksd tdk ada</h1>";
		}

?>


					
					
					
					
				</div>
				<div class="right">
					<div style="padding:20px">
						<h4>Perpustakaan <small>MTs N Sebapo</small></h4><hr>
						<img src="gambar/buku.png" align="right" style="width:70px">
						Membangun bersama mencerdaskan bangsa, mari terus tuntut ilmu gapai semua mimpi dan cita-citamu
					</div> 
					<div style="padding:20px">
						<h4>MENU <small>Pilih Menu</small></h4><hr>
						<ul class="navright">
							<li><a href="index.php?hal=buku">&raquo; Buku</a></li>
							<li><a href="index.php?hal=anggota">&raquo; Anggota</a></li>
							<li><a href="index.php?hal=kategori">&raquo; Kategori</a></li>
							<li><a href="index.php?hal=transaksi">&raquo; Transaksi</a></li>
							<li><a href="index.php?hal=laporan">&raquo; Laporan</a></li>
							<li><a href="index.php?hal=setting">&raquo; Setting</a></li>
							<li><a href="#">&raquo; Logout</a></li>
						</ul>
					</div> 
				</div>
			</div>
			<div class="nospace"></div>
		</div>
		<div class="footer">Copyright &copy; 2018 - Perpustakaan MTs N Sebapo</div>
	</body>
</html>