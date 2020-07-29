<!DOCTYPE html>
<!-- // To Vu Ca - B1606870 -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lí danh sách người dùng</title>
    <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>
</head>
<body>
    <center><h2>Quản lí danh sách người dùng</h2></center>
    
    
<<<<<<< HEAD
    <center><table id="dg" title="Users Management" class="easyui-datagrid" url="nguoidung/getData.php" toolbar="#toolbarND" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%'">
=======
    <center><table id="nd" title="Users Management" class="easyui-datagrid" url="nguoidung/getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%'">
>>>>>>> 8ee69a29a086067b93e3b0b757a8a858e5917448
    <thead>
        <tr>
                <th field="maND"> Mã Người Dùng</th>
                <th field="maDonvi"> Mã Đơn Vị</th>
                <th field="tenND">Tên Người Dùng</th>
                <th field="taiKhoan">Tài Khoản</th>
                <th field="matKhau">Mật Khẩu</th>
                <th field="loaiND">Loại Người Dùng</th>
            </tr>
        </thead>
    </table></center>
<<<<<<< HEAD
    <div id="toolbarND">
    <div id="tb">
        <input id="term" placeholder="Type keywords...">
=======
    <div id="toolbar">
    <div id="tb_nd">
        <input id="term_nd" placeholder="Type keywords...">
>>>>>>> 8ee69a29a086067b93e3b0b757a8a858e5917448
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb_nd2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()"> THÊM NGƯỜI DÙNG</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">SỬA THÔNG TIN NGƯỜI DÙNG</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">XÓA NGƯỜI DÙNG</a>
    </div>
</div>
    
    <div id="dlg_nd" class="easyui-dialog" style="width:400px; height: 400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg_nd-buttons'">
        <form id="fm_nd" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Nhập thông tin người dùng</h3>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã Người Dùng',labelPosition:'top' ,prompt:'maND', height:60" style="width: 100%" id="maND" name="maND">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã Đơn Vị ',labelPosition:'top' ,prompt:'maDonvi', height:60" style="width: 100%" id="maDonvi" name="maDonvi">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên Người Dùng',labelPosition:'top' ,prompt:'tenND', height:60" style="width: 100%" id="tenND" name="tenND">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Tài Khoản',labelPosition:'top' ,prompt:'taiKhoan', height:60" style="width: 100%" id="taiKhoan" name="taiKhoan">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mật Khẩu',labelPosition:'top' ,prompt:'matKhau', height:60" style="width: 100%" id="matKhau" name="matKhau">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Loại Người Dùng',labelPosition:'top' ,prompt:'loaiND', height:60" style="width: 100%" id="loaiND" name="loaiND">
            </div>
        </form>
    </div>
    <div id="dlg_nd-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_nd').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
function doSearch(){
    $('#nd').datagrid('load', {
        term_nd: $('#term_nd').val()
    });
}
        
var url;
function newUser(){
    $('#dlg_nd').dialog('open').dialog('center').dialog('setTitle','Thêm tiêu chí');
    $('#fm_nd').form('clear');
    url = 'nguoidung/addData.php';
}
function editUser(){
    var row = $('#nd').datagrid('getSelected');
    if (row){
        $('#dlg_nd').dialog('open').dialog('center').dialog('setTitle','Sửa tiêu chí');
        $('#fm_nd').form('load',row);
        url = 'nguoidung/editData.php?maND='+row.maND;
    }
}
function saveUser(){
    $('#fm_nd').form('submit',{
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
                $('#dlg_nd').dialog('close');
                $('#nd').datagrid('reload');
            }
        }
    });
}
function destroyUser(){
    var row = $('#nd').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Are you sure you want to delete this user?',function(r){
            if (r){
                $.post('nguoidung/deleteData.php', {maND:row.maND}, function(response){
                    if(response.status == 1){
                        $('#nd').datagrid('reload');
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
