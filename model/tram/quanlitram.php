



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
    
    <center><table id="tram" title="Users Management" class="easyui-datagrid" url="tram/getData.php" toolbar="#toolbarTr" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
    <thead>
        <tr>
                <th field="maTram"> Mã Trạm</th>
                <th field="maDonvi"> Mã Đơn Vị</th>
                <th field="maQuanli">Mã Quản Lí</th>
                <th field="maGiamsat">Mã Giám Sát</th>
                <th field="tenTram">Tên Trạm</th>
                <th field="diachiTram">Địa Chỉ Trạm</th>
                <th field="trangthaiTram">Trạng Thái Trạm</th>
                <th field="toadoX">Tọa Độ X</th>
                <th field="toadoY">Tọa Độ Y</th>
            </tr>
        </thead>
    </table></center>
    <div id="toolbarTr">
    <div id="tb_tram">
        <input id="term_tram" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb_tram2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newTram()"> THÊM TRẠM</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editTram()">SỬA TRẠM</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyTram()">XÓA TRẠM</a>
    </div>
</div>
    
    <div id="dlg_tram" class="easyui-dialog" style="width:600px; height: 95%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg_tram-buttons'">
        <form id="fm_tram" method="post" novalidate style="margin:0;padding:10px 50px">
            <h3>Nhập thông tin trạm</h3>
            <div class="easyui-layout" data-options="fit:true" style="height: 32%" >
            <div data-options="region:'west', split:false" style = "
            height:90%;
            width:50%;
            inline;
            border-width: 0px;
            text-align:center; 
            vertical-align:middle;">
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã Trạm',labelPosition:'top' ,prompt:'Mã Trạm', height:60" style="width: 100%" id="maTram" name="maTram">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã Đơn Vị ',labelPosition:'top' ,prompt:'Mã Đơn Vị', height:60" style="width: 100%" id="maDonvi" name="maDonvi">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã Quản Lí',labelPosition:'top' ,prompt:'Mã Quản Lí', height:60" style="width: 100%" id="maQuanli" name="maQuanli">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã Giám Sát',labelPosition:'top' ,prompt:'Mã Giám Sát', height:60" style="width: 100%" id="maGiamsat" name="maGiamsat">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên Trạm',labelPosition:'top' ,prompt:'Tên Trạm', height:60" style="width: 100%" id="tenTram" name="tenTram">
            </div>
            </div>
        <div data-options= "region:'center', split: false" style="border-width: 0px; padding-left: 20px">
            
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Địa Chỉ Trạm',labelPosition:'top' ,prompt:'Địa Chỉ Trạm', height:60" style="width: 100%" id="diachiTram" name="diachiTram">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Trạng Thái Trạm',labelPosition:'top' ,prompt:'Trạng Thái Trạm', height:60" style="width: 100%" id="trangthaiTram" name="trangthaiTram">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tọa Độ X',labelPosition:'top' ,prompt:'Tọa Độ X', height:60" style="width: 100%" id="toadoX" name="toadoX">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tọa Độ Y',labelPosition:'top' ,prompt:'Tọa Độ Y', height:60" style="width: 100%" id="toadoY" name="toadoY">
            </div>
            </div>
        </div>

        </form>
    </div>
    <div id="dlg_tram-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveTram()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_tram').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
function doSearch(){
    $('#tram').datagrid('load', {
        term_tram: $('#term_tram').val()
    });
}
        
var url;
function newTram(){
    $('#dlg_tram').dialog('open').dialog('center').dialog('setTitle','Thêm tiêu chí');
    $('#fm_tram').form('clear');
    url = 'tram/addData.php';
}
function editTram(){
    var row = $('#tram').datagrid('getSelected');
    if (row){
        $('#dlg_tram').dialog('open').dialog('center').dialog('setTitle','Sửa tiêu chí');
        $('#fm_tram').form('load',row);
        url = 'tram/editData.php?maTram='+row.maTram;
    }
}
function saveTram(){
    $('#fm_tram').form('submit',{
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
                $('#dlg_tram').dialog('close');
                $('#tram').datagrid('reload');
            }
        }
    });
}
function destroyTram(){
    var row = $('#tram').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Are you sure you want to delete this user?',function(r){
            if (r){
                $.post('tram/deleteData.php', {maTram:row.maTram}, function(response){
                    if(response.status == 1){
                        $('#tram').datagrid('reload');
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
