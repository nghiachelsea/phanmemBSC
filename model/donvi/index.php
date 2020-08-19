


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
    
    
    
    <center><table id="dv" title="Quản lý đơn vị" class="easyui-datagrid" url="donvi/getData.php" toolbar="#toolbarDV" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
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
    <div id="toolbarDV">
    <div id="tb_dv">
        <input id="term_s" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="timKiem()">Search</a>
    </div>
    <div id="tb_dv2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="themDonvi()"> THÊM ĐƠN VỊ</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="suaDonvi()">SỬA ĐƠN VỊ</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="xoaDonvi()">XÓA ĐƠN VỊ</a>
    </div>
</div>
    
    <div id="dlv" class="easyui-dialog" style="width:600px; height: 95%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlv-buttons'">
        <form id="fr" method="post" novalidate style="margin:0;padding:10px 50px">
            <h3>Nhập thông tin đơn vị</h3>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã đơn vị',labelPosition:'top' ,prompt:'Mã đơn vị', height:60" style="width: 100%" id="maDonvi" name="maDonvi">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên đơn vị',labelPosition:'top' ,prompt:'Tên đơn vị', height:60" style="width: 100%" id="tenDonvi" name="tenDonvi">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên viết tắt',labelPosition:'top' ,prompt:'Tên viết tắt', height:60" style="width: 100%" id="tenViettat" name="tenViettat">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Loại đơn vị',labelPosition:'top' ,prompt:'Loại đơn vị', height:60" style="width: 100%" id="loaiDonvi" name="loaiDonvi">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Trạng thái đơn vị',labelPosition:'top' ,prompt:'Trạng thái đơn vị', height:60" style="width: 100%" id="trangthaiDonvi" name="trangthaiDonvi">
            </div>
        </form>
    </div>
    <div id="dlv-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="luuDonvi()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlv').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
function timKiem(){
    $('#dv').datagrid('load', {
        term_s: $('#term_s').val()
    });
}
        
var url;
function themDonvi(){
    $('#dlv').dialog('open').dialog('center').dialog('setTitle','Thêm đơn vị');
    $('#fr').form('clear');
    url = 'donvi/addData.php';
}
function suaDonvi(){
    var row = $('#dv').datagrid('getSelected');
    if (row){
        $('#dlv').dialog('open').dialog('center').dialog('setTitle','Sửa đơn vị');
        $('#fr').form('load',row);
        url = 'donvi/editData.php?maDonvi='+row.maDonvi;
    }
}
function luuDonvi(){
    $('#fr').form('submit',{
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
                $('#dlv').dialog('close');
                $('#dv').datagrid('reload');
            }
        }
    });
}
function xoaDonvi(){
    var row = $('#dv').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Bạn có chắc chắn muốn xóa đơn vị này?',function(r){
            if (r){
                $.post('donvi/deleteData.php', {maDonvi:row.maDonvi}, function(response){
                    if(response.status == 1){
                        $('#dv').datagrid('reload');
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
