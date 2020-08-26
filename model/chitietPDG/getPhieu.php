  
<?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			session_start();

// get data and store in a json array
			
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
 
$searchTerm = isset($_POST['termCTPDG']) ? $con->real_escape_string($_POST['termCTPDG']) : ''; 
 
$offset = ($page-1)*$rows; 
 
$result = array(); 


 
$whereSQL = "maPhieu LIKE '$searchTerm%' OR tenPhieu LIKE '$searchTerm%' OR maTram LIKE '$searchTerm%'"; 
$sql = "SELECT COUNT(*) FROM phieudanhgia WHERE $whereSQL";
$result =  mysqli_query($con,$sql); 
$row = mysqli_fetch_row($result);
$response["total"] = $row[0]; 
$maND = strval ($_SESSION[ 'maND' ]);
$sql1 = "SELECT maPhieu, tenPhieu, maTram FROM phieudanhgia WHERE  maQuanli = '$maND' ORDER BY maPhieu DESC LIMIT $offset,$rows";
$result1 = mysqli_query($con,$sql1);
 
$phieu = array(); 
while($row = mysqli_fetch_assoc($result1)){ 

	$_SESSION['maPhieu'] = $row['maPhieu'];
	$_SESSION['maTram'] = $row['maTram'];
	
     array_push($phieu, $row);

} 
$response["rows"] = $phieu; 
 
echo json_encode($response);	
?>