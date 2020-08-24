
<?php
    // To Vu Ca - B1606870 
// Include the database config file 
include("../config/config.php");
    $con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
    mysqli_select_db($con,_DB_NAME) or die("Could not select database.");

   
    if(isset($_POST['upload'])) {
         if(isset($_REQUEST['maTieuchi'])){ 
        $maTieuchi = strval($_REQUEST['maTieuchi']); 
        $target = "images/".basename($_FILES['image']['name']);
                 
        
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];
        $sql = "INSERT INTO hinhanh (maPhieu, maTieuchi, image, text) VALUES ('$_SESSION[maPhieu]','$maTieuchi','$image', '$text')";
        mysqli_query($con, $sql);
       echo  '<script> alert ("Đã thêm ghi chú!"); </script>' ;
           echo '<script>location.href = "chitietPDG.php";</script>';
  
    }
}
?>