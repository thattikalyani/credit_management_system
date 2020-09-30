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
	$server = "sql107.epizy.com";
$username = "epiz_26762365";
$password = "pe7kALvNNJAfISh";
$dbname = "epiz_26762365_kal";


$conn = mysqli_connect("$server","$username","$password","$dbname");

	if($conn->connect_error){
		echo $conn->connect_error;
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into kalyani(name, email, mobileno, deposit, date, gender) values( ?, ?, ?, ?, ?, ?)");

		$stmt->bind_param('ssiiss', $name, $email, $mobileno, $deposit, $date, $gender);

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
