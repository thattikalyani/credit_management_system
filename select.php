<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
  <style>
        
        ul {
    list-style-type: none;
    margin:0%;
    padding:0;
    overflow:hidden;
    background-color: cornflowerblue;
    text-align: center;
    
}
li{
    float:left;
    font-size:20px;
}
li a{
    font-family: lato;
    float: left
    display: block;
    color:white;
    text-align: center;
    padding: 10px;
    width:30%;
    text-decoration: none;  
}
li a:hover{
    background-color:palegreen;
    color: blue;
  }

body{
  background-image: url('https://upload.wikimedia.org/wikipedia/commons/4/4f/Credit-cards.jpg');
  background-size: cover;
  background-repeat: no-repeat;

}

      
    </style>

<body>
    <ul>
      <li><a href="home.html">Home</a></li>
      <li><a href="insertvalue.html">Enter Details</a></li>
      <li><a href="UserDetails.php">View Users</a></li>
     <li><a href="moneytransfer.html">Transactions</a></li>
      <li><a href="transferhistory.php">Transaction History</a></li>
     
      </ul>
<br>
<br>
</head>

<center>
  <legend>USER DETAILS</legend>
    <form action="insert.php" method="post">


<table border="2">
  <tr>
    <td>Id</td>
    <td>Name</td>
    <td>Emil</td>
    <td>Deposit</td>
  </tr>

<?php

$db = mysqli_connect("localhost","root","","kal");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}


$id=$_GET['id'];
$records = mysqli_query($db,"select * from kalyani where id = $id"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['deposit']; ?></td>
  </tr>	
<?php
}
?>
</table>


<?php mysqli_close($db); // Close connection ?><br>


</body>
</html>