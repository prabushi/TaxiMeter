<?php
    //getAddress.php?Longitude=12.43&Latitude=23.34
    error_reporting(E_ALL ^ E_NOTICE);
    $Longitude = $_GET['Longitude'];
    $Latitude = $_GET['Latitude'];
    $address= getaddress($Latitude,$Longitude);
    if($address){
    }
    else{
	$address = "Not found";
    }
    echo "!".$address;
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