<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar_Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	<div class="header">
		<div class="header-text">
			Mahasiswa
		</div>
	</div>
	
	<div class="kotak-tengah">	
		<?php
			class mahasiswa{

				var $nim;
				var $nama;
				var $jk;
				var $prodi;

				function input_data($nim, $nama, $jk, $prodi){
					$this -> nim = $nim;
					$this -> nama = $nama;
					$this -> jk = $jk;
					$this -> prodi = $prodi;
				}

				function print_hasil(){
					echo "<br>";
					echo "NIM = " . $this -> nim . "<br>";
					echo "Nama = " . $this -> nama . "<br>";
					echo "Jenis Kelamin = " . $this -> jk . "<br>";
					echo "Program Studi = " . $this -> prodi . "<br>";
				}
			}
		?>

		<?php
			if(isset($_POST['nim']) && isset($_POST['nama']) && 
				isset($_POST['jk']) && isset($_POST['prodi'])){
				
				if($_POST['nim'] != NULL && $_POST['nama'] != NULL && 
					$_POST['jk'] != NULL && $_POST['prodi'] != NULL){

					$temp = new mahasiswa();
					$temp -> input_data($_POST['nim'], $_POST['nama'], 
							$_POST['jk'], $_POST['prodi']);			
					$temp -> print_hasil();
				}else{
					echo "<br>";
					echo "Mohon tidak ada yang kosong";

				}
			}else{
				echo "<br>";
				echo "Mohon tidak ada yang kosong";
			}

		?>
		
		<form action="Mahasiswa.php" method="POST">
			<h3>Input NIM:</h3>
			<input type="number" name="nim">
			<br>
			<h3>Input Nama:</h3>
			<input type="text" name="nama" value="">
			<br>
			<h3>Jenis Kelamin:</h3>
			<input type="radio" name="jk" value="L">Laki-laki
			<input type="radio" name="jk" value="P">Perempuan
			<br>
			<h3>Program Studi: </h3>
			<select name="prodi">
				<option value="Pendidikan Ilmu Komputer">Pendidikan Ilmu Komputer</option>
				<option value="Ilmu Komputer">Ilmu Komputer</option>
			</select>
			<br>
			<br>
			<input type="submit" value="selesai">
		</form>	
	</div>
</body>
</html>


