<?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			

$sql = "SELECT * FROM tieuchi";
$result = mysqli_query($con,$sql);
 
$tieuchi = array(); 
while($row = mysqli_fetch_assoc($result)){ 
    array_push($tieuchi, $row); 
} 
$response["rows"] = $tieuchi; 
echo json_encode($response);
?>