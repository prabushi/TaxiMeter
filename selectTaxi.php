<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width">
        <title>
            Vehicle Tracker        
		</title>
	</head>
	<h3 align = center> Nearest Taxies available for you</h3><br>
	<?php

date_default_timezone_set("Asia/Colombo");
		$today = getdate();
		$date = $today['year']."-".$today['mon']."-".$today['mday'];
echo "Today :".$date."<br>";
		$time = $today['hours'].":".$today['minutes'].":".$today['seconds'];
echo "Time  :".$time."<br>";		
		$customer=$_POST["name"];
		$mobileNumber = $_POST["mobile"];
		$address=$_POST["start"];

		$temp = getcord($address);
		$locationX= $temp[0];;
		$locatioY= $temp[1];

		$user_name = "a5394948_malaka";
		$password = "photon@11";
		$database = "a5394948_taxi";
		$server = "mysql10.000webhost.com";

		$con=mysqli_connect($server,$user_name,$password,$database);
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result1 = mysqli_query($con,"SELECT * FROM location natural join owners WHERE location.Date='$date' and ('$time'-location.Time)<2" );
		
		$taxies = array();
		while($row1 = mysqli_fetch_array($result1)) {
                 
			$x = pow($locationX-$row1['Latitude'],2);
			$y = pow($locatioY-$row1['Longitude'],2);
			$z = sqrt($x+$y);
			$mobile = $row1['MobileNo'];
//echo $row1['Time']-$time;
//echo "<br />\n";
//echo $row1['Time'];
//echo "<br />\n";
//echo $time;
			$locationTime = $row1['Time'];
               
			$taxies[] = array($row1['Latitude'],$row1['Longitude'],$z,$mobile,$locationTime);
                   
		}
//print_r($taxies);
			mysqli_close($con);

		array_sort_by_column($taxies, 2);
		
		echo "<table border='1' align = center ><tr><th>Mobile Number </th><th>Location</th></tr>";
		
		foreach ($taxies as $key => $row) {
				echo "<tr>";
				echo "<td>" . $row[3] . "</td>";
				$lat= $row[0];
				$lng= $row[1];
				$address= getaddress($lat,$lng);
				if($address){
				}
				else{
					$address = "Not found";
				}
				echo "<td> ".$address." </td>";
				echo "</tr>";
		}
	 
		echo "</table>";
		
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

		function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
			$sort_col = array();
			foreach ($arr as $key=> $row) {
				$sort_col[$key] = $row[$col];
			}

			array_multisort($sort_col, $dir, $arr);
		}
		
		function getcord($add){
			$address = urlencode($add);
			$cord = array("","");
			$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false&region=Sri%20Lanka';;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$response_a = json_decode($response);
			$lat = $response_a->results[0]->geometry->location->lat;
			$cord[0] = $lat;
			$long = $response_a->results[0]->geometry->location->lng;
			$cord[1] = $long;
			return $cord;
		}
	?>
	<h3 align = center>
				PHOTON Creations
			</h3>
		
	</body>
</html>	