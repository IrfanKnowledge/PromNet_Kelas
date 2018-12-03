<?php
	if (isset($_POST['simpan_ubah']) ) {
	
		$nim = $_POST['nim'];
		$nama =  $_POST['nama'];
		$jk =  $_POST['jk'];
		$prodi =  $_POST['prodi'];
		$alamat = $_POST['alamat'];
		$old_nim = $_POST['old_nim'];
		$mySql = "UPDATE kelas_a_2016 SET NIM = $nim, nama = '$nama', jenis_kelamin = '$jk', program_studi = '$prodi', alamat = '$alamat'
				WHERE NIM = $old_nim "; 
		$myQry = mysql_query($mySql, $koneksidb) or die("Gagal query".mysql_error());
	}
?>;