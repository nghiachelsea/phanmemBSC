 <?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
			
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
 
$searchTerm = isset($_POST['termTC']) ? $con->real_escape_string($_POST['termTC']) : ''; 
 
$offset = ($page-1)*$rows; 
 
$result = array(); 
 
$whereSQL = "maTieuchi LIKE '$searchTerm%' OR maTN_TTVT LIKE '$searchTerm%' OR maTN_TTDHTT LIKE '$searchTerm%' OR tenTieuchi LIKE '$searchTerm%' OR chitietTieuchi LIKE '$searchTerm%' OR mucdiemtrucnTTVT LIKE '$searchTerm%'  OR mucdiemtruttTTVT LIKE '$searchTerm%'  OR mucdiemtrucnTTDHTT LIKE '$searchTerm%'  OR mucdiemtruttTTDHTT LIKE '$searchTerm%'"; 
$sql = "SELECT COUNT(*) FROM tieuchi WHERE $whereSQL";
$result =  mysqli_query($con,$sql); 
$row = mysqli_fetch_row($result);
$response["total"] = $row[0]; 
$sql1 = "SELECT * FROM tieuchi WHERE $whereSQL ORDER BY maTieuchi DESC LIMIT $offset,$rows";
$result = mysqli_query($con,$sql1);
 
$tieuchi = array(); 
while($row = mysqli_fetch_assoc($result)){ 
    array_push($tieuchi, $row); 
} 
$response["rows"] = $tieuchi; 
 
echo json_encode($response);	
?>