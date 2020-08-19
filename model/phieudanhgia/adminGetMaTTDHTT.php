<?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
// get data and store in a json array
if(isset($_REQUEST['maGiamsat'])){ 
        $maGiamsat = strval($_REQUEST['maGiamsat']); 


    $query = "call adminGetMaTTDHTT('$maGiamsat')";

    $result = mysqli_query($con,$query);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $ttdhtt[] = array(
        'maTTDHTT' => $row['maDonvi'],
        'tenTTDHTT' => $row['maDonvi']
      );
        
}



echo json_encode($ttdhtt);
}
?>