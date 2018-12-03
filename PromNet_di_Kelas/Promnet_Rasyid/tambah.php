<?php
	require 'class.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php
		if (isset($_POST['simpan'])){
			$temp_mhs = new mhs($_POST['nim'], $_POST['nama'], $_POST['jeniskelamin'], $_POST['alamat'], $_POST['jurusan'], $_POST['nomor']);
			$temp_angkatan = new angkatan();
			$temp_angkatan -> tambah($temp_mhs);
			print_r($temp_angkatan);
		}
	?>

	<br>
	<h1>Angkatan 2016</h1>

	<form action="tambah.php" method="POST">
		<table align="center">
			<tr>
				<th colspan="2">Data Mahasiswa</th>
			</tr>
			<tr>
				<td class="kiri"><input type="text" name="nim" placeholder="NIM"></td>
				<td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
			</tr>
			<tr>
				<td class="kiri">
					<select name="jeniskelamin">
						<option>-- Pilih Jenis Kelamin --</option>
						<option>Laki - Laki</option>
						<option>Perempuan</option>
					</select>
				</td>
				<td rowspan="3"><textarea name="alamat" placeholder="Alamat" rows="9"></textarea></td>
			</tr>
			<tr>
				<td class="kiri"><input type="text" name="jurusan" placeholder="Jurusan"></td>
			</tr>
			<tr>
				<td class="kiri"><input type="text" name="nomor" placeholder="No Kontak"></td>
			</tr>
		</table>

		<br><br>
		<input type="submit" name="simpan" value="Simpan">
		<button><a href="index.php">Simpan Data</a></button>
	</form>

</body>
</html>