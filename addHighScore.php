<?php
session_start();
	include 'database_info.php';
	if ($_SESSION['game'] === 'snake') {
		$_SESSION['score'] = 600;
	}
	if ($_SESSION['score'] > 0) {
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		$stmt = $conn->prepare("INSERT INTO highscores(highScore, userName, game) VALUES(?, ?, ?)");
		$stmt->bind_param("iss", $highScore, $userName, $game);

		$highScore = $_SESSION['score'];
		$userName = $_SESSION['user'];
		$game = $_SESSION['game'];
		unset($_SESSION['score']);
		
		$stmt->execute();

		$stmt->close();
		mysqli_close($conn);
	}

?>