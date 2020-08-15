<?php 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");

$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['maPhieu']) && !empty($_REQUEST['maKyphieu']) && !empty( $_REQUEST['maDonvi']) && !empty($_REQUEST['Don_maDonvi'])  && !empty( $_REQUEST['maND'])  && !empty( $_REQUEST['Ngu_maND']) && !empty( $_REQUEST['maTram']) && !empty( $_REQUEST['tenPhieu']) && !empty( $_REQUEST['nguoiDanhgia1']) && !empty( $_REQUEST['nguoiDanhgia2']) && !empty( $_REQUEST['nguoiDanhgia3']) && !empty( $_REQUEST['trangthai'])  ){ 
    $maPhieu = $_REQUEST['maPhieu']; 
    $maKyphieu = $_REQUEST['maKyphieu']; 
    $maDonvi = $_REQUEST['maDonvi']; 
    $Don_maDonvi = $_REQUEST['Don_maDonvi'];
    $maND = $_REQUEST['maND'];
    $Ngu_maND = $_REQUEST['Ngu_maND'];
    $maTram = $_REQUEST['maTram'];
    $tenPhieu = $_REQUEST['tenPhieu'];
    $nguoiDanhgia1 = $_REQUEST['nguoiDanhgia1'];
	$nguoiDanhgia2 = $_REQUEST['nguoiDanhgia2'];
	$nguoiDanhgia3 = $_REQUEST['nguoiDanhgia3'];
	$trangthai = $_REQUEST['trangthai'];
     
     
    if(!empty($_REQUEST['maPhieu'])){ 
        $maPhieu = strval($_REQUEST['maPhieu']); 
          
         
        $sql = "call editPhieu('$maPhieu','$maKyphieu','$maDonvi','$Don_maDonvi', '$maND', '$Ngu_maND', '$maTram', '$tenPhieu','$nguoiDanhgia1', '$nguoiDanhgia2', '$nguoiDanhgia3', '$trangthai')"; 
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
