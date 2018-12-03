<!DOCTYPE html>
<html>
<head>
	<title>Cobaaja</title>
</head>
<body>
	<p style="text-align:center;">
		<a href="Data_Mahasiswa.php">Home </a>
	</p>

	<?php

	$x = 10;
	$y = 30;

	echo $x;

	function cobalagi(){
		$GLOBALS['x'] = $GLOBALS['x'] + $GLOBALS['y'];
	}

	cobalagi();

	echo "<br>$x";
	echo "<br>$y";
	?>

	<?php
		echo "<h2>PHP is Fun!</h2>";
		echo "Hello world!<br>";
		echo "I'm about to learn PHP!<br>";
		echo "This ", "string ", "was ", "made ", "with multiple parameters.";
	?>


</body>
</html>
