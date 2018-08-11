<?php
include "konek.php";
$kode_kategori = $_GET['kode_kategori'];
if($kode_kategori != ""){
	$aksi = "pu_kategori.php";
	$q = mysql_query("select * from kategori where kode_kategori = '$kode_kategori'");
	$result = mysql_fetch_assoc($q);
}else{
	$aksi = "ps_kategori.php";
}
?>

<h2><u>Form Tambah Dan Edit Kategori</u></h2> 
<form role = "form" action="<?php echo $aksi ?>" method="post">
   <div class = "form-group">
		
		<?php
			if($_GET['e']){
				$r = "readonly";
			}
		?>
		
		<div class = "form-group">
			<label for = "name">Kode Kategori</label>
			<input type = "text" class = "form-control" <?php echo $r; ?> id = "kode_kategori" name="kode_kategori" value="<?php echo $result['kode_kategori']; ?>">
		</div>
		
		<div class = "form-group">
			<label for = "name">Kategori</label>
			<input type = "text" class = "form-control" id = "kategori" name="kategori" value="<?php echo $result['kategori']; ?>">
		</div>
		
    </div>
   <button type = "submit" class = "btn btn-primary">Submit</button>
</form>

<h2><u>Data Kategori</u></h2><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>Kode Kategori</th>
						<th>Kategori</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"select * from kategori order by kode_kategori desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$ubah	= "index.php?e=true&hal=kategori&kode_kategori=".$row['kode_kategori'];
				$hapus	= "hp_kategori.php?kode_kategori=".$row['kode_kategori'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['kode_kategori'];?></td>
						<td><?php echo $row['kategori'];?></td>
                       <td>
						<a href="<?php echo $ubah ?>" class="btn btn-success" title="Edit">
							<span class="glyphicon glyphicon-edit"></span> 
						</a>
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
<br>
