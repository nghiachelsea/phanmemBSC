<!DOCTYPE html>

<!-- // To Vu Ca - B1606870 -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Change password</title>
    <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>
<body>
<center>
        <div class="easyui-window" data-options="top:80, width:550, height:300,cls:'c6', title:'Update Password',iconCls:'icon-logck', maximizable:false, minimizable:false, resizable:false, draggable:false,closable:false,collapsible:false">
            
        
        <div class="easyui-layout" data-options="fit:true" >
            
            <div data-options= "region:'center', split: false" style="padding: 20px">
                <form name = "updatePassform" method="post">
                    <input type="text" class="easyui-textbox" data-options="label:'Mã người dùng',labelPosition:'top' ,prompt:'User ID', height:60, iconCls:'icon-man'" style="width: 100%" id="userid" name="userid">
                    <br></br>
                    <input type="text" class="easyui-passwordbox" data-options="checkInterval:'0',lastDelay:0,label:'Mật khẩu mới',labelPosition:'top' ,prompt:'Password', height:60, iconCls:'icon-lock'" style="width: 100%"
                    id="password" name="password">
                    <br></br>
                    <button class="easyui-linkbutton" data-options= "iconCls:'icon-lock', width:'100%', height:30" id="update" name = "update">Cập nhật</button>
                </form>
            </div>
           
        </div>
        </div>
    </center>

    
</body>
</html>

<?php
    include("../config/config.php");
    if (isset($_POST['update'])) {
        if (!empty($_POST['userid']) && !empty($_POST['password'])){
            $userid = $_POST['userid'];
            $password = $_POST['password'];
            echo $username." | ". $password;
            $con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
            mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
            $sql = "call updateND('$userid','$password')";
            $result = mysqli_query($con,$sql);
            $num = mysqli_num_rows($result);
            if ($result === TRUE) {
                header('location:../phieudanhgia/notice.php');
            } else {
              header('location:changepassUser.php');
            }
        }
        else{
            return false;
        }
        # code...
    }else{
        return false;
    }

?>
﻿