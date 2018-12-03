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

	function __construct($x,$y)
	{
		$this->nim = $x;
		$this->nama = $y;
	}

	function get(){
		$data = array("nim" => $this->nim,
	                  "nama" => $this->nama);
		return $data;
	}
}
 ?>