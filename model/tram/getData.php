<?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
			
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
 
$searchTerm = isset($_POST['term']) ? $con->real_escape_string($_POST['term']) : ''; 
 
$offset = ($page-1)*$rows; 
 
$result = array(); 
 
$whereSQL = "maTram LIKE '$searchTerm%' OR maDonvi LIKE '$searchTerm%' OR maQuanli LIKE '$searchTerm%' OR maGiamsat LIKE '$searchTerm%' OR tenTram LIKE '$searchTerm%' OR diachiTram LIKE '$searchTerm%'  OR trangthaiTram LIKE '$searchTerm%'  OR toadoX LIKE '$searchTerm%'  OR toadoY LIKE '$searchTerm%'"; 
$sql = "SELECT COUNT(*) FROM tram WHERE $whereSQL";
$result =  mysqli_query($con,$sql); 
$row = mysqli_fetch_row($result);
$response["total"] = $row[0]; 
$sql1 = "SELECT * FROM tram WHERE $whereSQL ORDER BY maTram DESC LIMIT $offset,$rows";
$result = mysqli_query($con,$sql1);
 
$tram = array(); 
while($row = mysqli_fetch_assoc($result)){ 
    array_push($tram, $row); 
} 
$response["rows"] = $tram; 
 
echo json_encode($response);