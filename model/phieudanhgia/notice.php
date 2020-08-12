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

<div class="easyui-dialog" style="width:450px;height:200px;"
			data-options="title:'Cảnh báo',buttons:'#bb',modal:true">
		<br>
		<a style="font-size: 17px; text-align: center;">Vui lòng chọn Trạm mà bạn muốn đánh giá!!!!
	   </a>	
	   <div style="padding-top: 10px; text-align: center;">
		<input id="cc" class="easyui-combobox" name="dept"
    data-options="valueField:'maTram',textField:'tenTram',url:'phieu.php'">
	</div>
		</div>
		<div id="bb">
			<a href="phieuUI.php" class="easyui-linkbutton" data-options= "iconCls:'icon-ok'">YES</a>

	</div>
    
</body>
</html>
