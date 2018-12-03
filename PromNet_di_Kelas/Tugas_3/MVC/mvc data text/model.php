<?php 
/**
* File          : Model.php
* Fungsi        : Representasi Model/data mahasiswa
* Tanggal		: 28/09/2018
* Dibuat oleh  	: Dik 2016
*/

class Model 
{
	var $nim;
	var $nama;
	var $jk;
	var $prodi;
	var $alamat;

	function __construct($arg)
	{
		$this->nim = $arg[0];
		$this->nama = $arg[1];
		$this->jk = $arg[2];
		$this->prodi = $arg[3];
		$this->alamat = $arg[4];
	}

	function get(){
		$data = array("nim" => $this->nim,
	                  "nama" => $this->nama,
	                  "jk" => $this->jk,
	                  "prodi" => $this->prodi,
	                  "alamat" => $this->alamat

	    );
		return $data;
	}
}


 ?>