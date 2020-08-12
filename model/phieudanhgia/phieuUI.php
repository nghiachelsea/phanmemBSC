



<!DOCTYPE html>
<!-- // To Vu Ca - B1606870 -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lí danh sách phiếu</title>
        <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>
</head>
<body>
    
    <center><table id="dgP" title="Quản lý phiếu" class="easyui-datagrid" toolbar="#toolbarP" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
    <thead>
        <tr>
                <th field="maKyphieu">Mã kỳ phiếu</th>
                <th field="maPhieu">Mã phiếu</th>
				<th field="tenPhieu">Tên phiếu</th>
				<th field="maTram">Mã Trạm</th>
                <th field="maTTVT">Mã đơn vị TTVT</th>
                <th field="maTTDHTT">Mã đơn vị TTDHTT</th>
                <th field="maQuanli">Mã quản lí</th>
                <th field="maGiamsat">Mã giám sát</th>
            </tr>
        </thead>
    </table></center>
    <div id="toolbarP">
    <div id="tbP">
        <input id="termKP" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tbP2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newKP()"> THÊM PHIẾU</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editKP()">SỬA PHIẾU</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyKP()">XÓA PHIẾU</a>
    </div>
</div>
    
    <div id="dlgP" class="easyui-dialog" style="width:600px; height: 95%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgP-buttons'">
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
                    <input type="text" class="easyui-textbox" data-options="label:'Mã kỳ phiếu',labelPosition:'top' ,prompt:'Mã kỳ phiếu', height:60" style="width: 100%" id="maKyphieu" name="maKyphieu">
                </div>
                <div style="margin-bottom:10px">
                    <input type="text" class="easyui-textbox" data-options="label:'Mã người dùng',labelPosition:'top' ,prompt:'Mã người dùng', height:60" style="width: 100%" id="maND" name="maND">
                </div>
                <div style="margin-bottom:10px">
                    <input type="text" class="easyui-textbox" data-options="label:'Tên kỳ phiếu',labelPosition:'top' ,prompt:'Tên kỳ phiếu', height:60" style="width: 100%" id="tenKyphieu" name="tenKyphieu">
                </div>
                <div style="margin-bottom:10px">

                     <input type="text" class="easyui-datebox" data-options="label:'Ngày bắt đầu',labelPosition:'top' ,formatter:myformatter,parser:myparser,prompt:'Ngày bắt đầu', height:60" style="width: 100%" id="ngayBatdau" name="ngayBatdau">
                </div>
                </div>
                 <div data-options= "region:'center', split: false" style="border-width: 0px; padding-left: 20px">
         
                <div style="margin-bottom:10px">
                    <input type="text" class="easyui-datebox" data-options="label:'Ngày kết thúc',labelPosition:'top',formatter:myformatter,parser:myparser ,prompt:'Ngày kết thúc', height:60" style="width: 100%" id="ngayKetthuc" name="ngayKetthuc">

                </div>
                <div style="margin-bottom:10px">
                    <input type="text" class="easyui-textbox" data-options="label:'Tháng',labelPosition:'top' ,prompt:'Tháng', height:60" style="width: 100%" id="thang" name="thang">
                </div>
                <div style="margin-bottom:10px">
                    <input type="text" class="easyui-textbox" data-options="label:'Ghi chú',labelPosition:'top' ,prompt:'Ghi chú', height:60" style="width: 100%" id="ghichu" name="ghichu">
                </div>
            </div>
        </div>
        </form>
    </div>
    <div id="dlgP-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveKP()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgP').dialog('close')" style="width:90px">Cancel</a>
    </div>
   <script type="text/javascript">
function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
function doSearch() {
    $('#dgP').datagrid('load', {
        termKP: $('#termKP').val()
    });
}
        
var url;
function newKP() {

    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm kỳ phiếu');
    $('#fm').form('clear');
    url = 'addData.php';
    $('#dlgP').dialog('open').dialog('center').dialog('setTitle','Thêm kỳ phiếu');
    $('#fmP').form('clear');
    url = 'kyphieu/addData.php';
}
function  editKP (){
    var row = $('#dgP').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật kỳ phiếu');
        $('#fm').form('load',row);
        url = 'editData.php?maKyphieu='+row.maKyphieu;
        $('#dlgP').dialog('open').dialog('center').dialog('setTitle','Cập nhật kỳ phiếu');
        $('#fmP').form('load',row);
        url = 'kyphieu/editData.php?maKyphieu='+row.maKyphieu;
    }
}
function  saveKP () {
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
function destroyKP(){
    var row = $('#dgP').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Bạn có chắc chắn muốn xóa kỳ phiếu này?',function(r){
            if (r){
                $.post('kyphieu/deleteData.php', {maKyphieu:row.maKyphieu}, function(response){
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


