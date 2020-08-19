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
    <center><table id="nd" title="Quản lí người dùng" class="easyui-datagrid" url="nguoidung/getData.php" toolbar="#toolbarND" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%'">
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
    <div id="toolbarND">
    <div id="tb">
        <input id="term_nd" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb_nd2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()"> THÊM NGƯỜI DÙNG</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">SỬA THÔNG TIN NGƯỜI DÙNG</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">XÓA NGƯỜI DÙNG</a>
    </div>
</div>
    
    <div id="dlg_nd" class="easyui-dialog" style="width:600px; height: 80%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg_nd-buttons'">
        <form id="fm_nd" method="post" novalidate style="margin:0;padding:10px 50px">
            <h3>Nhập thông tin người dùng</h3>
            <div class="easyui-layout" data-options="fit:true" style="height: 18%" >
            <div data-options="region:'west', split:false" style = "
            height:90%;
            width:50%;
            inline;
            border-width: 0px;
            text-align:center; 
            vertical-align:middle;">
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã Người Dùng',labelPosition:'top' ,prompt:'Mã Người Dùng', height:60" style="width: 100%" id="maND" name="maND">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã Đơn Vị ',labelPosition:'top' ,prompt:'Mã Đơn Vị ', height:60" style="width: 100%" id="maDonvi" name="maDonvi">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên Người Dùng',labelPosition:'top' ,prompt:'Tên Người Dùng', height:60" style="width: 100%" id="tenND" name="tenND">
            </div>
            </div>
        <div data-options= "region:'center', split: false" style="border-width: 0px; padding-left: 20px">
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tài Khoản',labelPosition:'top' ,prompt:'Tài Khoản', height:60" style="width: 100%" id="taiKhoan" name="taiKhoan">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mật Khẩu',labelPosition:'top' ,prompt:'Mật Khẩu', height:60" style="width: 100%" id="matKhau" name="matKhau">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Loại Người Dùng',labelPosition:'top' ,prompt:'Loại Người Dùng', height:60" style="width: 100%" id="loaiND" name="loaiND">
            </div>
            </div>
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
        $.messager.confirm('Confirm','Bạn có chắc chắn muốn xóa người dùng này?',function(r){
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
