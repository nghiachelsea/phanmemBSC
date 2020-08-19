<?php
	if(isset($_POST['upload'])) {
		$target = "images/".basename($_FILES['image']['name']);
		$db = mysqli_connect("localhost", "root", "", "csdlbsc");
		$image = $_FILES['image']['name'];
		$text = $_POST['text'];
		$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
		mysqli_query($db, $sql);
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Thành công!";
		} 
		else{
			$msg = "Thất bại";
		}
	}
?>
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
    <center><h1> Bảng Đánh Giá Các Tiêu Chí<h1></center>
    <p> Mã Phiếu: </p>
    <p> Mã Chi Tiết PDG: </p>
    <p> Mã Trạm: </p>
    <p> Người đánh giá: <?php include("getND.php") ?></p>
    <a> Ngày Đánh Giá: </a> <a id="date"></a>
<div id="toolbarP">
    <div id="tbP2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editP()">Thêm Ghi Chú</a>
    </div>
</div>
<div id="dlgP" class="easyui-dialog" style="width:50%; height: 200%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgP-buttons'">
        <form id="fmP" method="post" action="ctphieudanhgia.php" enctype="multipart/form-data" novalidate style="margin:0;padding:10px 50px">
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
                <input type="hidden" name="size" value="1000000">
				<div>
						<input type="file" name="image">
				</div>
				<div>
						<textarea name="text" cols="40" rows="4" placeholder="ssss"></textarea>
				</div>
				<div>
					<input type="submit" name="upload" value="Upload images">
				</div>
            </div>
        </div>
        </div>
        </div>

    </form>
    </div>
    <div id="dlgP-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveP()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgP').dialog('close')" style="width:90px">Cancel</a>
    </div>
    
<table id="dg"  >
  
    
</table>

    <script type="text/javascript">
    $('#save').click(function(){
       $('#sent').linkbutton('enable');
       
    })
    document.getElementById("date").innerHTML = Date();
    $(function(){
    $('#dg').datagrid({ 
        title:'Bảng Đánh Giá Các Tiêu Chí',   
        url:'getData.php',
        pagination:true,
        rownumbers:true,
        fitColumns:true, 
        nowrap: false,

      
        idField:'maTieuchi',
        columns:[[  {field:'tenTieuchi',title:'Tên tiêu thí',width:30}, 
        {field:'chitietTieuchi',title:'Chi tiết tiêu chí',width:50, height:40},
        {field:'maTieuchi',align: 'center',title:'Đánh giá chưa đạt',width:10,formatter: function(value,row,index){
            return row.tenTieuchi == "ly3" ? '<input type="checkbox" disabled="disabled" name="ckId" />'
            :'<input type="checkbox" name="ckId" value="'+value+'" />';
        }}
        
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



</script>
<script type="text/javascript">

function  editP(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlgP').dialog('open').dialog('center').dialog('setTitle','Thêm ghi chú');
        $('#fmP').form('load',row);
        url = 'phieudanhgia/editData.php?maTieuchi='+row.maTieuchi;
    }
}
function  saveTC () {
    $('#fmTC').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(response){
            var respData = $.parseJSON(response);
            if(respData.status == 0){
                $ .messager.show ({
                    title: 'Error',
                    msg: respData.msg
                });
            }else{
                $('#dlgTC').dialog('close');
                $('#dgTC').datagrid('reload');
            }
        }
    });
}



</script>
<input type="button" id="btn" value="Xem kết quả"/><br>
         
        <script language="javascript">
            document.getElementById('btn').onclick = function()
            {
                // Khai báo tham số
                var checkbox = document.getElementsByName('ckId');
                var result = "";
                 
                // Lặp qua từng checkbox để lấy giá trị
                for (var i = 0; i < checkbox.length; i++){
                    if (checkbox[i].checked === true){
                        result += ' [' + checkbox[i].value + ']';
                    }
                }
                 
                // In ra kết quả
                alert("Các tiêu chí chưa đạt: " + result);
            };
        </script>
    <a href="javascript:void(0)" plain = "true" id="save" class="easyui-linkbutton" data-options=" iconCls:'icon-save' " >Lưu đánh giá</a>
    <a href="#" id="sent" plain="true" class="easyui-linkbutton" data-options="iconCls:'icon-redo', disabled:true">Chuyển cấp trên</a>
    <a href="javascript:void(0)" plain="true" id="resent"  class="easyui-linkbutton"  data-options="iconCls:'icon-undo' ,disabled:true" >Lấy lại phiếu đã gửi</a>
    
</body>
</html>

