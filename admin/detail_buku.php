<?php
include "konek.php";
#ambil kode
$kode_buku2 = $_GET['kode_buku'];
#buat perintah tampil data
#extrak utk mengambil field
extract(mysql_fetch_array(mysql_query("select * from buku b, kategori k where b.kode_kategori = k.kode_kategori and kode_buku = '$kode_buku2'"))) or die (mysql_error()) ;
?>

<h2><u>Detail Buku</u></h2> 
<div>
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="70%">
				
				<tbody>
					<tr>
                    <th width="190px">Kode Buku</th>
					<td><?php echo $kode_buku ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Judul</th>
					<td><?php echo $judul ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Kategori</th>
					<td><?php echo $kategori ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Pengarang</th>
					<td><?php echo $pengarang ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Penerbit</th>
					<td><?php echo $penerbit ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Tempat Terbit</th>
					<td><?php echo $tempat_terbit ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Tahun Terbit</th>
					<td><?php echo $tahun_terbit ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Stok</th>
					<td><?php echo $stok ?></td>
					</tr>
				</tbody>
				
 </table>
</div>