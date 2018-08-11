<?php
include "konek.php";
?>





<!DOCTYPE html>
<html>

<head>

<script type="text/javascript">
<!--
window.print();
//-->
</script>

<style>
table,th,td
{
border:1px solid black;
border-collapse:collapse;
}
th,td
{
padding:5px;
}
hr{
	color: #000000;
background-color: #000000;
height: 2px;
width:80%;
	
}
</style>
</head>

<center>
<h2>MTs N Sebapo Kabupaten Muaro Jambi</h2>
<h3>Jl. Jambi - Tempino KM. 19 Desa Sebapo</h3>
<h3><u>Laporan Buku</u></h3>
</center>
<center>
 <!-- <hr width="100%" color="#000"> -->
<br>

<body>
<table style="width:700px">
<tr>
						<th>Kode Buku</th>
						<th>Judul</th>
						<th>Kategori</th>
						<th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tempat Terbit</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
  </tr>
<tr>

<?php
				$view=mysql_query("
						select * from buku b, kategori k where k.kode_kategori = b.kode_kategori
				") or die (mysql_error());
				$no=0;
				while($row=mysql_fetch_array($view)){
				$no++;	
				?>

<tr>
						<td><?php echo $row['kode_buku'];?></td>
						<td><?php echo $row['judul'];?></td>
						<td><?php echo $row['kategori'];?></td>
						<td><?php echo $row['pengarang'] ;?></td>
						<td><?php echo $row['penerbit'];?></td>
						<td><?php echo $row['tempat_terbit'];?></td>
						<td><?php echo $row['tahun_terbit'];?></td>
						<td><?php echo $row['stok'];?></td>
  </tr>
				<?php } ?>
</table>
<div  style="margin:0px 0px 0px 390px;"><br>
     <font>Mengetahui</font><br>
	 <font>Kepala Perpustakaan</font>
	 <br>
	 <br>
	 <br>
	 <br>
	 <br>
	 <br>
	  <font><u>M. Mulayadi, S.Ag</u></font><br>
	  <font>NIP : 197404052006041001</font></div>
     
</body>
</center>
</html>
