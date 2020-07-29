<?php
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");

$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['maND'])){ 
    $maND = strval($_REQUEST['maND']);  
     
    $sql = "call deleteTieuchi('$maTieuchi')";
    $delete = mysqli_query($con,$sql); 
     
    if($delete){ 
        $response['status'] = 1; 
        $response['msg'] = 'Data has been deleted successfully!'; 
    } 
} 
 
echo json_encode($response);