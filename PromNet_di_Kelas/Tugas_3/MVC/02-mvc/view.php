<?php 
/**
* File          : View.php
* Fungsi        : Representasi Interface/View
* Tanggal		: 28/09/2018
* Dibuat oleh  	: Dik 2016
*/

class view{

	function Tampilkan1($arg){		
		echo "<a href='index.php?versi=2'>Lihat Versi 2 </a>";
		echo "<hr/>";
		foreach ($arg as $dt){
			echo "NIM   : " . $dt->nim . "<br/>";
			echo "Nama   : " . $dt->nama . "<br/>";
			echo "<br/>";
		}
	}

	function Tampilkan2($arg){		
		echo "<a href='index.php?versi=1'>Lihat Versi 1 </a>";
		echo "<hr/>";
		print_r($arg);
	}

} ?>