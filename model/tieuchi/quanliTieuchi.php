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
    <center><h2>Quản lí danh sách trạm</h2></center>
    
    
    <center><table id="dg" title="Users Management" class="easyui-datagrid" url="getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
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
    <div id="toolbar">
    <div id="tb">
        <input id="term" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()"> THÊM TIÊU CHÍ</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">SỬA TIÊU CHÍ</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">XÓA TIÊU CHÍ</a>
    </div>
</div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px; height: 400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Nhập thông tin tiêu chí</h3>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã tiêu chí',labelPosition:'top' ,prompt:'maTieuchi', height:60" style="width: 100%" id="maTieuchi" name="maTieuchi">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã TN TTVT',labelPosition:'top' ,prompt:'maTrachnhiemTTVT', height:60" style="width: 100%" id="maTrachnhiemTTVT" name="maTrachnhiemTTVT">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã TN TTDHTT',labelPosition:'top' ,prompt:'maTrachnhiemTTDHTT', height:60" style="width: 100%" id="maTrachnhiemTTDHTT" name="maTrachnhiemTTDHTT">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên tiêu chí',labelPosition:'top' ,prompt:'tenTieuchi', height:60" style="width: 100%" id="tenTieuchi" name="tenTieuchi">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Chi tiết tiêu chí',labelPosition:'top' ,prompt:'chitietTieuchi', height:60" style="width: 100%" id="chitietTieuchi" name="chitietTieuchi">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mức điểm CN TTVT',labelPosition:'top' ,prompt:'mucdiemcnTTVT', height:60" style="width: 100%" id="mucdiemcnTTVT" name="mucdiemcnTTVT">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mức điểm TT TTVT',labelPosition:'top' ,prompt:'mucdiemttTTVT', height:60" style="width: 100%" id="mucdiemttTTVT" name="mucdiemttTTVT">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mức điểm CN TTDHTT',labelPosition:'top' ,prompt:'mucdiemcnTTDHTT', height:60" style="width: 100%" id="mucdiemcnTTDHTT" name="mucdiemcnTTDHTT">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mức điểm TT TTDHTT',labelPosition:'top' ,prompt:'mucdiemttTTDHTT', height:60" style="width: 100%" id="mucdiemttTTDHTT" name="mucdiemttTTDHTT">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
function doSearch(){
    $('#dg').datagrid('load', {
        term: $('#term').val()
    });
}
        
var url;
function newUser(){
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm tiêu chí');
    $('#fm').form('clear');
    url = 'addData.php';
}
function editUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Sửa tiêu chí');
        $('#fm').form('load',row);
        url = 'editData.php?id='+row.id;
    }
}
function saveUser(){
    $('#fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(response){
            var respData = $.parseJSON(response);
            if(respData.status == 0){
                $.messager.show({
                    title: 'Error',
                    msg: respData.msg
                });
            }else{
                $('#dlg').dialog('close');
                $('#dg').datagrid('reload');
            }
        }
    });
}
function destroyUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Are you sure you want to delete this user?',function(r){
            if (r){
                $.post('deleteData.php', {id:row.id}, function(response){
                    if(response.status == 1){
                        $('#dg').datagrid('reload');
                    }else{
                        $.messager.show({
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