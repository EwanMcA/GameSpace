<?php
session_start();

	include 'database_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	$stmt = $conn->prepare("SELECT userName FROM users WHERE userName=? AND password=?");
	$stmt->bind_param("ss", $userName, $password);


	$userName = $_POST['userName'];
	$password = $_POST['password'];
	
	$result = $stmt->execute();
	if ($result->num_rows > 0) {
		$_SESSION['user'] = $result;
    } 
	else if ($result->num_rows < 1) {
	    // echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    $_SESSION['errors'] = array("Incorrect Username or Password");
	}

	$stmt->close();
	mysqli_close($conn);

?>