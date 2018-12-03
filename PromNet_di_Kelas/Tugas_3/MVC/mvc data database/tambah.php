<?php
	if (isset($_POST['simpan_tambah']) ) {
	
		$nim = $_POST['nim'];
		$nama =  $_POST['nama'];
		$jk =  $_POST['jk'];
		$prodi =  $_POST['prodi'];
		$alamat = $_POST['alamat'];
		$mySql = "INSERT INTO kelas_a_2016 (NIM, Nama, Jenis_Kelamin, Program_Studi, Alamat)
					VALUES ($nim, '$nama', '$jk', '$prodi', '$alamat')"; 
		$myQry = mysql_query($mySql, $koneksidb) or die("Gagal query".mysql_error());
	}
?>;