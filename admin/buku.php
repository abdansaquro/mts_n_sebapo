<?php
include "konek.php";
$kode_buku = $_GET['kode_buku'];
if($kode_buku != ""){
	$aksi = "pu_buku.php";
	$q = mysql_query("select * from buku where kode_buku = '$kode_buku'");
	$result = mysql_fetch_assoc($q);
}else{
	$aksi = "ps_buku.php";
}
?>

<u><h2>Form Tambah Dan Edit Buku</h2> </u>
<form role = "form" action="<?php echo $aksi ?>" method="post">
   <div class = "form-group">
   
		
		<div class = "form-group">
			<label for = "name">Kode Buku</label>
			<input type = "text"  <?php if($_GET['edit']){ echo "readonly";} ?> class = "form-control" id = "kode_buku" name="kode_buku" value="<?php echo $result['kode_buku']; ?>">
		</div>
		
		<div class = "form-group">
			<label for = "name">Judul</label>
			<input type = "text"  class = "form-control" id = "judul" name="judul" value="<?php echo $result['judul']; ?>">
		</div>
		
		<div class = "form-group">
		<label for = "name">Kategori</label>
		<select  class = "form-control" id="kode_kategori" name="kode_kategori">
		<option value="">Silakan Pilih</option>
		 <?php     
		include "konek.php";
        $h = mysql_query("select * from kategori order by kode_kategori desc") or die(mysql_error());    
        while ($baris = mysql_fetch_array($h)) {
			if($baris['kode_kategori'] == $result['kode_kategori']) {
				echo '<option value="' . $baris['kode_kategori'] . '" selected>' .$baris['kategori'].'</option>';    
			} else {
				echo '<option value="' . $baris['kode_kategori'] . '">' . $baris['kategori'].'</option>';    
			}
        
          }    
        echo '</select>';    
        ?>
		</select>
		</div>
			
		<div class = "form-group">
		<label for = "name">Pengarang</label>
		<input type = "text" class = "form-control" id = "pengarang" name="pengarang" value="<?php echo $result['pengarang']; ?>">
		</div>

				<div class = "form-group">
			<label for = "name">Penerbit</label>
			<input type = "text" class = "form-control" id = "penerbit" name="penerbit" value="<?php echo $result['penerbit']; ?>">
		</div>

				<div class = "form-group">
			<label for = "name">Tempat Terbit</label>
			<input type = "text"  class = "form-control" id = "tempat_terbit" name="tempat_terbit" value="<?php echo $result['tempat_terbit']; ?>">
		</div>	
		
				<div class = "form-group">
			<label for = "name">Tahun Terbit</label>
			<input type = "text" onKeyPress="return goodchars(event,'0987654321',this)" class = "form-control" id = "tahun_terbit" name="tahun_terbit" value="<?php echo $result['tahun_terbit']; ?>">
		</div>
		
		<div class = "form-group">
			<label for = "name">Stok</label>
			<input type = "text" onKeyPress="return goodchars(event,'0987654321',this)"  class = "form-control" id = "stok" name="stok" value="<?php echo $result['stok']; ?>">
		</div>
		
    </div>
   <button type = "submit" class = "btn btn-primary">Submit</button>
</form>

<u><h2>Data Buku</h2></u><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th width="1px">No</th>
						<th width="1px">Kode Buku</th>
						<th width="210px">Judul</th>
						<th>Kategori</th>
						<th>Stok</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"select * from buku b, kategori k where b.kode_kategori = k.kode_kategori order by kode_buku desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$ubah	= "index.php?edit=true&hal=buku&kode_buku=".$row['kode_buku'];
				$hapus	= "hp_buku.php?kode_buku=".$row['kode_buku'];
				$detail_buku	= "index.php?hal=detail_buku&kode_buku=".$row['kode_buku'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['kode_buku'];?></td>
						<td><?php echo $row['judul'];?></td>
						<td><?php echo $row['kategori'];?></td>
						<td><?php echo $row['stok'];?></td>
                       <td>
					    <a href="<?php echo $detail_buku ?>" target="_blank" title="Detail" class="btn btn-primary">
							<span class="glyphicon glyphicon-align-justify"></span>
						</a>
						 <a href="<?php echo $ubah ?>" class="btn btn-success" title="Edit">
							<span class="glyphicon glyphicon-edit"></span> 
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> 
						</a>
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
<br>