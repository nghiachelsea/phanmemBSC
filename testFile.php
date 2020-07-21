<!DOCTYPE html>
<!-- To Vu Ca - B1606870 -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lí danh sách trạm</title>
    <link rel="stylesheet" type="text/css" href="themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="themes/icon.css">
    <link rel="stylesheet" type="text/css" href="themes/color.css">
    <link rel="stylesheet" type="text/css" href="demo/demo.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery.easyui.min.js"></script>
</head>
<body>
    <center><h2>Quản lí danh sách trạm</h2></center>
    
    
    <center><table id="dg" title="Users Management" class="easyui-datagrid" url="getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:800px;height:250px;">
    <thead>
        <tr>
                <th field="maTram"> Mã trạm</th>
                <th field="maDonvi"> Mã đơn vị</th>
                <th field="maQuanli">Mã quản lí</th>
                <th field="maGiamsat">Mã giám sát</th>
                <th field="tenTram">Tên trạm</th>
                <th field="diachiTram">Địa chỉ trạm</th>
                <th field="trangthaiTram">Trạng thái trạm</th>
                <th field="toadoX">Tọa độ X</th>
                <th field="toadoY">Tọa độ Y</th>
            </tr>
        </thead>
    </table></center>
    <div id="toolbar">
    <div id="tb">
        <input id="term" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()"> THÊM TRẠM</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">SỬA TRẠM</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">XÓA TRẠM</a>
    </div>
</div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Nhập thông tin trạm</h3>
            <div style="margin-bottom:20px">
                <input name="maTram" class="easyui-textbox" required="true" label="Mã Trạm:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="maDonvi" class="easyui-textbox" required="true" label="Mã đơn vị:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="maQuanli" class="easyui-textbox" required="true" label="Mã quản lí:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="maGiamsat" class="easyui-textbox" required="true" label="Mã giám sát:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="tenTram" class="easyui-textbox" required="true" label="Tên trạm:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="diachiTram" class="easyui-textbox" required="true" label="Địa chỉ trạm:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="trangthaiTram" class="easyui-textbox" required="true" label="Trạng thái trạm:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="toadoX" class="easyui-textbox" required="true" label="Tọa độ X:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="toadoY" class="easyui-textbox" required="true" label="Tọa độ Y:" style="width:100%">
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
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
    $('#fm').form('clear');
    url = 'addData.php';
}
function editUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
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