<?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
			
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
 
$searchTerm = isset($_POST['termKP']) ? $con->real_escape_string($_POST['termKP']) : ''; 
 
$offset = ($page-1)*$rows; 
 
$result = array(); 
 
$whereSQL = "maKyphieu LIKE '$searchTerm%' OR maND LIKE '$searchTerm%' OR tenKyphieu LIKE '$searchTerm%' OR ngayBatdau LIKE '$searchTerm%' OR ngayKetthuc LIKE '$searchTerm%' OR thang LIKE '$searchTerm%'  OR ghichu LIKE '$searchTerm%'"; 
$sql = "SELECT COUNT(*) FROM kyphieu WHERE $whereSQL";
$result =  mysqli_query($con,$sql); 
$row = mysqli_fetch_row($result);
$response["total"] = $row[0]; 
$sql1 = "SELECT * FROM kyphieu WHERE $whereSQL ORDER BY maKyphieu DESC LIMIT $offset,$rows";
$result = mysqli_query($con,$sql1);
 
$kyphieu = array(); 
while($row = mysqli_fetch_assoc($result)){ 
    array_push($kyphieu, $row); 
} 
$response["rows"] = $kyphieu; 
 
echo json_encode($response);	
?>