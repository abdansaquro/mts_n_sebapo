<?php
include "konek.php";

$tglawal	= $_POST['tglawal'];
$tglakhir	= $_POST['tglakhir'];

$tglawal2 = date_format(date_create($tglawal), 'Y-m-d') ;
$tglawal3 = date_format(date_create($tglawal), 'd-m-Y') ;
$tglakhir2 = date_format(date_create($tglakhir), 'Y-m-d') ;
$tglakhir3 = date_format(date_create($tglakhir), 'd-m-Y') ;

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
<h3><u>Laporan Pengembalian</u></h3>
</center>
<?php echo "Tanggal $tglawal3 s/d $tglakhir3" ?>
<center>
 <!-- <hr width="100%" color="#000"> -->
<br>

<body>
<table style="width:700px">
<tr>
						<th width="50px">Kode Pengembalian</th>
						<th width="50px">NIS</th>
						<th width="80px">Nama</th>
                        <th width="80px">Judul</th>
                        <th width="50px">Tanggal Kembali</th>
                        <th width="50px">Denda</th>
  </tr>
<tr>

<?php
				$view=mysql_query("SELECT * FROM pengembalian pb, peminjaman pm, buku bk, anggota ag
where
      pb.kode_peminjaman = pm.kode_peminjaman
and pm.kode_buku = bk.kode_buku
and pm.kode_anggota = ag.kode_anggota
and pm.tgl_kembali >= '$tglawal2' and pm.tgl_kembali <= '$tglakhir2'
				") or die (mysql_error());
				$no=0;
				while($row=mysql_fetch_array($view)){
				$no++;	
				?>

<tr>
						<td><?php echo $row['kode_pengembalian'];?></td>
						<td><?php echo $row['nis'];?></td>
						<td><?php echo $row['nama'] ;?></td>
						<td><?php echo $row['judul'];?></td>
						<td><?php echo date_format(date_create($row['tgl_kembali']), 'd-m-Y') ;?></td>
						<td>Rp. <?php echo $row['denda'];?></td>
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
