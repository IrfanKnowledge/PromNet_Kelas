<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar_Buku</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	<div class="header">
		<div class="header-text">
			Buku
		</div>
	</div>
	
	<div class="kotak-tengah">	
		<?php
			class mahasiswa{

				var $kode;
				var $judul;
				var $penulis;
				var $tahun;

				function input_data($kode, $judul, $penulis, $tahun){
					$this -> kode = $kode;
					$this -> judul = $judul;
					$this -> penulis = $penulis;
					$this -> tahun = $tahun;
				}

				function print_hasil(){
					echo "<br>";
					echo "kode = " . $this -> kode . "<br>";
					echo "judul = " . $this -> judul . "<br>";
					echo "Jenis penulis = " . $this -> penulis . "<br>";
					echo "Tahun = " . $this -> tahun . "<br>";
				}
			}
		?>

		<?php
			if(isset($_POST['kode']) && isset($_POST['judul']) && 
				isset($_POST['penulis']) && isset($_POST['tahun'])){
				
				if($_POST['kode'] != NULL && $_POST['judul'] != NULL && 
					$_POST['penulis'] != NULL && $_POST['tahun'] != NULL){

					$temp = new mahasiswa();
					$temp -> input_data($_POST['kode'], $_POST['judul'], 
							$_POST['penulis'], $_POST['tahun']);			
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
		
		<form action="Buku.php" method="POST">
			<h3>Input kode:</h3>
			<input type="number" name="kode">
			<br>
			<h3>Input judul:</h3>
			<input type="text" name="judul" value="">
			<br>
			<h3>Penulis:</h3>
			<input type="text" name="penulis" value="">
			<br>
			<h3>Tahun: </h3>
			<input type="number" name="tahun" value="">
			<br>
			<br>
			<input type="submit" value="selesai">
		</form>	
	</div>
</body>
</html>


