<?php 
	require 'Class_Angkatan.php';
	include 'Hapus.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Class_Angkatan</title>
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
			<button><a href="index.php"> <b>Kembali</b> </a></button>
			<b>&nbsp;|&nbsp;</b>
			<button><a href="Tambah.php"> <b>Tambah</b> </a></button>
			<br><br>
			<table>
				<tr>
					<td>	
						<form action="Cari.php" method="POST">
							<label>Cari: </label>
							<input type="text" name="nim" placeholder="NIM">
							<input type="submit" name="cari_nim" value="Cari">
						</form>
					</td>
					<td>	
						<form action="Cari.php" method="POST">
							<label>Cari: </label>
							<input type="text" name="nama" placeholder="Nama">
							<input type="submit" name="cari_nama" value="Cari">
						</form>
					</td>
				</tr>	
			</table>
		</center>
		<br><br>

		<table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
				
			<tr>
				<td>No.</td>
				<td>NIM</td>
				<td>Nama</td>
				<td>Jenis Kelamin</td>
				<td>Program Studi</td>
				<td>Alamat</td>
				<td>Telepon</td>
			<?php 
				$cek = new angkatan();

				if (isset($_POST['cari_nim']) == null && isset($_POST['cari_nama']) == null) {
					?>
						<tr align="center">
							<td colspan="9"><h3>Silahkan masukkan nim/nama pada pencarian.</h3></td>
						</tr>
					<?php
				}

				if (isset($_POST['cari_nim']) ) {

					$temp = new angkatan();
					
					if ($_POST['nim'] != "") {		// jika tidak kosong maka...
						if ($temp -> cek_data($_POST['nim']) == true) {		//jika NIM yang dicari ADA maka...
							$temp -> cari_nim($_POST['nim']);
						}else{
							?>
								<tr align="center">
									<td colspan="9"><h3>Hasil Tidak Ditemukan.</h3></td>
								</tr>
							<?php
						}
					}else{	//jika kosong maka...
						?>
							<tr align="center">
								<td colspan="9"><h3>Silahkan masukkan nim/nama pada pencarian.</h3></td>
							</tr>
						<?php
					}
				}

				if (isset($_POST['cari_nama']) ) {

					$temp = new angkatan();
					
					if ($_POST['nama'] != "") {		// jika tidak kosong maka...
						$temp -> cari_nama($_POST['nama']);
					}else{	//jika kosong maka...
						?>
							<tr align="center">
								<td colspan="9"><h3>Silahkan masukkan nim/nama pada pencarian.</h3></td>
							</tr>
					<?php
					}
				}
					?>

		</table>
	
	</div>
</body>
</html>