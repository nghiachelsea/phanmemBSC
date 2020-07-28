<?php
// Nguyen Trong Nghia
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
			
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
 
$searchTerm = isset($_POST['term']) ? $con->real_escape_string($_POST['term']) : ''; 
 
$offset = ($page-1)*$rows; 
 
$result = array(); 
 
$whereSQL = "maDonvi LIKE '$searchTerm%' OR tenDonvi LIKE '$searchTerm%' OR tenViettat LIKE '$searchTerm%' OR loaiDonvi LIKE '$searchTerm%' OR trangthaiDonvi LIKE '$searchTerm%'"; 
$sql = "SELECT COUNT(*) FROM donvi WHERE $whereSQL";
$result =  mysqli_query($con,$sql);
$row = mysqli_fetch_row($result);
$response["total"] = $row[0]; 
$sql1 = "SELECT * FROM donvi WHERE $whereSQL ORDER BY maDonvi DESC LIMIT $offset,$rows";
$result = mysqli_query($con,$sql1);
 
$donvi = array(); 
while($row = mysqli_fetch_assoc($result)){ 
    array_push($donvi, $row); 
} 
$response["rows"] = $donvi; 
 
echo json_encode($response);