<?php 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");

$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['maND']) && !empty($_REQUEST['maDonvi']) && !empty( $_REQUEST['tenND']) && !empty($_REQUEST['taiKhoan'])  && !empty( $_REQUEST['matKhau'])  && !empty( $_REQUEST['loaiND'])){ 
    $maND = $_REQUEST['maND']; 
    $maDonvi = $_REQUEST['maDonvi']; 
    $tenND = $_REQUEST['tenND']; 
    $taiKhoan = $_REQUEST['taiKhoan'];
    $matKhau = $_REQUEST['matKhau'];
    $loaiND = $_REQUEST['loaiND'];
    
     
    if(!empty($_REQUEST['maND'])){ 
        $maND = strval($_REQUEST['maND']); 
          
         
        $sql = "UPDATE nguoidung SET maDonvi='$maDonvi', tenND='$tenND', taiKhoan='$taiKhoan', matKhau='$matKhau', loaiND='$loaiND' WHERE maND = '$maND'"; 
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