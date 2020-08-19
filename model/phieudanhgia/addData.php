<?php 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['maKyphieu']) && !empty($_REQUEST['maPhieu']) && !empty( $_REQUEST['tenPhieu']) && !empty($_REQUEST['maTram'])  && !empty( $_REQUEST['maQuanli'])  && !empty( $_REQUEST['maGiamsat']) && !empty( $_REQUEST['maTTVT']) && !empty( $_REQUEST['maTTDHTT'])  ){ 
    $maKyphieu = $_REQUEST['maKyphieu']; 
    $maPhieu = $_REQUEST['maPhieu']; 
    $tenPhieu = $_REQUEST['tenPhieu']; 
    $maTram = $_REQUEST['maTram'];
    $maQuanli = $_REQUEST['maQuanli'];
    $maGiamsat = $_REQUEST['maGiamsat'];
    $maTTVT = $_REQUEST['maTTVT'];
    $maTTDHTT = $_REQUEST['maTTDHTT'];
    
     
   
    $sql = "CALL addPDG('$maKyphieu','$maPhieu','$tenPhieu','$maTram', '$maQuanli', '$maGiamsat', '$maTTVT', '$maTTDHTT')";
    $insert = mysqli_query($con,$sql);
    
     
    if($insert){ 
        $response['status'] = 1; 
        $response['msg'] = 'Data has been added successfully!'; 
    } 
}else{ 
    $response['msg'] = 'Please fill all the mandatory fields.'; 
} 
 
echo json_encode($response);