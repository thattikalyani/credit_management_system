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
<th>Id</th>
<th>Sender</th>
<th>Receiver</th>
<th>Credit</th>


</tr>
<?php
$conn = new mysqli('localhost','root','','kal');
	if($conn->connect_error){
		
		die("Connection Failed : ". $conn->connect_error);
	}
	$sql="SELECT id,sender,receiver,credit from transfer";
	$result=$conn->query($sql);

	if($result->num_rows >0){
		while ($row=$result->fetch_assoc()){
			echo "<tr><td>$row[id]</td><td>$row[sender]</td><td>$row[receiver]</td><td>$row[credit]</td></tr>";
		}
		echo "</table>";
	}
	else{
		echo "0 result";
	    }
	$conn->close();

?> 

</table>
</body>
</html>
