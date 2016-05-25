<html> 
<body>
<?php
	include 'database_info.php';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
		// // Check connection
	// if ($conn->connect_error) {
		// die("Connection failed: " . $conn->connect_error);
	// } 
	
	$stmt = $conn->prepare("INSERT INTO users(userName, password) VALUES(?, ?)");
	$stmt->bind_param("ss", $userName, $password);

	$userName = $_POST['userName'];
	$password = $_POST['password']; 
	
	// echo "password" . $password;
	// echo "userName" . $userName;
	
	// $sql = "INSERT INTO users (userName, password)
	// VALUES ('John', 'Doe')";

	// if ($conn->query($sql) === TRUE) {
		// echo "New record created successfully";
	// } else {
		// echo "Error: " . $sql . "<br>" . $conn->error;
	// }

	$stmt->execute();

	$stmt->close();
	mysqli_close($conn);
	
	header("location: index.html");
	
?>  
</body>
</html> 
