<?php

include "konek.php";
$kode_anggota2 = $_GET['kode_anggota'];
extract(mysql_fetch_array(mysql_query("select * from anggota where kode_anggota = '$kode_anggota2'"))) or die (mysql_error());
?>
<h2><u>Detail Anggota</u></h2> 
<div>
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="70%">
				
				<tbody>
					<tr>
                    <th width="190px">Kode Anggota</th>
					<td><?php echo $kode_anggota ?></td>
					</tr>
					
					<tr>
                    <th width="190px">NIS</th>
					<td><?php echo $nis ?></td>
					</tr>
					
					<tr>
                    <th width="190px">NISN</th>
					<td><?php echo $nisn ?></td>
					</tr>
					
					
					
					<tr>
                    <th width="190px">Nama</th>
					<td><?php echo $nama ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Tempat Lahir</th>
					<td><?php echo $tempat_lahir ?></td>
					</tr>
					
                    <tr>
                    <th width="190px">Tanggal Lahir</th>
					<td><?php echo date_format(date_create ($tanggal_lahir), 'd-m-Y')?></td>
					</tr>
                    
					<tr>
                    <th width="190px">Jenis Kelamin</th>
					<td><?php echo $jenis_kelamin ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Kelas</th>
					<td><?php echo $kelas ?></td>
					</tr>
                    
                    <tr>
                    <th width="190px">Alamat</th>
					<td><?php echo $alamat ?></td>
					</tr>
                    
                    <tr>
                    <th width="190px">Pekerjaan</th>
					<td><?php echo $pekerjaan ?></td>
					</tr>
				</tbody>
				
 </table>
</div>