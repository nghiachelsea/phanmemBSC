<?php
// To Vu Ca - B1606870 
// Include the database config file 
session_start();
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
$maND = strval($_SESSION['maND']);
$sql = "SELECT tenND FROM nguoidung where maND = '$maND'";
$result = mysqli_query($con,$sql);
 
$nguoidung = array(); 
while($row = mysqli_fetch_assoc($result)){ 
    echo $row['tenND'];
} 
$response["rows"] = $nguoidung; 
// echo json_encode($response);
?>