<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jarak_Euclidean</title>
	<link rel="stylesheet" type="text/css" href="Style.css">

</head>

<body">

	<?php
		class jarak_euclidean {
			/*
			var $x = 5;
			var $y = 10;

			function Set_X ($arg){
				$this -> x = $arg;
			}
			function Set_Y ($arg){
				$this -> y = $arg;
			}
			function Get_X (){
				return $this -> x;
			}
			function Get_Y (){
				return $this -> y;
			}
			function PrintLokasi (){
				echo "( " . $this -> x 
					. "&nbsp;&nbsp;&nbsp;&nbsp;" .
					$this -> y . ")";

			}
			function Akar_Kuadrat(){
				$this -> x = pow($this -> x, 2);
				$this -> y = pow($this -> y, 2);		
			}
			*/
			
			var $temp1;
			var $temp2;
			var $hasil;

			function Dua_Dimensi ($p1, $p2, $q1, $q2){
				$this -> temp1 = pow(($q1 - $p1), 2);
				$this -> temp2 = pow(($q2 - $p2), 2);
				$this -> hasil = sqrt($this -> temp1 + $this -> temp2);

			}
			function Print_Dua_Dimensi (){
				echo "<br>";
				echo "<h2>Jarak Dua Dimensi</h2>" . $this -> hasil . "<br><br>";
			}
		}
		$temp = new jarak_euclidean();
		//$temp -> Akar_Kuadrat();
		//$temp -> PrintLokasi();
		//echo "<br><br>";
		//$temp -> Dua_Dimensi(2, 1, 5, 5);
		//$temp -> Print_Dua_Dimensi();

	?>


	<div class="header">
		<div class="header-text">
			Jarak_Euclidean
		</div>
	</div>
	
	<div class="kotak-tengah">
	<?php
	
	if (isset($_POST['p1']) && isset($_POST['p2']) 
		&& isset($_POST['q1']) && $_POST['q2']) {

		if( ($_POST['p1']) != NULL && ($_POST['p2'] != NULL) 
			&& ($_POST['q1']) != NULL && ($_POST['q2']) != NULL){
			$p1 = intval($_POST['p1']);
			$p2 = intval($_POST['p2']);
			$q1 = intval($_POST['q1']);
			$q2 = intval($_POST['q2']);
				
			$hasil = new jarak_euclidean();
			$hasil -> Dua_Dimensi($p1, $p2, $q1, $q2);
			$hasil -> Print_Dua_Dimensi();	

		}else{
			echo "<br>";
			echo "<h2>Jarak Dua Dimensi</h2>" . "(Belum ada input)" . "<br><br>";
		}
	}else{
		echo "<br>";
		echo "<h2>Jarak Dua Dimensi</h2>" . "(Belum ada input)" . "<br><br>";
	}

	?>
		<form action="Jarak_Euclidean.php" method="POST">
		  Bilangan x1:<br>
		  <input type="number" name="p1">
		  <br>
		  Bilangan y1:<br>
		  <input type="number" name="p2">
		  <br>
		  Bilangan x2:<br>
		  <input type="number" name="q1">
		  <br>
		  Bilangan y2:<br>
		  <input type="number" name="q2">
		  <br>
		  <input type="submit" value="Proses">
		</form>

	</div>

</body>


</html>