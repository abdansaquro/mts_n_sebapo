
<u><h2>Data Buku</h2></u><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th width="1px">No</th>
						<th width="1px">Kode Buku</th>
						<th width="210px">Judul</th>
						<th>Kategori</th>
						<th>Pengarang</th>
						<th>Penerbit</th>
						<th>Tahun Terbit</th>
						<th>Tempat Terbit</th>
						<th>Stok</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				include "admin/konek2.php";
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
						<td><?php echo $row['pengarang'];?></td>
						<td><?php echo $row['penerbit'];?></td>
						<td><?php echo $row['tahun_terbit'];?></td>
						<td><?php echo $row['tempat_terbit'];?></td>
						<td><?php echo $row['stok'];?></td>
                       
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>
<br>