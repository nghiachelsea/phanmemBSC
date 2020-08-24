<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
           <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>

</head>
<body>
     <p> Người đánh giá: <?php include("getND.php") ?></p>
   <p> Mã Phiếu: <?php  echo $_SESSION['maPhieu']; ?></p>
    <p> Mã Trạm:  <?php  echo $_SESSION['maTram']; ?></p></p>
   
    <a> Ngày Đánh Giá: </a> <a id="date"></a>
<!-- 
<div id="toolbarP">
    <div id="tbP2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editP()">Thêm Ghi Chú</a>
    </div>
</div> -->
<div id="dlgP" class="easyui-dialog" style="width:50%; height: 200%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgP-buttons'">
        <form  id="fmP"  method="post"  enctype="multipart/form-data" novalidate style="margin:0;padding:10px 50px">
            <h3>Nhập thông tiêu chí</h3>
            <div class="easyui-layout" data-options="fit:true" style="height: 32%" >
            <div data-options="region:'center', split:false" style = "
            height:90%;
            width:50%;
            inline;
            border-width: 0px;
            text-align:center;
            vertical-align:middle;">
            
               <div style="margin-bottom:10px">
               
                <div>
                        <input id="file" class="easyui-filebox" name="image" data-options="prompt:'Choose a file...', width:'   200px'">
                </div>
                <div>
                        <textarea id="text" name="text" cols="40" rows="4" placeholder="Nhập thông tin ghi chú"></textarea>
                </div>
                <input  id="sm"  name="upload"  type="submit" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px" value="Save">
            </div>
        </div>
        </div>
        </div>

    </form>
    </div>
    
    
<table id="dg"  >
</table>
  <div id="toolbarCTPDG">
    <div data-options="region:'west', split:false" ></div>
     <div data-options= "region:'center', split: false" style="border-width: 0px; padding-left: 86%">
    <div id="tb_CTPDG" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="savePDG()">Lưu thay đổi</a>
       
    </div>
</div>
</div>

    <script type="text/javascript">
    $('#save').click(function(){
       $('#sent').linkbutton('enable');
       
    })
    document.getElementById("date").innerHTML = Date();
    $(function(){
   
    $('#dg').datagrid({ 
        title:'Bảng Đánh Giá Các Tiêu Chí',   
        url:'getData.php',
        pagination:false,
        rownumbers:true,
        fitColumns:true, 
        nowrap: false,
        footer: '#toolbarCTPDG',
      
        idField:'maTieuchi',
        columns:[[{field:'tenTieuchi',title:'Tên tiêu thí',width:30}, 
        {field:'chitietTieuchi',title:'Chi tiết tiêu chí',width:50, height:40},
        {field:'maTieuchi',align: 'center',title:'Đánh giá',width:10,formatter: function(value,row,index){
            return row.tenTieuchi == "ly3" ? '<input type="checkbox" disabled="disabled" name="ckId" />'
            :'<input type="checkbox" name="ckId" value="'+value+'" />';
        }},
        {field:'action',title:'Action',width:20,align:'center',
                formatter:function(value,row,index){
                         var d = '<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editP()" >Thêm hình ảnh</a>';
                        return d; }}
        
        ]],
        
        onLoadSuccess:function(){
            $("#ck_all").click(function(){
                if($(this).attr("checked"))
                {
                    var chks = $("input[name='ckId']");
                    for(var i=0;i<chks.length;i++)
                    {
                        var chkobj = $(chks[i])
                        if(!chkobj.attr("disabled"))
                        {
                            chkobj.attr("checked",true);
                        }
                        else
                        {
                           chkobj.parent().parent().parent().css({"background-color":"White"})
                        }
                    }
                }
                else
                {
                    $("input[name='ckId']").attr("checked",false);
                }
            })
        },
        onSelect:function(rowIndex, rowData){
            if(rowData.tenTieuchi == "ly3")
            {
                $("input[value='"+rowData.maTieuchi+"']").attr("checked",true);
            }
        },
        onUnselect:function(rowIndex, rowData){
            $("input[value='"+rowData.maTieuchi+"']").attr("checked",false);
        }  

    });   
})  
        function  editP(){
             var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlgP').dialog('open').dialog('center').dialog('setTitle','Thêm ghi chú');
                $('#fmP').form('clear');
                $maTieuchi= row.tenTieuchi;
            }
        }
        function savePDG(){

                var checkbox = document.getElementsByName('ckId');
                var result = "";
                 
                // Lặp qua từng checkbox để lấy giá trị
                for (var i = 0; i < checkbox.length; i++){
                    if (checkbox[i].checked === true){
                        result += ' [' + checkbox[i].value + ']';
                        <?php


                         ?>
            }
         }
                 
                // In ra kết quả
                alert("Các tiêu chí chưa đạt: " + result);
            
                  

                
           
        }




</script>
    <a href="javascript:void(0)" plain = "true" id="save" class="easyui-linkbutton" data-options=" iconCls:'icon-save' " >Lưu đánh giá</a>
    <a href="#" id="sent" plain="true" class="easyui-linkbutton" data-options="iconCls:'icon-redo', disabled:true">Chuyển cấp trên</a>
    <a href="javascript:void(0)" plain="true" id="resent"  class="easyui-linkbutton"  data-options="iconCls:'icon-undo' ,disabled:true" >Lấy lại phiếu đã gửi</a>
    
</body>
</html>

<?php

    $con = mysqli_connect(_HOST_NAME, _USER_NAME,_PASSWORD) or die("Database could not connect.");
    mysqli_select_db($con,_DB_NAME) or die("Could not select database.");

   
    if(isset($_POST['upload'])) {
        
        $target = "images/".basename($_FILES['image']['name']);
                 
        
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];
        $sql = "INSERT INTO hinhanh (maPhieu, image, text) VALUES ('$_SESSION[maPhieu]','$image', '$text')";
        mysqli_query($con, $sql);
       echo  '<script> alert ("Đã thêm ghi chú!"); </script>' ;
           echo '<script>location.href = "chitietPDG.php";</script>';
  
    
}
?>