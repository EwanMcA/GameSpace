<?php
session_start();
	$map = str_split($_SESSION['map']);
	$turnstring = $_REQUEST["t"];
	$turns = str_split($turnstring);
	for ($i=0; $i < strlen($turnstring); $i++) {
		flood(0, $map[0],$turns[$i]);
	}
	if (finished()) {
		if(!isset($_SESSION['score'])) {
			$_SESSION['score'] = 0;
		}
		$_SESSION['score'] = 250+intval($_SESSION['score']);
		unset($_SESSION['map']);
	}

	function flood($i, $t, $r) {
		if($map[$i]!=$t) { return; }
		if ($t===$r) { return; }
		$map[$i] = $r;
		if ($i > 15) {
		flood($i-16, $t, $r);
		}
		if ($i%16 < 15) {
			flood($i+1, $t, $r);
		}
		if ($i%16 > 0) {
			flood($i-1, $t, $r);
		}
		if ($i+16 < 16*16) {
			flood($i+16, $t, $r);
		}
	}

	function finished() {
		for ($i = 1; $i < 16*16; $i++) {
			if ($map[$i] != $map[0]) {
				return false;
			}
		}
		return true;
	}

?>