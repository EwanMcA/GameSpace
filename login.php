<?php
session_start();

	include 'database_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	$stmt = $conn->prepare("SELECT userName FROM users WHERE userName=? AND password=?");
	$stmt->bind_param("ss", $userName, $password);


	$userName = $_POST['userName'];
	$password = $_POST['password'];
	
	$stmt->execute();
	$stmt->bind_result($username);
	$stmt->fetch();
	if ($username->num_rows > 0) {
		$_SESSION['user'] = $username;
    } 
	else if ($username->num_rows < 1) {
	    // echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    $_SESSION['errors'] = array("Incorrect Username or Password");
	}

	$stmt->close();
	mysqli_close($conn);
	
	header("location: index.php");

?>