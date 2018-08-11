<?php
include "konek.php";
$kode_pengembalian = $_GET['kode_pengembalian'];
if($kode_pengembalian != ""){
	$aksi = "ps_pengembalian.php";
	$q = mysql_query("select * from pengembalian where kode_pengembalian = '$kode_pengembalian'");
	$hsl = mysql_fetch_assoc($q);
}else{
	$aksi = "ps_pengembalian.php";
}
?>

<h2><u>Pengembalian</u></h2> 
<form role = "form" action="<?php echo $aksi ?>" method="post">
	
	<?php
		$q22 = mysql_query("select max(kode_pengembalian + 1) as kp from pengembalian") or die (mysql_error());
		$data22 = mysql_fetch_array($q22);
		$kp2 = $data22['kp'];
		
		if($kp2 == ""){
			$kp22 = 1;
		}else{
			$kp22 = $kp2;
		}
		
	?>

   <div class = "form-group">
      <label for = "name">Kode Pengembalian</label>
      <input type = "text" readonly required class = "form-control" id = "kode_pengembalian" name="kode_pengembalian" value="<?php echo $kp22 ?>">
   </div>
   
      <div class = "form-group">
      <label for = "name">Kode Peminjaman, Kode Buku, Judul Buku, NIS, Nama, Tanggal Pinjam, Tanggal Harus Kembali</label>
      <select class = "form-control" id="kode_peminjaman" name="kode_peminjaman">
		<option  value='' ></option>
		<?php     
		include "konek.php";
			$h = mysql_query("SELECT * FROM peminjaman pm, buku bk, anggota ag
where pm.kode_buku = bk.kode_buku
and pm.kode_anggota = ag.kode_anggota and pm.status != 'Kembali'
order by pm.kode_peminjaman desc") or die(mysql_error()); 			
        while ($baris = mysql_fetch_array($h)) {
			if($baris['kode_peminjaman'] == $result['kode_peminjaman']) {
				echo '<option value="' . $baris['kode_peminjaman'] . '" selected>' . $baris['kode_peminjaman'].' || '.$baris['kode_buku'].' || '.$baris['judul'].' || '.$baris['nis'].' || '.$baris['nama'].' || '.date_format(date_create($baris['tgl_pinjam']), 'd-m-Y').' || '.$baris['tgl_harus_kembali'].'</option>';    
			} else {
				echo '<option value="' . $baris['kode_peminjaman'] . '">' . $baris['kode_peminjaman'].' || ' . $baris['kode_buku'].' || ' . $baris['judul'].' || '.$baris['nis'].' || '.$baris['nama'].' || '.date_format(date_create($baris['tgl_pinjam']), 'd-m-Y').' || '.date_format(date_create($baris['tgl_harus_kembali']), 'd-m-Y').'</</option>';    
			}
        
          }    
        echo '</select>';    
        ?>
      </select>
   </div>

   <button type = "submit" class = "btn btn-primary">Kembalikan</button>
</form>




<h2><u>Data Pengembalian</u></h2><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th width="2px">No</th>
						<th width="2px">Kode Pengembalian</th>
						<th width="210px">Kode Peminjaman</th>
						<th width="210px">Kode Buku</th>
						<th width="410px">Judul</th>
						<th width="210px">NIS</th>
						<th width="210px">Nama</th>
						<th width="210px">Tanggal Pinjam</th>
						<th width="210px">Tanggal Harus Kembali</th>
						<th width="210px">Tanggal Kembali</th>
						<th width="1px">Keterlambatan</th>
						<th width="1px">Denda</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"SELECT * FROM pengembalian pb, peminjaman pm, buku bk, anggota ag
where
      pb.kode_peminjaman = pm.kode_peminjaman
and pm.kode_buku = bk.kode_buku
and pm.kode_anggota = ag.kode_anggota
order by pb.kode_pengembalian desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
		$ubah   			= "index.php?hal=peminjaman&kode_peminjaman=".$row['kode_peminjaman'];
		$hapus  			= "hp_peminjaman.php?kode_peminjaman=".$row['kode_peminjaman'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['kode_pengembalian'];?></td>
						<td><?php echo $row['kode_peminjaman'];?></td>
						<td><?php echo $row['kode_buku'];?></td>
						<td><?php echo $row['judul'];?></td>
						<td><?php echo $row['nis'];?></td>
						<td><?php echo $row['nama'];?></td>
						<td><?php echo date_format(date_create($row['tgl_pinjam']), 'd-m-Y');?></td>
						<td><?php echo date_format(date_create($row['tgl_harus_kembali']), 'd-m-Y');?></td>
						<td><?php echo date_format(date_create($row['tgl_kembali']), 'd-m-Y');?></td>
						<td><?php echo $row['keterlambatan'];?> Hari</td>
						<td><?php echo $row['denda'];?></td>
                       <td>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> 
						</a>
					   </td>						
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
