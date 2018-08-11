<?php
include "konek.php";
#ambil kode
$kode_pengembalian2 = $_GET['kode_pengembalian'];
 
 $q = mysql_query("select * from pengembalian pg, peminjaman_detail pd, buku bk, peminjaman pj, anggota ag
where pd.kode_peminjaman_detail = pg.kode_peminjaman_detail
and bk.kode_buku = pd.kode_buku
and pj.kode_peminjaman = pd.kode_peminjaman
and ag.kode_anggota = pj.kode_anggota
and pg.kode_pengembalian = '$kode_pengembalian2'");

$data = mysql_fetch_array($q);

$kode_peminjaman3 = $data['kode_peminjaman'];
$nis3 = $data['nis'];
$nama3 = $data['nama'];
$kode_buku3 = $data['kode_buku'];
$judul3 = $data['judul'];
$kode_anggota3 = $data['kode_anggota'];
$nama_anggota3 = $data['nama'];
$jumlah_pinjam3 = $data['jumlah_pinjam'];
$tgl_pinjam3 = $data['tgl_pinjam'];
 
?>


<h2><u>Detail Pengembalian</u></h2> 
<div>
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="70%">
				
				<tbody>
					<tr>
                    <th width="190px">Kode Pengembalian</th>
					<td><?php echo $kode_peminjaman3 ?></td>
					</tr>
					
					<tr>
                    <th width="190px">NIS</th>
					<td><?php echo $nis3  ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Nama</th>
					<td><?php echo $nama3 ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Kode Buku</th>
					<td><?php echo $kode_buku3 ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Judul</th>
					<td><?php echo $judul3 ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Kode Anggota</th>
					<td><?php echo $kode_anggota3 ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Nama Anggota</th>
					<td><?php echo $nama_anggota3 ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Jumlah Pinjam</th>
					<td><?php echo $jumlah_pinjam3 ?></td>
					</tr>
					
					<tr>
                    <th width="190px">Tanggal Pengembalian</th>
					<td><?php echo "$tgl_pinjam3" ?></td>
					</tr>
					
				</tbody>
				
 </table>
</div>
