<?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
// get data and store in a json array

session_start();
$maND = strval($_SESSION['maND']);
$sql = "SELECT maDonvi FROM nguoidung where maND = '$maND'";
$getDv = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($getDv)){ 
	$a = $row['maDonvi'];
    $query = "SELECT maTram, tenTram FROM tram where maDonvi = '$a'";
	$from = 0;
	$to = 60;
	$query .= " LIMIT ".$from.",".$to;

	$result = mysqli_query($con,$query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $tram[] = array(
        'maTram' => $row['maTram'],

        'tenTram' => $row['tenTram'],
      );
}

}




echo json_encode($tram);
?>