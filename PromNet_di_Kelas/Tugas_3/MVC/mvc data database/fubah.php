<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
</head>
<body>

	<?php 
	    $nim = $data->nim;
	    $nama= $data->nama;
	?>

	<form method="post" action="index.php">
		<p>NIM  <input type="text" name="nim" value="<?php echo $nim ?>"> </p>
		<p>NAMA <input type="text" name="nama" value="<?php echo $nama ?>"> </p>
		<p>Jenis Kelamin: 
			<input type="radio" name="jk" value="L">Laki-laki 
			<input type="radio" name="jk" value="L">Perempuan
		</p>
		<p>
			Program Studi: 
			<select name="prodi">
				<option value="Pendidikan Ilmu Komputer">Pendidikan Ilmu Komputer</option>
				<option value="Ilmu Komputer">Ilmu Komputer</option>
			</select>
		</p>
		<P>Alamat:</P>
		<p>
			<textarea name="alamat"></textarea>
		</p>
		<input type="hidden" name="old_nim" value="<?php echo $nim?>">
		<input type="submit" name="simpan_ubah" value="Simpan">
		<input type="submit" name="batal" value="Batal">
	</form>
</body>
</html>