<?php 
/**
* File          : View.php
* Fungsi        : Representasi Interface/View
* Tanggal		: 28/09/2018
* Dibuat oleh  	: Dik 2016
*/

class view{

	function Tampilkan($arg){
		
		print_r($arg);

		echo "<hr/>";

		foreach ($arg as $dt){
			echo "NIM   : " . $dt->nim . "<br/>";
			echo "Nama   : " . $dt->nama . "<br/>";
			echo "<br/>";
		}
	}

} ?>