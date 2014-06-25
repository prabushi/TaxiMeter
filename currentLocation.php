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
            <p align = center><input type="submit" value=" Go back to Owner Dash-board "></p>
        </form>
<br><br>
<?php
	session_start();
	$userdata = $_SESSION['userData'];
    $user = $userdata[0];
    $pass = $userdata[1];

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
	echo "<br><h3 align = center >Location Details of Vehicle Number : ".$ownerVN."</h3><br>";
	$result = mysqli_query($con,"SELECT * FROM location WHERE location.VehicleNumber = '$ownerVN'");
	
        $rows = mysqli_num_rows($result);

        echo "<table border='1' align = center ><tr><th>Time </th><th>Location</th></tr>";
	while($row = mysqli_fetch_array($result)) {
	    if($rows > 0 && $rows < 20){
          	echo "<tr>";
		echo "<td>" . $row['Time'] . "</td>";
		$lat= $row['Latitude'];
		$lng= $row['Longitude'];
		$address= getaddress($lat,$lng);
		if($address){
		}
		else{
			$address = "Not found";
		}
		echo "<td> ".$address." </td>";
		echo "</tr>";
             }
             $rows--;
	}

	echo "</table>";
	echo "<br />\n";echo "<br />\n";echo "<br />\n";

	mysqli_close($con);

	function getaddress($lat,$lng){
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
		$json = @file_get_contents($url);
		$data=json_decode($json);
		$status = $data->status;
		if($status=="OK")
			return $data->results[0]->formatted_address;
		else
			return false;
	}
?>

        <h3 align = center>
			PHOTON Creations
		</h3>
	</body>
</html>