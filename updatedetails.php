<html>
  <head>
    <title>update</title>
    <meta http-equiv="Refresh" content="2.5;
    url=UserDetails.php"/>
</head>
<body>
<center>
<?php 
	
	$sender = $_POST['sender'];
	$receiver = $_POST['receiver'];
	$credit = $_POST['credit'];

	// Database connection
	$conn = new mysqli('sql107.epizy.com','epiz_26762365','pe7kALvNNJAfISh','epiz_26762365_kal');
	if($conn->connect_error){
		echo $conn->connect_error;
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into transfer( sender, receiver, credit) values( ?, ?, ?)");

		$stmt->bind_param('ssi', $sender, $receiver, $credit);

		$execval = $stmt->execute();

		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
?>

<?php
$conn = new mysqli('sql107.epizy.com','epiz_26762365','pe7kALvNNJAfISh','epiz_26762365_kal');
if($conn-> connect_error){
die("connection failed : ". $conn->connect_error);
}
$credit=$_POST['credit'];
$sender=$_POST['sender'];
$receiver=$_POST['receiver'];
$record="SELECT deposit from kalyani WHERE name='$sender'";
$result=mysqli_query($conn,$record);
$row=mysqli_fetch_assoc($result);
$num=(int)implode('',$row);
if($credit>$num){
echo "INSUFFICIENT CREDIT BALANCE!!!!";
}
elseif($sender==$receiver)
{
echo "YOU HAVE ENTERED SAME SENDER AND RECEIVER.....TRY AGAIN!!";

}
elseif($credit==0){
echo "CREDITS ENTERED AS ZERO...TRY AGAIN!";
}
else{

$sl="INSERT INTO transfer(sender,receiver,credit) VALUES('$_POST[sender]','$_POST[receiver]','$_POST[credit]')";
mysqli_query($conn,"UPDATE kalyani SET deposit = deposit - '$credit' WHERE name='$sender'");
mysqli_query($conn,"UPDATE kalyani SET deposit = deposit + '$credit' WHERE name='$receiver'");
echo "INSERTED";
}
?>


</center>
</body>
</html>






