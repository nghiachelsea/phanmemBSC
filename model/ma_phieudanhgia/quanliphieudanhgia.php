
<!DOCTYPE html>
<!-- // Huynh Minh Thu-B1505804 -->
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
    <center><table id="dgP" title="Quản lý phiếu đánh giá" class="easyui-datagrid" url="ma_phieudanhgia/getData.php" toolbar="#toolbarP" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
		<thead>
			<tr>
                <th field="maPhieu">Mã phiếu</th>
                <th field="maKyphieu">Mã kỳ phiếu</th>
                <th field="maDonvi">Mã đơn vị quản lí</th>
                <th field="Don_maDonvi">Mã đơn vị giám sát</th>
                <th field="maND">Mã người dùng quản lí</th>
                <th field="Ngu_maND">Mã người dùng giám sát</th>
                <th field="maTram">Mã trạm</th>
				<th field="tenPhieu">Tên phiếu</th>
                <th field="nguoiDanhgia1">Người đánh giá 1</th>
				<th field="nguoiDanhgia2">Người đánh giá 2</th>
				<th field="nguoiDanhgia3">Người đánh giá 3</th>
                <th field="trangthai">Trạng Thái</th>
            </tr>
        </thead>
    </table></center>
    <div id="toolbarP">
    <div id="tbP">
        <input id="termP" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tbP2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newP()"> THÊM PHIẾU ĐÁNH GIÁ</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editP()">SỬA PHIẾU ĐÁNH GIÁ</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyP()">XÓA PHIẾU ĐÁNH GIÁ</a>
    </div>
</div>
    
    <div id="dlgP" class="easyui-dialog" style="width: 50%; height: 95%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgP-buttons'">
        <form id="fmP" method="post" novalidate style="margin:0;padding:10px 50px">
            <h3>Nhập thông tin phiếu</h3>
            <div class="easyui-layout" data-options="fit:true" style="height: 32%" >
            <div data-options="region:'west', split:false" style = "
            height:90%;
            width:50%;
            inline;
            border-width: 0px;
            text-align:center; 
            vertical-align:middle;">
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã phiếu',labelPosition:'top' ,prompt:'Mã phiếu', height:60" style="width: 100%" id="maPhieu" name="maPhieu">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã kỳ phiếu',labelPosition:'top' ,prompt:'Mã kỳ phiếu', height:60" style="width: 100%" id="maKyphieu" name="maKyphieu">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã đơn vị quản lí',labelPosition:'top' ,prompt:'Mã đơn vị quản lí', height:60" style="width: 100%" id="maDonvi" name="maDonvi">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã đơn vị giám sát',labelPosition:'top' ,prompt:'Mã đơn vị giám sát', height:60" style="width: 100%" id="Don_maDonvi" name="Don_maDonvi">
            </div>
            <div >
                <input type="text" class="easyui-textbox" data-options="label:'Mã người dùng quản lí',labelPosition:'top' ,prompt:'Mã người dùng quản lí', height:60" style="width: 100%" id="maND" name="maND">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã người dùng giám sát',labelPosition:'top' ,prompt:'Mã ngươi dùng giám sát', height:60" style="width: 100%" id="Ngu_maND" name="Ngu_maND">
            </div>
		</div>
			
			
			<div data-options= "region:'center', split: false" style="border-width: 0px; padding-left: 20px">
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Mã trạm',labelPosition:'top' ,prompt:'Mã trạm', height:60" style="width: 100%" id="maTram" name="maTram">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Tên phiếu',labelPosition:'top' ,prompt:'Tên phiếu', height:60" style="width: 100%" id="tenPhieu" name="tenPhieu">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Người đánh giá 1',labelPosition:'top' ,prompt:'Người đánh giá 1', height:60" style="width: 100%" id="nguoiDanhgia1" name="nguoiDanhgia1">
            </div>
			<div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Người đánh giá 2',labelPosition:'top' ,prompt:'Người đánh giá 2', height:60" style="width: 100%" id="nguoiDanhgia2" name="nguoiDanhgia2">
            </div>
			<div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Người đánh giá 3',labelPosition:'top' ,prompt:'Người đánh giá 3', height:60" style="width: 100%" id="nguoiDanhgia3" name="nguoiDanhgia3">
            </div>
			<div style="margin-bottom:10px">
                <input type="text" class="easyui-textbox" data-options="label:'Trạng thái',labelPosition:'top' ,prompt:'Trạng thái', height:60" style="width: 100%" id="trangthai" name="trangthai">
            </div>
        </div>
        </div>
    </form>
    </div>
    <div id="dlgP-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveP()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgP').dialog('close')" style="width:90px">Cancel</a>
    </div>



   <script type="text/javascript">
function doSearch() {
    $('#dgP').datagrid('load', {
        termP: $('#termP').val()
    });
}
        
var url;
function newP() {
    $('#dlgP').dialog('open').dialog('center').dialog('setTitle','Thêm phiếu');
    $('#fmP').form('clear');
    url = 'ma_phieudanhgia/addData.php';
}
function  editP (){
    var row = $('#dgP').datagrid('getSelected');
    if (row){
        $('#dlgP').dialog('open').dialog('center').dialog('setTitle','Cập nhật phiếu');
        $('#fmP').form('load',row);
        url = 'ma_phieudanhgia/editData.php?maPhieu='+row.maPhieu;
    }
}
function  saveP () {
    $('#fmP').form('submit',{
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
                $('#dlgP').dialog('close');
                $('#dgP').datagrid('reload');
            }
        }
    });
}
function destroyP(){
    var row = $('#dgP').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Bạn có chắc chắn muốn xóa phiếu này?',function(r){
            if (r){
                $.post('ma_phieudanhgia/deleteData.php', {maPhieu:row.maPhieu}, function(response){
                    if(response.status == 1){
                        $('#dgP').datagrid('reload');
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


