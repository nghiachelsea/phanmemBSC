<?php
// To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			
// get data and store in a json array
if(isset($_REQUEST['maQuanli'])){ 
        $maQuanli = strval($_REQUEST['maQuanli']); 

    $query = "call adminGetMaGs('$maQuanli')";

	$result = mysqli_query($con,$query);
	// while ($row = mysqli_fetch_assoc($result)) {
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $tram[] = array(
        'maGiamsat' => $row['maGiamsat'],
        'tenGiamsat' => $row['maGiamsat']
      );
        // 
}
//     $queryTTVT = "call adminGetMaTTVT('$maQuanli')";

//     $resultTTVT = mysqli_query($con,$queryTTVT);

//     while ($row = mysqli_fetch_array($resultTTVT, MYSQLI_ASSOC)) {
//     $ttvt[] = array(
//         'maDonvi' => $row['maDonvi'],
//         'tenDonvi' => $row['maDonvi']
//       );
        
// }



echo json_encode($tram);
// echo json_encode($ttvt);
}
?>