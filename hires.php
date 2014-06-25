<?php
    //hires.php?Vehicle=AAA3300&Date=01&Month=06&Year=2014&Fee=100&Start=(12.43,13.54)&End=(23.34,12,54)
    error_reporting(E_ALL ^ E_NOTICE);
	
    $vehicle = $_GET['Vehicle'];
    $Day = $_GET['Date'];
    $Month = $_GET['Month'];
    $Year = $_GET['Year'];
    $Fee = $_GET['Fee'];
    $Start = $_GET['Start'];
    $End = $_GET['End'];
   	
    $user_name = "a5394948_malaka";
    $password = "photon@11";
    $database = "a5394948_taxi";
    $server = "mysql10.000webhost.com";

    $db_handle = mysql_connect($server, $user_name, $password);

    $db_found = mysql_select_db($database, $db_handle);

    if ($db_found) {
		$SQL = "INSERT INTO hires (Id, VehicleNumber,Date, Fee, StartPoint, EndPoint) 
            VALUES (null, '$vehicle','$Year-$Month-$Day', '$Fee', '$Start', '$End')";
        
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