<?php 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");

$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['maTram']) && !empty($_REQUEST['maDonvi']) && !empty( $_REQUEST['maQuanli']) && !empty($_REQUEST['maGiamsat'])  && !empty( $_REQUEST['tenTram'])  && !empty( $_REQUEST['diachiTram']) && !empty( $_REQUEST['trangthaiTram']) && !empty( $_REQUEST['toadoX']) && !empty( $_REQUEST['toadoY'])  ){ 
    $maTram = $_REQUEST['maTram']; 
    $maDonvi = $_REQUEST['maDonvi']; 
    $maQuanli = $_REQUEST['maQuanli']; 
    $maGiamsat = $_REQUEST['maGiamsat'];
    $tenTram = $_REQUEST['tenTram'];
    $diachiTram = $_REQUEST['diachiTram'];
    $trangthaiTram = $_REQUEST['trangthaiTram'];
    $toadoX = $_REQUEST['toadoX'];
    $toadoY = $_REQUEST['toadoY'];
     
     
    if(!empty($_REQUEST['maTram'])){ 
        $maTram = strval($_REQUEST['maTram']); 
          
         
        $sql = "UPDATE tram SET maDonvi='$maDonvi', maQuanli='$maQuanli', maGiamsat='$maGiamsat', tenTram='$tenTram', diachiTram='$diachiTram', trangthaiTram='$trangthaiTram', toadoX='$toadoX', toadoY='$toadoY' WHERE maTram = '$maTram'"; 
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