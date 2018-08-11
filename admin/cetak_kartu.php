<script>print();</script>
<?php
include "konek.php";
$kode_anggota	= $_GET['kode_anggota'];
extract(mysql_fetch_array(mysql_query("select * from anggota where kode_anggota = '$kode_anggota'")));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<style>
table,th,td
{
border-collapse:collapse;
}
</style>


<table width="621" border="1">
  <tr>
    <td width="139" rowspan="4" ><img src="gambar/logoagama.png" width="150" height="150" /></td>
    <td colspan="3" align="center" style="font-size:22px;">KEMENTRIAN AGAMA</td>
  </tr>
  <tr>
    <td colspan="3" align="center" style="font-size:22px;"  >MTS NEGERI SEBAPO</td>
  </tr>
  <tr>
    <td colspan="3" align="center" style="font-size:22px;">KABUPATEN MUARO JAMBI</td>
  </tr>
  <tr>
    <td colspan="3" align="center" style="font-size:22px;">JL. JAMBI - TEMPINO KM 19 DESA SEBAPO</td>
  </tr>
  <tr>
    <td colspan="4" align="center" style="font-size:19px;">KARTU ANGGOTA</td>
  </tr>
  <tr>
    <td rowspan="6">&nbsp;</td>
    <td width="156">NIS/NISN</td>
    <td width="17">:</td>
    <td width="281"> <?php echo "$nis/$nisn"; ?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $nama; ?></td>
  </tr>
  <tr>
    <td>Tempat/Tgl Lahir</td>
    <td>:</td>
    <?php 
		$tl = date_format(date_create($tanggal_lahir), 'd-m-Y');
	 ?>
    <td><?php echo "$tempat_lahir/$tl"; ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td><?php echo $jenis_kelamin; ?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $alamat; ?></td>
  </tr>
  <tr>
    <td>Pekerjaan</td>
    <td>:</td>
    <td><?php echo $pekerjaan; ?></td>
  </tr>
</table>

</body>
</html>
