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
     
     
    if(!empty($_REQUEST['maDonvi'])){ 
      $maDonvi = strval($_REQUEST['maDonvi']); 
          
         
        $sql = "UPDATE donvi SET  tenDonvi='$tenDonvi', tenViettat='$tenViettat', loaiDonvi='$loaiDonvi', trangthaiDonvi='$trangthaiDonvi' WHERE maDonvi = '$maDonvi'"; 
        $update = mysqli_query($con, $sql); 

        if($update){ 
            $response['status'] = 1; 
            $response['msg'] = 'Data has been updated successfully!'; 
        } 
    } 
}else{ 
    $response['msg'] = 'Please fill all the mandatory fields.'; 
} 
 
echo json_encode($response);