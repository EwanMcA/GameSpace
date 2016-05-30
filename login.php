<?php
session_start();

	include 'database_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	//$stmt = $conn->prepare("SELECT userName FROM users WHERE userName=? AND password=?");
	$stmt = $conn->prepare("SELECT userName, password FROM users WHERE userName=?");
	$stmt->bind_param("s", $userName);

	$userName = $_POST['userName'];
	$unhashed = $_POST['password'];
	
	$stmt->execute();
	$stmt->store_result();
	$num_rows = $stmt->num_rows;
	$stmt->bind_result($username, $hash);
	$stmt->fetch();
	if ($num_rows > 0) {
		if (password_verify($unhashed, $hash)) {
			$_SESSION['user'] = $username;
		} else {
			$_SESSION['errors'] = array("Incorrect Username or Password");
		}
    } 
	else if ($num_rows < 1) {
	    // echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    $_SESSION['errors'] = array("Incorrect Username or Password");
	}
	$stmt->free_result();
	$stmt->close();
	mysqli_close($conn);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>