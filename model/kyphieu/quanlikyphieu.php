



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
    <center><h2>Quản lý kỳ phiếu</h2></center>
    
    
    <center><table id="dg" title="Quản lý kỳ phiếu" class="easyui-datagrid" url="getData.php" toolbar="#toolbarKP" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
    <thead>
        <tr>
                <th field="maKyphieu">Mã kỳ phiếu</th>
                <th field="maND">Mã người dùng</th>
				<th field="tenKyphieu">Tên kỳ phiếu</th>
                <th field="ngayBatdau">Ngày bắt đầu</th>
                <th field="ngayKetthuc">Ngày kết thúc</th>
                <th field="thang">Tháng</th>
                <th field="ghichu">Ghi chú</th>
            </tr>
        </thead>
    </table></center>
    <div id="toolbarKP">
    <div id="tb">
        <input id="term" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newKP()"> THÊM KỲ PHIẾU</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editKP()">SỬA KỲ PHIẾU</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyKP()">XÓA KỲ PHIẾU</a>
    </div>
</div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px; height: 400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Nhập thông tin kỳ phiếu</h3>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã kỳ phiếu',labelPosition:'top' ,prompt:'maKyphieu', height:60" style="width: 100%" id="maKyphieu" name="maKyphieu">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã người dùng',labelPosition:'top' ,prompt:'maND', height:60" style="width: 100%" id="maND" name="maND">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên kỳ phiếu',labelPosition:'top' ,prompt:'tenKyphieu', height:60" style="width: 100%" id="tenKyphieu" name="tenKyphieu">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Ngày bắt đầu',labelPosition:'top' ,prompt:'ngayBatdau', height:60" style="width: 100%" id="ngayBatdau" name="ngayBatdau">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Ngày kết thúc',labelPosition:'top' ,prompt:'ngayKetthuc', height:60" style="width: 100%" id="ngayKetthuc" name="ngayKetthuc">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Tháng',labelPosition:'top' ,prompt:'thang', height:60" style="width: 100%" id="thang" name="thang">
            </div>
            <div style="margin-bottom:20px">
                <input type="text" class="easyui-textbox" data-options="label:'Ghi chú',labelPosition:'top' ,prompt:'ghichu', height:60" style="width: 100%" id="ghichu" name="ghichu">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveKP()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
   <script type="text/javascript">
function doSearch() {
    $('#dg').datagrid('load', {
        term: $('#term').val()
    });
}
        
var url;
function newKP() {
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm kỳ phiếu');
    $('#fm').form('clear');
    url = 'addData.php';
}
function  editKP (){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật kỳ phiếu');
        $('#fm').form('load',row);
        url = 'editData.php?maKyphieu='+row.maKyphieu;
    }
}
function  saveKP () {
    $('#fm').form('submit',{
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
                $('#dlg').dialog('close');
                $('#dg').datagrid('reload');
            }
        }
    });
}
function destroyKP(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Bạn có chắc chắn muốn xóa kỳ phiếu này?',function(r){
            if (r){
                $.post('deleteData.php', {maKyphieu:row.maKyphieu}, function(response){
                    if(response.status == 1){
                        $('#dg').datagrid('reload');
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


