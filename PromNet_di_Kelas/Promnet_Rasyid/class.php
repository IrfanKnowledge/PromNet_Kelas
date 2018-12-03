<?php
	session_id("IdRasyid");
	session_start();
	$_SESSION['count']++;
	if ($_SESSION['count'] == 1) {
		$_SESSION['angkatan'] = array();
	}

	class mhs{
		var $nim;
		var $nama;
		var $jeniskelamin;
		var $alamat;
		var $jurusan;
		var $nomor;

		function __construct($xnim, $xnama, $xjeniskelamin, $xalamat, $xjurusan, $xnomor){
			$this -> nim = $xnim;
			$this -> nama = $xnama;
			$this -> jeniskelamin = $xjeniskelamin;
			$this -> alamat = $xalamat;
			$this -> jurusan = $xjurusan;
			$this -> nomor = $xnomor;
		}
	}

	class angkatan{
		var $data;

		function __construct(){
			$this -> data = array();
		}

		function tambah($xMhs){				
			$this -> data[] = $xMhs;
			$_SESSION['angkatan'][] = $xMhs;
		}
	}
	//$temp = new mhs(1603719, "irfan muhammad faisal", "L", "Jl. Cihampelas No. 103", "Pendidikan Ilmu Komputer", "+625793330967");
	//print_r($temp);

?>