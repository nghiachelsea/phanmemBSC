<?php 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");

$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['maTieuchi']) && !empty($_REQUEST['maTN_TTVT']) && !empty( $_REQUEST['maTN_TTDHTT']) && !empty($_REQUEST['tenTieuchi'])  && !empty( $_REQUEST['chitietTieuchi'])  && !empty( $_REQUEST['mucdiemtrucnTTVT']) && !empty( $_REQUEST['mucdiemtruttTTVT']) && !empty( $_REQUEST['mucdiemtrucnTTDHTT']) && !empty( $_REQUEST['mucdiemtruttTTDHTT'])  ){ 
    $maTieuchi = $_REQUEST['maTieuchi']; 
    $maTN_TTVT = $_REQUEST['maTN_TTVT']; 
    $maTN_TTDHTT = $_REQUEST['maTN_TTDHTT']; 
    $tenTieuchi = $_REQUEST['tenTieuchi'];
    $chitietTieuchi = $_REQUEST['chitietTieuchi'];
    $mucdiemtrucnTTVT = $_REQUEST['mucdiemtrucnTTVT'];
    $mucdiemtruttTTVT = $_REQUEST['mucdiemtruttTTVT'];
    $mucdiemtrucnTTDHTT = $_REQUEST['mucdiemtrucnTTDHTT'];
    $mucdiemtruttTTDHTT = $_REQUEST['mucdiemtruttTTDHTT'];
     
     
    if(!empty($_REQUEST['maTieuchi'])){ 
        $maTieuchi = strval($_REQUEST['maTieuchi']); 
          
         
        $sql = "call updateTieuchi('$maTieuchi','$maTN_TTVT','$maTN_TTDHTT','$tenTieuchi', '$chitietTieuchi', '$mucdiemtrucnTTVT', '$mucdiemtruttTTVT', '$mucdiemtrucnTTDHTT','$mucdiemtruttTTDHTT')"; 
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
