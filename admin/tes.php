<h2><u>Tambah dan Edit Spart Part</u></h2>


			<h2><u>FAQ</u></h2><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>ID FAQ</th>
						<th>Pertanyaan</th>
						<th>Pertanyaan</th>
						<th>Pertanyaan</th>
						<th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Opsi</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"SELECT * FROM `faq` order by id_faq desc");
				$no=1;
				while($row=mysqli_fetch_array($view)){
				
				$edit   		= "index.php?hal=tefaq&id_faq=".$row['id_faq'];
				$hapus  		= "hp_faq.php?id_faq=".$row['id_faq'];
				
				?>
					<tr>
                    
                    <td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['id_faq'];?></td>
						<td><?php echo $row['pertanyaan'];?></td>
						<td><?php echo $row['pertanyaan'];?></td>
						<td><?php echo $row['pertanyaan'];?></td>
						<td><?php echo $row['pertanyaan'];?></td>
						<td><?php echo $row['jawaban'] ?></td>
                       <td>
						<a href="<?php echo $edit ?>" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span> Edit 
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span> Delete 
						</a>
					   </td>						
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" id="id_sp" name="id_sp" value="" />
   <div class = "form-group">
      <label for = "name">Nama</label>
      <input type = "text" class = "form-control" required="required" id = "nama" name = "nama" value="">
   </div>
   
   <div class = "form-group">
		<label for = "name">Kategori</label>
		<select  class = "form-control" id="kode_kategori" name="kode_kategori">
		<option value="">Silakan Pilih</option>
		</select>
		</div>
   
    <div class = "form-group">
		<label for = "inputfile">Gambar</label>
		<input type = "file" name = "images"><br>
		<?php if($id_sp != ""){ ?>
          <img src="<?php echo $gambar2;?>" height="100"/>
        <?php } ?>
   </div>
   
    <div class = "form-group">
      <label for = "name">Harga</label>
      <input type = "text" class = "form-control" id = "harga" required="required" name = "harga" value="">
   </div>
   
    <div class = "form-group">
      <label for = "name">Deskripsi</label>
      <textarea class = "form-control" rows = "3" id="deskripsi" name="deskripsi" required="required" value="<?php echo $result['deskripsi']; ?>"><?php echo $result['deskripsi']; ?></textarea>
      <script>CKEDITOR.replace('deskripsi')</script>
   </div>
   <button type = "submit" class = "btn btn-primary"><span class="fa fa-send"></span> Submit</button>
</form>