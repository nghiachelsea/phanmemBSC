<?php 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");

$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['maKyphieu']) && !empty($_REQUEST['maND']) && !empty( $_REQUEST['tenKyphieu']) && !empty($_REQUEST['ngayBatdau'])  && !empty( $_REQUEST['ngayKetthuc'])  && !empty( $_REQUEST['thang']) && !empty( $_REQUEST['ghichu'])  ){ 
    $maKyphieu = $_REQUEST['maKyphieu']; 
    $maND = $_REQUEST['maND']; 
    $tenKyphieu = $_REQUEST['tenKyphieu']; 
    $ngayBatdau = $_REQUEST['ngayBatdau'];
    $ngayKetthuc = $_REQUEST['ngayKetthuc'];
    $thang = $_REQUEST['thang'];
    $ghichu = $_REQUEST['ghichu'];
     
     
    if(!empty($_REQUEST['maKyphieu'])){ 
        $maKyphieu = strval($_REQUEST['maKyphieu']); 
          
         
        $sql = "call editKyphieu('$maKyphieu','$maND','$tenKyphieu','$ngayBatdau', '$ngayKetthuc', '$thang', '$ghichu')";
 
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
