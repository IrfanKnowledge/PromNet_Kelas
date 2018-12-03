<?php
	require 'class.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<br>
	<h1>Angkatan 2016</h1>

	<form>
		<table class="tabelindex" align="center">
			<tr>
				<th colspan="2">Data Mahasiswa</th>
			</tr>
		</table>

		<br><br>

		<button class="tomboltambah"><a href="tambah.php">Tambah</a></button>
		<?php
			echo "<br><br>";
			print_r($_SESSION['angkatan']);
		?>

	</form>

</body>
</html>