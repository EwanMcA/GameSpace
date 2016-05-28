<?php
session_start();
	if (isset($_SESSION['map'])) {
		$_SESSION['score'] = 0;
	}
	$map_string = '';
	for($i = 0; $i <= 256; $i++) {
		$map_string = $map_string . strval(rand(0,5));
	}
	$_SESSION['map'] = $map_string;
	$_SESSION['turns_left'] = 30;
	echo $map_string;
?>