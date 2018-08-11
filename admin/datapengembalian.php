
<h2><u>Data Pengembalian</u></h2><br>   
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>No</th>
						<th>Kode Pengembalian</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Kode Buku</th>
                        <th>Judul</th>
                        <th>Tanggal Pengembalian</th>
						<th>Aksi</th>
                        
					</tr>
				</thead>
				<tbody>
				<?php
				include "konek2.php";
				$view=mysqli_query($db,"
					select * from pengembalian pg, peminjaman_detail pd, buku bk, peminjaman pj, anggota ag
where pd.kode_peminjaman_detail = pg.kode_peminjaman_detail
and bk.kode_buku = pd.kode_buku
and pj.kode_peminjaman = pd.kode_peminjaman
and ag.kode_anggota = pj.kode_anggota
				");
				$no=1;
				while($row=mysqli_fetch_array($view)){
					
		$detail_pengembalian	= "index.php?hal=detail_datapengembalian&kode_pengembalian=".$row['kode_pengembalian'];	
		$hapus  			= "hp_data_pengembalian.php?kode_pengembalian=".$row['kode_pengembalian'];
				
				?>
					<tr>
						<td><center><?php echo $no++ ?></center></td>
						<td><?php echo $row['kode_pengembalian'];?></td>
						<td><?php echo $row['nis'];?></td>
						
						<td><?php echo $row['nama'] ;?></td>
						<td><?php echo $row['kode_buku'];?></td>
						<td><?php echo $row['judul'];?></td>
						<td><?php echo date_format(date_create($row['tgl_pengembalian']), 'd-m-Y') ;?></td>
						<td>
						<center>
						<a href="<?php echo $detail_pengembalian ?>" class="btn btn-success">
							<span class="glyphicon glyphicon-select"></span> Detail 
						</a>
						<a href="<?php echo $hapus ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')">
							<span></span> Delete 
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