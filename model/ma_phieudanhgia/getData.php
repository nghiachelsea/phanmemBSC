<?php
// Huynh Minh Thu - B1505804
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
			
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
 
$searchTerm = isset($_POST['term']) ? $con->real_escape_string($_POST['term']) : ''; 
 
$offset = ($page-1)*$rows; 
 
$result = array(); 
 
$whereSQL = "maPhieu LIKE '$searchTerm%' OR maKyphieu '$searchTerm%' OR maDonvi LIKE '$searchTerm%' OR Don_maDonvi LIKE '$searchTerm%' OR maND LIKE '$searchTerm%' OR Ngu_maND LIKE '$searchTerm%' OR maTram LIKE '$searchTerm%' OR tenPhieu LIKE '$searchTerm%' OR nguoiDanhgia1 LIKE '$searchTerm%' OR nguoiDanhgia2 LIKE '$searchTerm%' OR nguoiDanhgia3 LIKE '$searchTerm%' OR trangthai LIKE '$searchTerm%'"; 
$sql = "SELECT COUNT(*) FROM phieudanhgia WHERE $whereSQL";
$result =  mysqli_query($con,$sql); 
$row = mysqli_fetch_row($result);
$response["total"] = $row[0]; 
$sql1 = "SELECT * FROM phieudanhgia WHERE $whereSQL ORDER BY maPhieu DESC LIMIT $offset,$rows";
$result = mysqli_query($con,$sql1);
 
$phieudanhgia = array(); 
while($row = mysqli_fetch_assoc($result)){ 
    array_push($phieudanhgia, $row); 
} 
$response["rows"] = $phieudanhgia; 
 
echo json_encode($response);	
?>