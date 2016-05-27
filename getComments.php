<?php 
	session_start();
	include 'database_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = "SELECT userName, comment FROM comments WHERE game = 'snake'";
	$result = $conn->query($sql);

	$json_result=array();

	while($row = $result->fetch_assoc()) {
		array_push($json_result, $row);
	}

	echo json_encode($json_result); 
	mysqli_close($conn);
?>