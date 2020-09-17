<html>
<head>
<title>table</title>
	<style type="text/css">
		table {
			border-collapse: collapse;
			border: 2px;
			width: 100%;
			color:#588c7e;
			font-family: monospace;
			font-size: 25px;
			text-align: center;
		      }
		td, th {
  border: 1px ;
  
  padding: 8px;
                }
tr:nth-child(even) {
  background-color: #dddddd;
                  }



                
    </style>
</head>
<body>
<table>
<tr>
<th>id</th>
<th>Name</th>
<th>Email</th>
<th>Deposit</th>


</tr>
<?php
$conn = new mysqli('localhost','root','','kal');
	if($conn->connect_error){
		
		die("Connection Failed : ". $conn->connect_error);
	}
	$sql="SELECT id,name,email,deposit from kalyani order by id";
	$result=$conn->query($sql);

	if($result->num_rows >0){
		while ($row=$result->fetch_assoc()){
			echo "<tr><td>$row[id]</td><td><a href=select.php?id=$row[id]>$row[name]</a></td><td>$row[email]</td><td>$row[deposit] </td></tr>";
		}
		echo "</table>";
	}
	else{
		echo "0 result";
	    }
	$conn->close();

?> 


<h1>To view one user details CLICK on NAMES</h1>



</center>
</select>
</table>
</body>
</html>
