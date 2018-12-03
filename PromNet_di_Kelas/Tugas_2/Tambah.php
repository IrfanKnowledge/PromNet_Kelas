<?php
	require 'Class_Angkatan.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tambah_Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>

	<div class="header">
		<div class="header-text">
			Angkatan 2020
		</div>
	</div>


	<div class="kotak-tengah">

		<center>
			<button><a href="index.php" text-decoration = "none"> <b>Home</b> </a></button>
			<!--<b>&nbsp;|&nbsp;</b>
			<button><a href="tambah.php"> <b>Tambah</b> </a></button>-->
		<br><br>

		<?php
			if (isset($_POST['simpan']) ){
				if (isset($_POST['jk']) == null) {
					echo "<h3>Maaf, data tidak boleh kosong.</h3>";
				}else{
					if ( $_POST['nim'] == "" || $_POST['nama'] == ""
						|| $_POST['prodi'] == "" || $_POST['alamat'] == ""
						|| $_POST['telepon'] == "") {
						echo "<h3>Maaf, data tidak boleh kosong.</h3>";
					}else{
						$temp = new angkatan();
						if ($temp -> cek_data($_POST['nim']) == true) {
							echo "<h3>Maaf, nim sudah tersedia.</h3>";
						}else{
							$temp -> tambah($_POST['nim'], $_POST['nama'], $_POST['jk'], $_POST['prodi'], $_POST['alamat'], $_POST['telepon']);
							echo "<h3>Data telah berhasil ditambahkan.</h3>";
						}
					}
				}
			}

		?>
			<form action="Tambah.php" method="POST">
				  NIM:<br>
				  <input type="number" name="nim" placeholder="NIM">
				  <br>
				  Nama:<br>
				  <input type="text" name="nama" placeholder="Nama">
				  <br>
				  Jenis Kelamin:<br>
				  <input type="radio" name="jk" value="L"> Laki-Laki
				  <input type="radio" name="jk" value="P"> Perempuan
				  <br>
				  Program Studi:<br>
				  <select name="prodi">
				  	<option value="Pendidikan Ilmu Komputer"> Pendidikan Ilmu Komputer</option>
				  	<option value="Ilmu Komputer"> Ilmu Komputer</option>
				  </select>
				  <br>
				  Alamat:<br>
				  <textarea name="alamat" placeholder="Alamat Anda"></textarea>
				  <br>
				  No. Tlp./HP:<br>
				  <input type="number" name="telepon" placeholder="+62">
				  <br>
				  <input  type="submit" name="simpan" value="Proses">
			</form>
		</center>

	</div>
</body>
</html>
