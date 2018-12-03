<?php 
/**
* File          : View.php
* Fungsi        : Representasi Interface/View
* Tanggal		: 28/09/2018
* Dibuat oleh  	: Dik 2016
*/

class view{

	function Tampilkan1($arg){		

		$this->header();

		foreach ($arg as $dt){
			echo "NIM   		 : " . $dt->nim . "<br/>";
			echo "Nama   		 : " . $dt->nama . "<br/>";
			echo "Jenis Kelamin  : " . $dt->jk . "<br/>";
			echo "Program Studi  : " . $dt->prodi . "<br/>";
			echo "Alamat   		 : " . $dt->alamat . "<br/>";
			echo "<br/>";
		}
	}

	function Tampilkan2($arg){		
		$this->header();
		print_r($arg);
	}


	function header(){
		echo "<a href='index.php?versi=tambah'>Tambah</a>&nbsp;" ;
		echo "<a href='index.php?versi=ubah'>Ubah</a>&nbsp;" ;
		echo "<a href='index.php?versi=1'>Lihat Versi 1</a> &nbsp;";
		echo "<a href='index.php?versi=2'>Lihat Versi 2</a> ";
		echo "<hr/>";		
	}

	function tambah(){
		include "ftambah.php";
	}

	function ubah($data){
		include "fubah.php";
	}	

} ?>