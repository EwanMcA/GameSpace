<?php
session_start();
	include 'database_info.php';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
		// // Check connection
	// if ($conn->connect_error) {
		// die("Connection failed: " . $conn->connect_error);
	// } 
	
	$stmt = $conn->prepare("INSERT INTO comments(userName, comment, timestamp, game) VALUES(?, ?, FROM_UNIXTIME(?), ?)");
	$stmt->bind_param("ssi", $userName, $comment, $timestamp, $game);

	$userName = $_SESSION['user'];
	$comment = $_POST['comment'];
	$timestamp = time();
	$game = "snake";
	
	if (!$stmt->execute()) {
	    // echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    $_SESSION['errors'] = array("You Must Login to Comment.");
	}

	$stmt->close();
	mysqli_close($conn);
	
	header("location: index.php");
	
?>