<?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
// get data and store in a json array


    $query = "call adminGetMaKp()";

	$result = mysqli_query($con,$query);
	// while ($row = mysqli_fetch_assoc($result)) {
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $kp[] = array(
        'maKyphieu' => $row['maKyphieu'],
        'tenKyphieu' => $row['maKyphieu']
      );
}

echo json_encode($kp);
?>