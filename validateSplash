<?php
session_start();

	if (isset($_SESSION['map'])) {

	}
	else {
		$map_string = '';
		for($i = 0; $i <= 256; $i++) {
			$map_string = $map_string . strval(rand(0,5));
		}
		$_SESSION['map'] = $map_string;
		echo $map_string;
	}



?>