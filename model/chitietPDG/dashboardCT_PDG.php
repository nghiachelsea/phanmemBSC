<!DOCTYPE html>
<!-- // To Vu Ca - B1606870 -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lí danh sách phiếu</title>
        <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>
</head>
<body>
    <div id="cc" class="easyui-layout" style="width:100%;height:10%; padding-top: 35px">

    <div data-options="region:'east',split:false" style="width:100px; padding-left:  36px ; border-width: 0px">
        <a id="btn" href = "../logout.php" class="easyui-linkbutton" style="padding:10px data-options="iconCls:'icon-back', size: small " ">
              Logout
          </a>
    </div>
  </div>
    <div id="toolbarCTPDG">
        <div id="tbCTPDG">
            <input id="termCTPDG" placeholder="Type keywords...">
            <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
            </div>
  
    </div>
    <center><table id="dgCTPDG">
    </table></center>
  
    
   <script type="text/javascript">
     $(function(){
    $('#dgCTPDG').datagrid({ 
        title:'Danh sách phiêu đánh giá',   
        url:'getPhieu.php',
        pagination:true,
        rownumbers:true,
        fitColumns:true, 
        nowrap: false,

      
        idField:'maPhieu',
        columns:[[  {field:'maPhieu',title:'Mã Phiếu',width:50}, 
        {field:'tenPhieu',title:'Tên Phiếu',width:50, height:50},
        {field:'maTram',title:'Mã trạm',width:50, height:50},
        {field:'action',title:'Action',width:80,align:'center',
                formatter:function(value,row,index){
                         var d = '<a href="chitietPDG.php">Đánh giá</a>';
                        return d; }}
                        
        
        ]]
    });
}),

function doSearch() {
    $('#dgCTPDG').datagrid('load', {
        termCTPDG: $('#termCTPDG').val()
    });
}
        
var url;

</script>

</body>
</html>


