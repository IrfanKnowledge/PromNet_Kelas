<?php 
	require 'Class_Angkatan.php';
	include 'Hapus.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Class_Angkatan</title>
	<link rel="stylesheet" href="Style.css"/>
</head>
<body>
	<div class="header"> 
		<div class="header-text"> 
			Angkatan 2020	
		</div>
	</div>
	
	<div class="kotak-tengah">
		
		<center>
			<button><a href="index.php"> <b>Home</b> </a></button>
			<b>&nbsp;|&nbsp;</b>
			<button><a href="tambah.php"> <b>Tambah</b> </a></button>
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

		<?php
			$temp = new angkatan();
			$temp -> print_table();
			//session_destroy();
			session_reset(); 
		?>
	
	</div>

</body>
</html>