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
	var $data;

	function __construct(){
		if (isset($_GET['versi'])){
			$versi=$_GET['versi'];
		} else {
			$versi=1;
		}

		$this->Display($versi);
	}

	function Display($versi){
		$m1 = new Model("123","Ade Sanjaya");
		$m2 = new Model("234","Budi Lesmana Siregar");
		$m3 = new Model("456","Profesor Jajang Permana");

		$data[]=$m1;
		$data[]=$m2;
		$data[]=$m3;

		$view1 = new view();

		if ($versi==1) {
			$view1->Tampilkan1($data);
		} else {
			$view1->Tampilkan2($data);
		}


	}
}
 ?>