<html>
  <head>
    <title>update</title>
    <meta http-equiv="Refresh" content="2.5;
    url=UserDetails.php"/>
</head>
<body>
<center>
<?php 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobileno = $_POST['mobileno'];
	$deposit = $_POST['deposit'];
	$date = $_POST['date'];
    $gender=$_POST['gender'];
    

    
	// Database connection
	$conn = new mysqli('localhost','root','','kal');
	if($conn->connect_error){
		echo $conn->connect_error;
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into kalyani(id,name, email, mobileno, deposit, date, gender) values(?, ?, ?, ?, ?, ?, ?)");

		$stmt->bind_param('issiiss', $id, $name, $email, $mobileno, $deposit, $date, $gender);

		$execval = $stmt->execute();

		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
?>
</center>
</body>
</html>
