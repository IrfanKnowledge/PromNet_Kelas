<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
</head>
<body>
	<form method="post" action="index.php">
		<p>NIM  <input type="text" name="nim"> </p>
		<p>NAMA <input type="text" name="nama"> </p>
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

		<input type="submit" name="simpan_tambah" value="Simpan">
		<input type="submit" name="batal" value="Batal">
	</form>
</body>
</html>