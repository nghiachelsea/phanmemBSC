 <?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
			
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
 
$searchTerm = isset($_POST['termP']) ? $con->real_escape_string($_POST['termP']) : ''; 
 
$offset = ($page-1)*$rows; 
 
$result = array(); 
 
$whereSQL = "maKyphieu LIKE '$searchTerm%' OR maPhieu LIKE '$searchTerm%' OR tenPhieu LIKE '$searchTerm%' OR maTram LIKE '$searchTerm%' OR maQuanli LIKE '$searchTerm%' OR maGiamsat LIKE '$searchTerm%'  OR maTTVT LIKE '$searchTerm%'  OR maTTDHTT LIKE '$searchTerm%' "; 
$sql = "SELECT COUNT(*) FROM phieudanhgia WHERE $whereSQL";
$result =  mysqli_query($con,$sql); 
$row = mysqli_fetch_row($result);
$response["total"] = $row[0]; 
$sql1 = "SELECT * FROM phieudanhgia WHERE $whereSQL ORDER BY maPhieu DESC LIMIT $offset,$rows";
$result1 = mysqli_query($con,$sql1);
 
$phieudanhgia = array(); 
while($row = mysqli_fetch_assoc($result1)){ 
    array_push($phieudanhgia, $row); 
} 
$response["rows"] = $phieudanhgia; 
 
echo json_encode($response);	
?>