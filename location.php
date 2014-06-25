<?php
    //location.php?Vehicle=AAA3300&Date=01&Month=06&Year=2014&Time=123000&Longitude=12.43&Latitude=23.34
    error_reporting(E_ALL ^ E_NOTICE);
	
    $vehicle = $_GET['Vehicle'];
    $Day = $_GET['Date'];
    $Month = $_GET['Month'];
    $Year = $_GET['Year'];
    $Time = $_GET['Time'];
    $Longitude = $_GET['Longitude'];
    $Latitude = $_GET['Latitude'];
   	
    $user_name = "a5394948_malaka";
    $password = "photon@11";
    $database = "a5394948_taxi";
    $server = "mysql10.000webhost.com";

    $db_handle = mysql_connect($server, $user_name, $password);

    $db_found = mysql_select_db($database, $db_handle);

    if ($db_found) {
	$SQL = "INSERT INTO location (Id, VehicleNumber,Date, Time, Latitude, Longitude) 
             VALUES (null, '$vehicle','$Year-$Month-$Day', '$Time', '$Latitude', '$Longitude')";
        $result = mysql_query($SQL);
        echo "Records added to the database";
	if( gettype($db_handle) == "resource") {
            mysql_close($db_handle);
        }
    }
    else {
	print "Database NOT Found ";
    }
?>