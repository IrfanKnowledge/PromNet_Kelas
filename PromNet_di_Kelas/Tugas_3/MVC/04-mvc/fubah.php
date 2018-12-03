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
		<input type="submit" name="simpan" value="Simpan">
		<input type="submit" name="batal" value="Batal">
	</form>
</body>
</html>