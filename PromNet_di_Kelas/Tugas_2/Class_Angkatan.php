<?php
	//session_id("IdIrfan");
	
	session_start();
	//session_regenerate_id();
	//print_r($_SESSION);
	echo session_id();
	error_reporting(0);	//agar tulisan error $_SESSION['count_browser'] saat pertama kali membuka browser hilang, dikarenakan variable dianggap belum didefinisikan isinya
	$_SESSION['count_browser']++;	//untuk acuan data default awal pertama kali membuka browser
	echo $_SESSION['count_browser'];
	error_reporting(E_ALL); //mengaktifkan kembali semua tulisan error php

	if ($_SESSION['count_browser'] == 1) {
		$_SESSION['angkatan'] = array(
			 array('1603001', "Adi Mulyadi", "L", "Pendidikan Ilmu Komputer", "Jl. Pajajaran No. 10", '085793330901'),
			 array('1603002', "Fabianus Wahyudin", "L", "Ilmu Komputer", "Jl. DR. Setiabudhi No. 11", '085793330902'),
			 array('1603003', "Febriyanti Eka Parigi", "P", "Pendidikan Ilmu Komputer", "Jl. Peta No. 12", '085793330903'),
			 array('1603004', "Annisa Nur", "P", "Ilmu Komputer", "Jl. Purnawarman No. 13", '085793330904'),
			 array('1603005', "Restu Maulana Akbar", "L", "Pendidikan Ilmu Komputer", "Jl. Cihampelas No. 14", '085793330905'),
		);
	}

	class angkatan {

		/*
		function cek_nim($nim){
			$ketemu = false;	//asumsi data belum ditemukan
			$i= 0;
			while ($i < count($_SESSION['angkatan']) && $ketemu == false) {
				if ($_SESSION['angkatan'][$i][0] == $nim) {
				in_array($nim, $_SESSION['angkatan'][$i]);
					$ketemu = true;
				}
				$i++;

			}
			return $ketemu;
		}

		function cek_nama($nama){
			$ketemu = false;	//asumsi data belum ditemukan
			$i= 0;
			while ($i < count($_SESSION['angkatan']) && $ketemu == false) {
				if (strtolower($_SESSION['angkatan'][$i][1]) == strtolower($nama)) {
					//strtolwer = agar huruf capital inputan user tidak harus sama percis dengan data yang tersedia, kita rubah semuanya stringnya menjadi huruf capital kecil
					$ketemu = true;
				}
				$i++;

			}
			if ($ketemu == false) {

			}
			return $ketemu;
		}*/

		function cek_data($cari){
			$ketemu = false;	//asumsi data belum ditemukan
			$i= 0;
			while ($i < count($_SESSION['angkatan']) && $ketemu == false) {
				if (in_array(strtolower($cari), array_map("strtolower", $_SESSION['angkatan'][$i]) ) ) {
					$ketemu = true;
				}
				$i++;

			}
			return $ketemu;
		}

		function cek_nama_awal($nama){
			$ketemu = false;
			$i= 0;
				while ($i < count($_SESSION['angkatan']) && $ketemu == false) {
					if (substr(strtolower($_SESSION['angkatan'][$i][1]), 0, 3)  ==  substr(strtolower($nama), 0, 3) ) {
						//strtolwer = agar huruf capital inputan user tidak harus sama percis dengan data yang tersedia, kita rubah semuanya stringnya menjadi huruf capital kecil
						$ketemu = true;
					}
					$i++;

				}
			return $ketemu;
		}

		function tambah ($nim, $nama, $jk, $prodi, $alamat, $telepon){

			if ($this -> cek_data($nim) == true) {	//Jika nim sudah ada maka...
				echo "Maaf, nim sudah tersedia.<br>";
			}else{	//Jika nim belum ada maka...
				//$_SESSION['angkatan'][] = array($nim, $nama, $jk, $prodi, $alamat, $telepon);
				array_push($_SESSION['angkatan'], array($nim, $nama, $jk, $prodi, $alamat, $telepon));
			}

		}

		function hapus ($nim, $indeks){
			if ($this -> cek_data($nim) == false) {
				echo "Maaf, nim sudah tidak tersedia.<br>";
			}else{
				/*
				$i=0;
				while ($i < count($_SESSION['angkatan']) ) {
					if ($_SESSION['angkatan'][$i][0] == $nim) {
						array_splice($_SESSION['angkatan'], $i, 1);
					}
					$i++;	//Iterasi berikutnya, hingga akhir elemen array
				}
				*/
				array_splice($_SESSION['angkatan'], $indeks, 1);
			}
		}

		function edit($nim){
			if ($this -> cek_data($nim) == false) {
				echo "Maaf, nim sudah tidak tersedia.<br>";
			}else{
				$i=0;
				while ($i < count($_SESSION['angkatan']) ) {
					if ($_SESSION['angkatan'][$i][0] == $nim) {

					}
					$i++;	//Iterasi berikutnya, hingga akhir elemen array
				}
			}
		}

		function cari_nim ($nim){
			$this -> print_hasil_cari($nim, 0);	//0 = indeks NIM
		}

		function cari_nama ($nama){
			$this -> print_hasil_cari($nama, 1);	//1 = indeks nama
		}

		function print_hasil_cari ($cari, $indeks){	//$cari = data yang dicari, $indeks = element array pada indeks array tertentu yang akan ditelusuri
			if ($_SESSION['angkatan'] == null) { 	//jika variable angkatan null atau tidak memiliki element maka...
				?>
					<tr align="center">
						<td colspan="9"><h3>Data Kosong.</h3></td>
					</tr>
				<?php
			}else{	//jika tidak kosong maka...


				$i = 0;
				if ($this -> cek_data($cari) == true) {	//jika nama/nim yang dicari sama percis ada maka...
					?>
							<td></td>
							<td></td>
						</tr>
					<?php
					while ($i < count($_SESSION['angkatan']) ) {
						if (strtolower($_SESSION['angkatan'][$i][$indeks]) == strtolower($cari)) {
						//strtolwer = agar huruf capital inputan user tidak harus sama percis dengan data yang tersedia, kita rubah semuanya stringnya menjadi huruf capital kecil
							?>

								<tr>
									<td> <?php echo ($i+1); ?>. </td>

							<?php
									for ($j=0; $j < 6; $j++) {
							?>

									<td><?php echo $_SESSION['angkatan'][$i][$j]; ?> </td>

							<?php
									}
							?>
									<td  align="center"><button class = "button2"><a href="Edit.php?indeks=<?php echo $i?>" target="_self">Edit</a></button></td>
									<td align="center"><button class = "button2"><a href="?hapus=&nim=<?php echo $_SESSION['angkatan'][$i][0]?>&indeks=<?php echo $i?>" target="_self" onclick="return confirm('Apakah Anda yakin akan menghapus DATA ini?')">Delete</a></button></td>
								</tr>

					<?php
						}
					$i++;
					}
				}elseif ($this -> cek_nama_awal($cari) == true) {
					//jika nama/nim yang dicari, kata awalnya sama maka...

					//strtolwer = agar huruf capital inputan user tidak harus sama percis dengan data yang tersedia, kita rubah semuanya stringnya menjadi huruf capital kecil
						?>
								<td></td>
								<td></td>
							</tr>
						<?php
						while ($i < count($_SESSION['angkatan']) ) {
							if (substr(strtolower($_SESSION['angkatan'][$i][$indeks]), 0, 3) == substr(strtolower($cari), 0, 3)) {	//jika 3 karakter pertama 'sama' maka...
							//strtolwer = agar huruf capital inputan user tidak harus sama percis dengan data yang tersedia, kita rubah semuanya stringnya menjadi huruf capital kecil
								?>
									<tr>
										<td> <?php echo ($i+1); ?>. </td>

								<?php
										for ($j=0; $j < 6; $j++) {
								?>

										<td><?php echo $_SESSION['angkatan'][$i][$j]; ?> </td>

								<?php
										}
								?>
										<td  align="center"><button class = "button2"><a href="Edit.php?indeks=<?php echo $i?>" target="_self">Edit</a></button></td>
										<td align="center"><button class = "button2"><a href="?hapus=&nim=<?php echo $_SESSION['angkatan'][$i][0]?>&indeks=<?php echo $i?>" target="_self" onclick="return confirm('Apakah Anda yakin akan menghapus DATA ini?')">Delete></a></button></td>
									</tr>

						<?php
							}
						$i++;
						}

				}else{
					?>
						<tr align="center">
							<td colspan="9"><h3>Hasil Tidak Ditemukan.</h3></td>
						</tr>
					<?php
				}
			}
		}

		function print_table(){
			?>
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
					if ($_SESSION['angkatan'] == null) {
				?>
					<tr align="center">
						<td colspan="9"><h3>Data Kosong.</h3></td>
					</tr>

				<?php
					}else{
				?>
					<td></td>
					<td></td>
				<?php
					for ($i=0; $i < count($_SESSION['angkatan']); $i++) {
				?>

				</tr>

				<tr>
					<td> <?php echo ($i+1); ?>. </td>
					<?php
						for ($j=0; $j < 6; $j++) {
					?>

					<td> <?php echo $_SESSION['angkatan'][$i][$j]?> </td>
						<?php } ?>

					<td  align="center"><button class = "button2"><a href="Edit.php?indeks=<?php echo $i?>" target="_self">Edit</a></button></td>
					<td  align="center"><button class = "button2"><a href="?nim=<?php echo $_SESSION['angkatan'][$i][0]?>&indeks=<?php echo $i?>" target="_self" onclick="return confirm('Apakah Anda yakin akan menghapus DATA ini?')">Delete</a></button></td>
				</tr>

				<?php
					}
				}
				?>
			</table>
			<?php
		}

		function get_record($no){	//asumsi user memilih urutan data ke-berapa yang akan di ambil dalam daftar mahasiswa
			$i = 0;
			while ($i < count($_SESSION['angkatan']) && $i != ($no-1) ) {
				$i++;
			}
			return $_SESSION['angkatan'][$i];
		}

		function get_tabel_angkatan(){
			return $_SESSION['angkatan'];
		}


	}

	//$kelas = new angkatan();
	//$kelas -> tambah('1601111', "Irfan Muhammad Faisal", "L", "Pendidikan Ilmu Komputer", "Jl. Baladewa No. 43b", '085793330967');
	//$kelas -> hapus(1603713);
	//print_r($_SESSION['angkatan']);
	//echo "<br><br>";
?>
