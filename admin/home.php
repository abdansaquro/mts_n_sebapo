<?php if(!isset($_SESSION['username'])){ ?>
<div style="padding:30px;text-align:left;">
	<h4>Selamat Datang</h4><hr>
	<img src="gambar/library-150367_960_720.png" style="width:200px" align="right">
	<p align="justify">Perpustakaan online ini dapat membantu anda untuk mendapatkan informasi buku yang terdapat di perpustakaan. silahkan klik kategori buku untuk melihat buku
	</p>
	<br>
	<br>
</div>
<div class="p-search">
	<h4>Pencarian Buku</h4><hr>
	<div class="row">
	<div class="col-md-12">
		<form action="index.php" method="post">
		<div style="display:inline-block;margin-bottom:10px;margin-right:20px;">
		Kategori
		<select name="filter">
			<option readonly hidden value="">Pilih Kategori</option>
			<?php $data=array(); $q=mysql_query("select * from kategori");while ($r=mysql_fetch_array($q)) { extract($r); ?>
				<option value="<?=$KodeKategori?>" <?=($KodeKategori==$filter)?'selected':null;?>><?=$NamaKategori?></option>
			<?php $data[]=$r; } ?>
		</select>
		</div>
		<div style="display:inline-block;margin-bottom:10px;margin-right:20px;">
		Cari Buku
		<input type="text" name="cari">
		<input type="submit" name="search" value="Cari">
		</div>
		</form>
	</div>
	</div>
</div>
	<br>

<div style="padding:30px;text-align:left;">
	<h4>Data Buku</h4><hr>
	<div>
		<?php foreach($data as $row) { extract($row); ?>
			<form action="index.php" method="post" style="display:inline-block">
			<input type="hidden" name="filter" value="<?=$KodeKategori?>">
			<input type="hidden" name="cari" value="">
			<input type="submit" name="search" value="<?=$NamaKategori?>">
			</form>
		<?php } ?>
	</div>
</div>
<?php 
if(isset($_POST['search'])){ 
	if(isset($_POST['filter'])){
		if($filter!=''){
			extract(mysql_fetch_array(mysql_query("select NamaKategori from kategori where KodeKategori='$filter'")));
		}else{
			$NamaKategori="Pencarian Buku";
		}
	}else{
		$NamaKategori="Pencarian Buku";
	}
?>
<div style="padding:30px;text-align:left;">
	<table class="table" style="border:1px solid #D9D9D9">
		<thead>
			<tr>
				<th colspan="5" style="text-align:center"><?=$NamaKategori?></th>
			</tr>
			<tr>
				<th>Kd.Buku</th>
				<th>Judul</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Tersedia</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(isset($_POST['filter']) && $_POST['filter']!=''){
				$q=mysql_query("select * from buku where KodeKategori='$filter' and (Judul like '%$cari%' or KodeBuku like '%$cari%')");
			}else{
				$q=mysql_query("select * from buku where Judul like '%$cari%'");
			}
			while($r=mysql_fetch_array($q)){
			extract($r);
			extract(mysql_fetch_array(mysql_query("select NamaKategori from kategori where KodeKategori='$KodeKategori'")));
			extract(mysql_fetch_array(mysql_query("select NamaPengarang from pengarang where KodePengarang='$KodePengarang'")));
			extract(mysql_fetch_array(mysql_query("select NamaPenerbit from penerbit where KodePenerbit='$KodePenerbit'")));
			?>
			<tr>
				<td><?=strtoupper($KodeBuku)?></td>
				<td><?=$Judul?></td>
				<td><?=$NamaPengarang?></td>
				<td><?=$NamaPenerbit?></td>
				<td style="text-align:center"><?=$Stok?></td>
			</tr>
			<?php
				}
			?>
			<?php if(!mysql_num_rows($q)>0){ ?>
			<tr>
				<td colspan="9" style="text-align:center;color:#757472;padding:10px">Data Tidak Ditemukan</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<script type="text/javascript">
	$(document).ready(function(){
		window.scrollTo(0,1000);
	});
	</script>
</div>
<?php } ?>
<?php }else{ ?>
<div style="padding:30px;text-align:left;">
	<h4>Selamat Datang Di Menu Administrator</h4><hr>
	<img src="gambar/library-150367_960_720.png" style="width:200px" align="right">
	<p align="justify">
	Silahkan menggunakan fasilitas menu yang terdapat disebelah kanan web untuk melakukan aktifitas input,Edit, dan Delete data buku
	</p>
	<p align="justify">Anda juga dapat menambahkan anggota perpustakaan lewat menu siswa</p>
	<p align="justify">
	Peminjaman dan pengembalian buku perpustakaan dapat diakses melalui link Peminjaman dan Pengembalian
	</p>

</div>
<?php } ?>