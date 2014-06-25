<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width">
        <title align = CENTER>
            Vehicle Tracker        
		</title>
	</head>
	

<br> <br>
<form action="ownerDashboard.php" method="post">
            <p align = left><input type="submit" value=" Go back to Owner Dash-board "></p>
        </form>
<br><br>

<?php

session_start();
$userdata = $_SESSION['userData'];
   
    $today = getdate();
    $date = $today['year']."-".$today['mon']."-".$today['mday'];
    
    $user = $userdata[0];
    $pass = $userdata[1];

//echo "User".$user;
//echo "Password".$pass;

//$user = "Malaka";
//$pass="Lahiru";

    $user_name = "a5394948_malaka";
    $password = "photon@11";
    $database = "a5394948_taxi";
    $server = "mysql10.000webhost.com";

    $con=mysqli_connect($server,$user_name,$password,$database);
                        // Check connection
                        if (mysqli_connect_errno()) {
                             echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

  
        $result1 = mysqli_query($con,"SELECT VehicleNumber FROM owners WHERE owners.username = '$user' and owners.password = '$pass'");
        
        while($row1 = mysqli_fetch_array($result1)) {
            $ownerVN=$row1['VehicleNumber'];
            break; 
                        }

        $result = mysqli_query($con, "SELECT * FROM hires WHERE hires.VehicleNumber = '$ownerVN' and hires.Date='$date'");
        
        echo "<br />\n";echo "<br />\n";
        echo "Owner          : ".$user;
        echo "<br />\n";
        echo "Date           : ".$date;
        echo "<br />\n";
        echo "Vehicle Number : ".$ownerVN;
        echo "<br />\n";echo "<br />\n";echo "<br />\n";
        
        echo "<table border='1'>
            <tr>
           
            <th>Fare </th>
            <th>Start Point</th>
            <th>End Point</th>
            </tr>";
        
$total =0;  
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  $total+=$row['Fee'];
  echo "<td>" . $row['Fee'] . "</td>";
  echo "<td>" . $row['StartPoint'] . "</td>";
  echo "<td>".$row['EndPoint']. "</td>";
  echo "</tr>";
}

echo "</table>";
echo "<br />\n";echo "<br />\n";echo "<br />\n";
echo "Total revenue for today : Rs. ".$total.".00";

mysqli_close($con);


?>	
</html>