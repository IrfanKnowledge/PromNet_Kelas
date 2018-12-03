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

			$i = 0;
			$temp = array();
			$fp = fopen("kelas_a_2016.txt", "r");
			while ($myData = fgets($fp, 150)) {
				
				$temp[] = $myData;
				$i++;
				if ($i == 5) {
					$i = 0;				//reset iterasi
					$m = new Model($temp);
					$this->data[] = $m;

					$temp = array();	//reset temp;
				}
			}					
		
			fclose($fp);

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

			$olddata = $this->data[1];
			$view1->ubah($olddata);
			
		} elseif ($versi==1) {
			$view1->Tampilkan1($this->data);
		} else {
			$view1->Tampilkan2($this->data);
		}
	}
}
 ?>