<!DOCTYPE html>
<!-- // To Vu Ca - B1606870 -->
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
	<link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
	<script type="text/javascript" src="../../lib/jquery.min.js"></script>
	<script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>
</head>
<body>
	<?php $error_message = ""; ?>
	<center>
		<div class="easyui-window" data-options="top:80, width:550, height:300,cls:'c6', title:'Login Form',iconCls:'icon-logck', maximizable:false, minimizable:false, resizable:false, draggable:false,closable:false,collapsible:false">
			
		
		<div class="easyui-layout" data-options="fit:true" >
			
			<div data-options="region:'west', split:false" style = "
			height:100px;
			width:250px;
			inline;
			text-align:center; 
			vertical-align:middle;">
				<img src="../../lib/images/bg-01.jpg" width="100%" height="98%">
			</div>
			<div data-options= "region:'center', split: false" style="padding: 20px">
				<form name = "loginform" method="post">
					<input type="text" class="easyui-textbox" data-options="label:'Tài khoản',labelPosition:'top' ,prompt:'Username', height:60, iconCls:'icon-man'" style="width: 100%" id="username" name="username">
					<br></br>
					<input type="text" class="easyui-passwordbox" data-options="checkInterval:'0',lastDelay:0,label:'Mật khẩu',labelPosition:'top' ,prompt:'Password', height:60, iconCls:'icon-lock'" style="width: 100%"
					id="password" name="password">
					<br></br>
					<button class="easyui-linkbutton" data-options= "iconCls:'icon-lock', width:'100%', height:30" id="login" name = "login"> Đăng nhập</button>
				</form>

			</div>
				<div data-options= "region:'south', split: false, height: 40 " style="text-align:center;">
					<div style="text-align:center"> Copy right <?php echo date('Y'); 
					echo"<br />";
					echo $error_message; ?>
						
					</div>
				</div>
				
			
			</div>
		</div>
	</center>

</body>
</html>

<?php

	include("../config/config.php");
	if (isset($_POST['login'])) {
		if (!empty($_POST['username']) && !empty($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			echo $username." | ". $password;
			$con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
			mysqli_select_db($con,_DB_NAME) or die("Could not select database.");
			$sql = "select * from nguoidung where taiKhoan = '$username' && matKhau = '$password' ";
			$result = mysqli_query($con,$sql);
			$num = mysqli_num_rows($result);
			 if ($num > 0){


			 	
			 	$sql1 = "select * from nguoidung where matKhau = 'admin' ";
				$result = mysqli_query($con,$sql1);
				$num = mysqli_num_rows($result);
				 if ($num > 0){


			 	header('location:notice.php');

			 }

			 }else{
			 	header('location:login.php');
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