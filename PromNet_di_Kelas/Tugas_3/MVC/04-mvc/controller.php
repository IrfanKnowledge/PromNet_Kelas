<?php 
/**
* File          : Controller.php
* Fungsi        : Representasi Pengendali/controller
* Tanggal		: 28/09/2018
* Dibuat oleh  	: Dik 2016
*/

include "model.php";
include "view.php";

class Controller 
{
	var $data=array();

	function __construct($versi=1){

		$m1 = new Model("123","Ade Sanjaya");
		$m2 = new Model("234","Budi Lesmana Siregar");
		$m3 = new Model("456","Profesor Jajang Permana");

		$this->data[]=$m1;
		$this->data[]=$m2;
		$this->data[]=$m3;

		if (isset($_GET['versi'])){
			$versi=$_GET['versi'];
		}

		$this->Aksi($versi);
	}

	function Aksi($versi){

		$view1 = new view();

		if ($versi=='tambah') {
			$view1->tambah();
		} elseif ($versi=='ubah') {
			$olddata = new Model("456","Profesor Jajang Permana");
			$view1->ubah($olddata);
		} elseif ($versi==1) {
			$view1->Tampilkan1($this->data);
		} else {
			$view1->Tampilkan2($this->data);
		}
	}
}
 ?>