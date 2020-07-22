<!DOCTYPE html>
<!-- // Nguyen trong nghia -->
<html>
<head>
    <meta charset="UTF-8">
    <title>QUẢN LÝ DANH SÁCH ĐƠN VỊ</title>
        <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>
</head>
<body>
    <center><h2>QUẢN LÝ DANH SÁCH ĐƠN VỊ</h2></center>
    
    
    <center><table id="dg" title="Quản lý đơn vị" class="easyui-datagrid" url="getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
    <thead>
        <tr>
                <th field="maDonvi"> Mã đơn vị</th>
                <th field="tenDonvi"> Tên đơn vị</th>
                <th field="tenViettat">Tên viết tắt</th>
                <th field="loaiDonvi">Loại đơn vị</th>
                <th field="trangthaiDonvi">Trạng thái đơn vị</th>
            </tr>
        </thead>
    </table></center>
    <div id="toolbar">
    <div id="tb">
        <input id="term" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()"> THÊM</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">SỬA</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">XÓA</a>
    </div>
</div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px; height: 400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Nhập thông tin tiêu chí</h3>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã đơn vị',labelPosition:'top' ,prompt:'maDonvi', height:60" style="width: 100%" id="maDonvi" name="maDonvi">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên đơn vị',labelPosition:'top' ,prompt:'tenDonvi', height:60" style="width: 100%" id="tenDonvi" name="tenDonvi">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên viết tắt',labelPosition:'top' ,prompt:'tenViettat', height:60" style="width: 100%" id="tenViettat" name="tenViettat">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Loại đơn vị',labelPosition:'top' ,prompt:'loaiDonvi', height:60" style="width: 100%" id="loaiDonvi" name="loaiDonvi">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Trạng thái đơn vị',labelPosition:'top' ,prompt:'trangthaiDonvi', height:60" style="width: 100%" id="trangthaiDonvi" name="trangthaiDonvi">
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
