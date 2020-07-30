



<!DOCTYPE html>
<!-- // To Vu Ca - B1606870 -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lí danh sách trạm</title>
        <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>
</head>
<body>
    <center><table id="dgTC" title="Quản lý tiêu chí" class="easyui-datagrid" url="tieuchi/getData.php" toolbar="#toolbarTC" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
    <thead>
        <tr>
                <th field="maTieuchi"> Mã tiêu chí</th>
                <th field="maTN_TTVT"> Mã TN TTVT</th>
                <th field="maTN_TTDHTT">Mã TN TTDHTT</th>
                <th field="tenTieuchi">Tên tiêu chí</th>
                <th field="chitietTieuchi">Chi tiết tiêu chí</th>
                <th field="mucdiemtrucnTTVT">Mức điểm CN TTVT</th>
                <th field="mucdiemtruttTTVT">Mức điểm TT TTVT</th>
                <th field="mucdiemtrucnTTDHTT">Mức điểm CN TTDHTT</th>
                <th field="mucdiemtruttTTDHTT">Mức điểm TT TTDHTT</th>
            </tr>
        </thead>
    </table></center>
    <div id="toolbarTC">
    <div id="tbTC">
        <input id="termTC" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tbTC2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newTC()"> THÊM TIÊU CHÍ</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editTC()">SỬA TIÊU CHÍ</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyTC()">XÓA TIÊU CHÍ</a>
    </div>
</div>
    
    <div id="dlgTC" class="easyui-dialog" style="width:600px; height: 95%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgTC-buttons'">
        <form id="fmTC" method="post" novalidate style="margin:0;padding:10px 50px">
            <h3>Nhập thông tin tiêu chí</h3>
            <div class="easyui-layout" data-options="fit:true" style="height: 32%" >
            <div data-options="region:'west', split:false" style = "
            height:90%;
            width:50%;
            inline;
            border-width: 0px;
            text-align:center; 
            vertical-align:middle;">
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã tiêu chí',labelPosition:'top' ,prompt:'maTieuchi', height:60" style="width: 100%" id="maTieuchi" name="maTieuchi">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã TN TTVT',labelPosition:'top' ,prompt:'maTrachnhiemTTVT', height:60" style="width: 100%" id="maTN_TTVT" name="maTN_TTVT">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã TN TTDHTT',labelPosition:'top' ,prompt:'maTrachnhiemTTDHTT', height:60" style="width: 100%" id="maTN_TTDHTT" name="maTN_TTDHTT">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên tiêu chí',labelPosition:'top' ,prompt:'tenTieuchi', height:60" style="width: 100%" id="tenTieuchi" name="tenTieuchi">
            </div>
            <div >
                <input type="text" class="easyui-textbox" data-options="label:'Chi tiết tiêu chí',labelPosition:'top' ,prompt:'chitietTieuchi', height:60" style="width: 100%" id="chitietTieuchi" name="chitietTieuchi">
            </div>
        </div>
        <div data-options= "region:'center', split: false" style="border-width: 0px; padding-left: 20px">
            
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mức điểm CN TTVT',labelPosition:'top' ,prompt:'mucdiemcnTTVT', height:60" style="width: 100%" id="mucdiemtrucnTTVT" name="mucdiemtrucnTTVT">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mức điểm TT TTVT',labelPosition:'top' ,prompt:'mucdiemttTTVT', height:60" style="width: 100%" id="mucdiemtruttTTVT" name="mucdiemtruttTTVT">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mức điểm CN TTDHTT',labelPosition:'top' ,prompt:'mucdiemcnTTDHTT', height:60" style="width: 100%" id="mucdiemtrucnTTDHTT" name="mucdiemtrucnTTDHTT">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mức điểm TT TTDHTT',labelPosition:'top' ,prompt:'mucdiemttTTDHTT', height:60" style="width: 100%" id="mucdiemtruttTTDHTT" name="mucdiemtruttTTDHTT">
            </div> 
        </div>
        </div>
    </form>
    </div>
    <div id="dlgTC-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveTC()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgTC').dialog('close')" style="width:90px">Cancel</a>
    </div>



   <script type="text/javascript">
function doSearch() {
    $('#dgTC').datagrid('load', {
        termTC: $('#termTC').val()
    });
}
        
var url;
function newTC() {
    $('#dlgTC').dialog('open').dialog('center').dialog('setTitle','Thêm tiêu chí');
    $('#fmTC').form('clear');
    url = 'tieuchi/addData.php';
}
function  editTC (){
    var row = $('#dgTC').datagrid('getSelected');
    if (row){
        $('#dlgTC').dialog('open').dialog('center').dialog('setTitle','Cập nhật tiêu chí');
        $('#fmTC').form('load',row);
        url = 'tieuchi/editData.php?maTieuchi='+row.maTieuchi;
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
function destroyTC(){
    var row = $('#dgTC').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Bạn có chắc chắn muốn xóa tiêu chí này?',function(r){
            if (r){
                $.post('tieuchi/deleteData.php', {maTieuchi:row.maTieuchi}, function(response){
                    if(response.status == 1){
                        $('#dgTC').datagrid('reload');
                    }else{
                        $ .messager.show ({
                            title: 'Error',
                            msg: respData.msg
                        });
                    }
                },'json');
            }
        });
    }
}
</script>

</body>
</html>


