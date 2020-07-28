<?php 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['maDonvi']) && !empty($_REQUEST['tenDonvi']) && !empty( $_REQUEST['tenViettat']) && !empty($_REQUEST['loaiDonvi'])  && !empty( $_REQUEST['trangthaiDonvi'])){ 
    $maDonvi = $_REQUEST['maDonvi']; 
    $tenDonvi = $_REQUEST['tenDonvi']; 
    $tenViettat = $_REQUEST['tenViettat']; 
    $loaiDonvi = $_REQUEST['loaiDonvi'];
    $trangthaiDonvi = $_REQUEST['trangthaiDonvi'];
     
    $sql = "CALL addDonvi('$maDonvi','$tenDonvi','$tenViettat','$loaiDonvi', '$trangthaiDonvi')";
    $insert = mysqli_query($con,$sql);
    
     
    if($insert){ 
        $response['status'] = 1; 
        $response['msg'] = 'Data has been added successfully!'; 
    } 
}else{ 
    $response['msg'] = 'Please fill all the mandatory fields.'; 
} 
 
echo json_encode($response);