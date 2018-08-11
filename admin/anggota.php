<?php
include "konek.php";
$kode_anggota = $_GET['kode_anggota'];
if($kode_anggota != ""){
	$aksi = "pu_anggota.php";
	$q = mysql_query("select * from anggota where kode_anggota = '$kode_anggota'");
	$result = mysql_fetch_assoc($q);
}else{
	$aksi = "ps_anggota.php";
}
?>

<h2><u>Form Tambah Dan Edit Anggota</u></h2> 
<form role = "form" action="<?php echo $aksi ?>" method="post">
   <div class = "form-group">
		
		<div class = "form-group">
			<label for = "name">Kode Anggota</label>
			<input type = "text"  <?php if($_GET['edit']){ echo "readonly"; }  ?> class = "form-control" id = "kode_anggota" name="kode_anggota" value="<?php echo $result['kode_anggota']; ?>">
		</div>
		
        <div class = "form-group">
			<label for = "name">NIS</label>
			<input type = "text"  class = "form-control" onKeyPress="return goodchars(event,'0987654321',this)" id = "nis" name="nis" value="<?php echo $result['nis']; ?>">
		</div>
        
        <div class = "form-group">
			<label for = "name">NISN</label>
			<input type = "text"  class = "form-control" onKeyPress="return goodchars(event,'0987654321',this)" id = "nisn" name="nisn" value="<?php echo $result['nisn']; ?>">
		</div>
        
		<div class = "form-group">
			<label for = "name">Nama</label>
			<input type = "text"  class = "form-control" id = "nama" name="nama" value="<?php echo $result['nama']; ?>">
		</div>
		
		<div class = "form-group">
			<label for = "name">Tempat Lahir</label>
			<input type = "text"  class = "form-control" id = "tempat_lahir" name="tempat_lahir" value="<?php echo $result['tempat_lahir']; ?>">
		</div>
		
		<div class = "form-group">
			<label for = "name">Tanggal Lahir</label>
			<input type = "date"  class = "form-control" id = "tanggal_lahir" name="tanggal_lahir" value="<?php echo $result['tanggal_lahir']; ?>">
		</div>
		

		
        <div class = "form-group">
			<label for = "name">Jenis Kelamin</label><br>
			<input type="radio" checked="checked"  name="jenis_kelamin" id="jenis_kelamin" value="L"<?php if ($result[jenis_kelamin]=="L") echo ("checked") ; ?>  />L&nbsp;&nbsp;
			<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P"<?php if ($result[jenis_kelamin]=="P") echo ("checked") ; ?>  />P&nbsp;&nbsp;
		</div>
        
		<div class = "form-group">
			<label for = "name">Kelas</label><br>
			<input type = "text"  class = "form-control" id = "kelas" name="kelas" value="<?php echo $result['kelas']; ?>">
		</div>
		
		<div class = "form-group">
			<label for = "name">Alamat</label>
			<textarea class = "form-control" id = "alamat" name="alamat" value="<?php echo $result['alamat']; ?>"><?php echo $result['alamat'] ?></textarea>
		</div>
		
        
		<div class = "form-group">
			<label for = "name">Pekerjaan</label><br>
			<select  class = "form-control" id="pekerjaan" name="pekerjaan">
			<option value=""></option>
			<option value="Pelajar" <?php if ($result['pekerjaan']=="Pelajar") echo ("selected") ; ?>>Pelajar</option>
			</select>
		</div>
        
    </div>
   <button type = "submit" class = "btn btn-primary">Submit</button>
</form>

<h2><u>Data Anggota</u></h2><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>Kode Anggota</th>
						<th>NIS</th>
						<th>NISN</th>
						<th>Nama</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"select * from anggota order by kode_anggota desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$ubah	= "index.php?edit=true&hal=anggota&kode_anggota=".$row['kode_anggota'];
				$detail_anggota	= "index.php?hal=detail_anggota&kode_anggota=".$row['kode_anggota'];
				$hapus	= "hp_anggota.php?kode_anggota=".$row['kode_anggota'];
				$cetak_kartu	= "cetak_kartu.php?kode_anggota=".$row['kode_anggota'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['kode_anggota'];?></td>
						<td><?php echo $row['nis'];?></td>
						<td><?php echo $row['nisn'];?></td>
						<td><?php echo $row['nama'];?></td>
                       <td>
                       
						<a href="<?php echo $cetak_kartu ?>" class="btn btn-info" title="Cetak Kartu Anggota">
							<span class="glyphicon glyphicon-print"></span> 
						</a>
						<a href="<?php echo $detail_anggota ?>" target="_blank" class="btn btn-default" title="Detail">
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