<?php 
if (isset($_GET['nim'])) {
	$temp = new angkatan();
	$temp -> hapus($_GET['nim'], $_GET['indeks']);
	echo "<meta http-equiv='refresh' content='0 url=index.php'>";
	die();	//untuk menghentikan proses compile script berikutnya
}
?>