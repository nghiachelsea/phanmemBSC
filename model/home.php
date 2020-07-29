
<!DOCTYPE>
<!-- // To Vu Ca - B1606870 -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name=100ription" content="easyui help you build your web page easily!">
	<title>Dashboard</title>
	 <link rel="stylesheet" type="text/css" href="../lib/themes/default/easyui.css">
  <link rel="stylesheet" type="text/css" href="../lib/themes/icon.css">
  <link rel="stylesheet" type="text/css" href="../lib/themes/color.css">
  <link rel="stylesheet" type="text/css" href="../lib/demo/demo.css">
  <link rel="stylesheet" type="text/css" href="../lib/themes/boostrap/images/linkbutton.css">
  <script type="text/javascript" src="../lib/jquery.min.js"></script>
  <script type="text/javascript" src="../lib/jquery.easyui.min.js"></script>
</head>
<body>

  <div id="cc" class="easyui-layout" style="width:100%;height:5.5%;">

    <div data-options="region:'east',split:false" style="width:100px; padding-left:  36px ; border-width: 0px">
        <a id="btn" href = "logout.php" class="easyui-linkbutton" style="padding:10px data-options="iconCls:'icon-back', size: small " ">
              Logout
          </a>
    </div>
  </div>
  <div id="cc" class="easyui-layout" style="width:100%;height:90%;">
    <div data-options="region:'south'" style="padding:5px; border-width: 0px ">
      <div class="easyui-tabs" style="width:1300px;height:520px;";>
        <div title="Hồ sơ cá nhân" style="padding:10px">
          <div title="Đổi mật khẩu" style="padding:10px">
          
        </div>
        </div>
        <div title="Quản lý" style="padding:10px">
          <div class="easyui-tabs" style="width:'90%';height:550px">

            <div></div>

            <div href = "nguoidung/quanlinguoidung.php" title="Quản lý người dùng" style="padding:10px"> </div>

            <div href = "tieuchi/quanliTieuchi.php" title="Quản lý tiêu chí" style="padding:10px"></div>

            <div href = "donvi/index.php" title="Quản lý đơn vị" style="padding:10px"> </div>

            <div href = "tram/quanlitram.php" title="Quản lý nhà trạm" style="padding:10px"> </div>
            
            <div href = "kyphieu/quanlikyphieu.php" title="Quản lý kì phiếu" style="padding:10px"> </div>
            
          </div>
        </div>
         <div title="Thống kê" style="padding:10px">
          <div class="easyui-tabs" style="width:'90%';height:490px; ">
            <div title="Thống kê theo tiêu chí" style="padding:10px" > </div>
            <div title="Thống kê theo kỳ đánh giá" style="padding:10px"> </div>
            <div title="Thống kê theo trưởng trạm" style="padding:10px"> </div>
            <div title="Thống kê theo số điểm" style="padding:10px"> </div>
          </div>

        </div>
        
       
   
     </div>

  

    </div>



  </div>



</body>
</html>

