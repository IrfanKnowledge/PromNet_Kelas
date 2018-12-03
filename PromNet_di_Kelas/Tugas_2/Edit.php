<?php
	include 'Class_Angkatan.php'
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
			<button><a href="index.php" text-decoration = "none"> <b>Home</b> </a></button>
			<!--<b>&nbsp;|&nbsp;</b>
			<button><a href="tambah.php"> <b>Tambah</b> </a></button>-->
		<br><br>

		<?php
			//$temp_nim = $_SESSION['angkatan'][$_GET['indeks']][0];
			//agar ketika Tombol Proses di klik dan GET['indeks'] menghilang,
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
						if ($_POST['nim'] == $_GET["nim"]) { //jika nim sekarang sama seperti nim sebelumnya maka.. (kita rubah sisa datanya)
							$_SESSION['angkatan'][$_GET['indeks']] = array($_POST['nim'], $_POST['nama'], $_POST['jk'], $_POST['prodi'], $_POST['alamat'], $_POST['telepon']);
							echo "<h3>Data telah berhasil dirubah.</h3>";
						}elseif ($temp -> cek_data($_POST['nim']) == true) {	//jika nim perubahan sama seperti nim data lain yang telah ada maka... 
							echo "<h3>Maaf, nim sudah tersedia.</h3>";
						
							}else{							//jika tidak ada nim lainnya yang sama seperti nim perubahan maka..
								$_SESSION['angkatan'][$_GET['indeks']] = array($_POST['nim'], $_POST['nama'], $_POST['jk'], $_POST['prodi'], $_POST['alamat'], $_POST['telepon']);
								echo "<h3>Data telah berhasil dirubah.</h3>";
						}
					}
				}
			}

		?>

			<form action="Edit.php?indeks=<?php echo $_GET['indeks']?>&nim=<?php echo $_SESSION['angkatan'][$_GET['indeks']][0]?>" method="POST">
				  NIM:<br>
				  <input type="number" name="nim" value="<?php echo $_SESSION['angkatan'][$_GET['indeks']][0];?>">
				  <br>
				  Nama:<br >
				  <input type="text" name="nama" value="<?php echo $_SESSION['angkatan'][$_GET['indeks']][1];?>">
				  <br>
				  Jenis Kelamin:<br>
				  <?php
				  	if ( $_SESSION['angkatan'][$_GET['indeks']][2] = "L") {
				  		?>
				  			<input type="radio" name="jk" value="L" checked="checked"> Laki-Laki
				  			<input type="radio" name="jk" value="P"> Perempuan 
				  		<?php
				  	}elseif ( $_SESSION['angkatan'][$_GET['indeks']][2] == "P") {
				  		?>
				  			<input type="radio" name="jk" value="L"> Laki-Laki 
				  			<input type="radio" name="jk" value="P" checked="checked>"> Perempuan
				  		<?php
				  	}{

				  	}
				  ?>
				  
				  
				  <br>
				  Program Studi:<br>
				  <?php
				  	if ($_SESSION['angkatan'][$_GET['indeks']][3] == "Pendidikan Ilmu Komputer") {
				  		?>
					  		<select name="prodi">
							  	<option value="Pendidikan Ilmu Komputer"> Pendidikan Ilmu Komputer</option>
							  	<option value="Ilmu Komputer"> Ilmu Komputer</option>
							 </select>
				  		<?php
				  	}elseif ($_SESSION['angkatan'][$_GET['indeks']][3] == "Ilmu Komputer") {
				  		?>
					  		<select name="prodi">
							  	<option value="Pendidikan Ilmu Komputer" > Pendidikan Ilmu Komputer</option>
							  	<option value="Ilmu Komputer" selected="selected"> Ilmu Komputer</option>
							 </select>
				  		<?php
				  	}
				  ?>
				  
				  <br>
				  Alamat:<br>
				  <textarea name="alamat" placeholder="Alamat Anda"><?php echo $_SESSION['angkatan'][$_GET['indeks']][4];?></textarea>
				  <br>
				  No. Tlp./HP:<br>
				  <input type="number" name="telepon" placeholder="+62" value="<?php echo $_SESSION['angkatan'][$_GET['indeks']][5];?>">
				  <br>
				  <input  type="submit" name="simpan" value="Proses">
			</form>
		</center>

	</div>

</body>
</html>