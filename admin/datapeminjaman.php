
<h2><u>Data Peminjaman</u></h2><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th width="2px">No</th>
						<th width="1px">Kode Peminjaman</th>
						<th width="1px">NIS</th>
						<th width="1px">Nama</th>
						<th width="1px">Kode Buku</th>
                        <th width="110px">Judul</th>
                        <th width="1px">Tanggal Pinjam</th>
						<th>Aksi</th>
                        
					</tr>
				</thead>
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"
					SELECT * FROM peminjaman_detail pd, peminjaman pj, buku b, anggota a
where pd.kode_peminjaman = pj.kode_peminjaman and pd.kode_buku = b.kode_buku and pj.kode_anggota = a.kode_anggota
order by pd.kode_peminjaman desc
				");
				$no=1;
				while($row=mysqli_fetch_array($view)){
					
		$detail_peminjaman	= "index.php?hal=detail_datapeminjaman&kode_peminjaman_detail=".$row['kode_peminjaman_detail'];	
		$hapus  			= "hp_data_peminjaman.php?kode_peminjaman_detail=".$row['kode_peminjaman_detail'];
				
				?>
					<tr>
						<td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['kode_peminjaman'];?></td>
						<td><?php echo $row['nis'];?></td>
						
						<td><?php echo $row['nama'] ;?></td>
						<td><?php echo $row['kode_buku'];?></td>
						<td><?php echo $row['judul'];?></td>
						<td><?php echo date_format(date_create($row['tgl_pinjam']), 'd-m-Y') ;?></td>
						<td>
						<center>
						<a href="<?php echo $detail_peminjaman ?>" class="btn btn-success">
							<span class="glyphicon glyphicon-align-justify"></span>
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
						</center>
					   </td>	
                       
					</tr>
				<?php
				}
				?>
				</tbody>
				
 </table>
</div>