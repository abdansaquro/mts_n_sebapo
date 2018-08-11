<?php
include "konek.php";
#utk edit
$kode_peminjaman = $_GET['kode_peminjaman'];

if($_GET['p']){
	#simpan perpanjang
	$aksi = "ps_perpanjang.php";				

}else{

	if($kode_peminjaman != ""){
		#utk edit
		$aksi = "pu_peminjaman.php";
		$q = mysql_query("select * from peminjaman where kode_peminjaman = '$kode_peminjaman'");
		$result = mysql_fetch_assoc($q);
	}else{
		#utk tambah
		$aksi = "ps_peminjaman.php";
	}

}	
?>



<h2><u>Form Tambah Dan Edit Peminjaman</u></h2> 
<form role = "form" action="<?php echo $aksi ?>" method="post">
	
	<?php
		$qkp = mysql_query("select max(kode_peminjaman + 1) as kp from peminjaman") or die (mysql_error());
		$dataa = mysql_fetch_array($qkp);
		$kp = $dataa['kp'];
		
		if($kp == ""){
			$kp2 = 1;
		}else if($kode_peminjaman != ""){	
			$kp2 = $result['kode_peminjaman']; ;
		}else{
			$kp2 = $kp;
		}
		
	?>
   
	 <div class = "form-group">
      <label for = "name">Kode Peminjaman</label> 
      <input type = "text"  class = "form-control" readonly id = "kode_peminjaman" name="kode_peminjaman" value="<?php echo $kp2 ?>">
   </div>
	
	
	
	<?php
	#cek tgl
	$d = date('Y-m-d');	
	$st = $_GET['status'];
	#perpanjang
	if($_GET['p']){	
		#ada denda
		if($d > $_GET['tgl_harus_kembali']){
			echo "<script>window.location='index.php?hal=peminjaman&pesan2=Buku ini tidak bisa diperpanjang, karena terdapat denda'</script>";
		#sdh di baleki
		}else if($st == "Kembali"){
			echo "<script>window.location='index.php?hal=peminjaman&pesan2=Buku ini sudah dikembalikan, tidak bisa diperpanjang'</script>";		
		}else{
			#bisa diperpanjang
			$kb = "where kode_buku = '$_GET[kode_buku]'";
			$ka = "where kode_anggota = '$_GET[kode_anggota]'";
			mysql_query("update peminjaman set status = 'Kembali' where kode_peminjaman = '$_GET[kode_peminjaman]'");
			mysql_query("update peminjaman set tgl_kembali = '$d' where kode_peminjaman = '$_GET[kode_peminjaman]'");
			$s = "Perpanjang";
		}
	}else{
		#untuk minjam
		echo "";
		$s = "Pinjam";
	}
			
	?>
	
   <div class = "form-group">
      <label for = "name">Kode Buku, Judul dan Stok</label>
      <select class = "form-control" id="kode_buku" name="kode_buku">
		<option  value='' ></option>
		<?php     
		include "konek.php";
			$h = mysql_query("select * from buku $kb order by kode_buku desc") or die(mysql_error()); 			
        while ($baris = mysql_fetch_array($h)) {
			if($baris['kode_buku'] == $result['kode_buku']) {
				echo '<option value="' . $baris['kode_buku'] . '" selected>' . $baris['kode_buku'].' || '.$baris['judul'].' || '.$baris['stok'].'</option>';    
			} else {
				echo '<option value="' . $baris['kode_buku'] . '">' . $baris['kode_buku'].' || ' . $baris['judul'].' || ' . $baris['stok'].'</option>';    
			}
        
          }    
        echo '</select>';    
        ?>
      </select>
   </div>
   
   <div class = "form-group">
      <label for = "name">Kode Anggota, NIS, Nama</label>
      <select class = "form-control" id="kode_anggota" name="kode_anggota">
		<option  value='' ></option>"
		<?php     
		include "konek.php";
			$h = mysql_query("select * from anggota $ka order by kode_anggota desc") or die(mysql_error()); 			
        while ($baris = mysql_fetch_array($h)) {
			if($baris['kode_anggota'] == $result['kode_anggota']) {
				echo '<option value="' . $baris['kode_anggota'] . '" selected>' . $baris['kode_anggota'].' || '.$baris['nis'].' || '.$baris['nama'].'</option>';    
			} else {
				echo '<option value="' . $baris['kode_anggota'] . '">' . $baris['kode_anggota'].' || ' . $baris['nis'].' || ' . $baris['nama'].'</option>';    
			}
        
          }    
        echo '</select>';    
        ?>
      </select>
   </div>

	
   <div class = "form-group">
      <label for = "name">Tanggal Pinjam</label> 
      <input type = "hidden"  class = "form-control" id = "tgl_pinjam" name="tgl_pinjam" value="<?php echo date('Y-m-d')  ?>">
      <input type = "text"  class = "form-control" readonly value="<?php echo date('d-m-Y')  ?>">
   </div>
   
   <?php
		$tgl1 = date('d-m-Y');// pendefinisian tanggal awal
		$tgl2 = date('d-m-Y', strtotime('+3 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 3 hari
		
		$tgl3 = date('Y-m-d');// pendefinisian tanggal awal
		$tgl4 = date('Y-m-d', strtotime('+3 days', strtotime($tgl3))); //operasi penjumlahan tanggal sebanyak 3 hari
	  ?>
   
   <div class = "form-group">
      <label for = "name">Tanggal Harus Kembali</label> 
      <input type = "hidden"  class = "form-control" readonly id = "tgl_harus_kembali" name="tgl_harus_kembali" value="<?php echo $tgl4 ?>">
      <input type = "text"  class = "form-control" readonly value="<?php echo $tgl2 ?>">
   </div>
   
     <div class = "form-group">
      <label for = "name">Status</label> 
      <input type = "text" readonly  class = "form-control" id = "status" name="status" value="<?php echo $s; ?>">
   </div>
   
   <button type = "submit" class = "btn btn-primary">Submit</button>
</form>

<h2><u>Data Peminjaman</u></h2><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th width="2px">No</th>
						<th width="2px">Kode Peminjaman</th>
						<th width="210px">Judul</th>
						<th width="210px">Nama</th>
						<th width="210px">Tanggal Pinjam</th>
						<th width="210px">Tanggal Harus Kembali</th>
						<th width="210px">Tanggal Kembali</th>
						<th width="1px">Status</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"SELECT * FROM peminjaman pm, buku bk, anggota ag
										where pm.kode_buku = bk.kode_buku
										and pm.kode_anggota = ag.kode_anggota
										order by pm.kode_peminjaman desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
								$ubah   			= "index.php?hal=peminjaman&kode_peminjaman=".$row['kode_peminjaman'];
								$perpanjang   		= "index.php?p=true&hal=peminjaman&kode_anggota=".$row['kode_anggota']."&kode_buku=".$row['kode_buku']."&kode_peminjaman=".$row['kode_peminjaman']."&tgl_harus_kembali=".$row['tgl_harus_kembali']."&status=".$row['status'];
								$hapus  			= "hp_peminjaman.php?kode_peminjaman=".$row['kode_peminjaman'];
										
				$tk = $row['tgl_kembali'];
				
				if($tk == "0000-00-00"){
					$tk2 = "-";
				}else{
					$tk2 = date_format(date_create($row['tgl_kembali']),'d-m-Y');
				}
				
				//date_format(date_create($row['tgl_kembali']), 'd-m-Y');
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['kode_peminjaman'];?></td>
						<td><?php echo $row['judul'];?></td>
						<td><?php echo $row['nama'];?></td>
						<td><?php echo date_format(date_create($row['tgl_pinjam']), 'd-m-Y');?></td>
						<td><?php echo date_format(date_create($row['tgl_harus_kembali']), 'd-m-Y');?></td>
						<td><?php echo $tk2 ?></td>
						<td><?php echo $row['status'];?></td>
                       <td>
						<a href="<?php echo $ubah ?>" class="btn btn-success" title="Edit">
							<span class="glyphicon glyphicon-edit"></span> 
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> 
						</a>
						<a href="<?php echo $perpanjang ?>" class="btn btn-info" title="Perpanjang" >
							<span class="glyphicon glyphicon-align-justify"></span> 
						</a>
					   </td>						
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
