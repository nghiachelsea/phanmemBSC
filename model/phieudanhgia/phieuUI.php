



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
    
    <center><table id="dgP" title="Quản lý phiếu" class="easyui-datagrid" url="phieudanhgia/getData.php" toolbar="#toolbarP" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:'100%';height:'90%';">
    <thead>
        <tr>
                 <th field="maPhieu">Mã phiếu</th>
                <th field="maKyphieu">Mã kỳ phiếu</th>
               
				<th field="tenPhieu">Tên phiếu</th>
				<th field="maTram">Mã Trạm</th>
                <th field="maQuanli">Mã quản lý</th>
                <th field="maGiamsat">Mã giám sát</th>
                <th field="maTTVT">Mã đơn vị TTVT</th>
                <th field="maTTDHTT">Mã đơn vị TTDHTT</th>
                
            </tr>
        </thead>
    </table></center>
    <div id="toolbarP">
    <div id="tbP">
        <input id="termP" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tbP2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newP()"> THÊM PHIẾU</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editP()">SỬA PHIẾU</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyP()">XÓA PHIẾU</a>
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
                 <div style="padding-top: 10px; text-align: center;">
                    <input id="maKyphieu" class="easyui-combobox" name="maKyphieu"
                        data-options="
                            valueField:'maKyphieu',
                            textField:'tenKyphieu',
                            url:'phieudanhgia/adminGetMaKp.php',
                            label:'Mã kỳ phiếu',
                            labelPosition:'top',
                            prompt:'Mã kỳ phiếu',
                            width:245, 
                            panelHeight: 'auto'">
                </div>
                <div style="margin-bottom:10px">
                    <input type="text" class="easyui-textbox" data-options="label:'Mã phiếu',labelPosition:'top' ,prompt:'Mã phiếu', height:60" style="width: 100%" id="maPhieu" name="maPhieu">
                </div>
                <div style="margin-bottom:10px">
                    <input type="text" class="easyui-textbox" data-options="label:'Tên phiếu',labelPosition:'top' ,prompt:'Tên phiếu', height:60" style="width: 100%" id="tenPhieu" name="tenPhieu">
                </div>
                <div style="padding-top: 10px; text-align: center;">
                    <input id="maTram" class="easyui-combobox" name="maTram"
                        data-options="
                            valueField:'maTram',
                            textField:'tenTram',
                            url:'phieudanhgia/adminGetTram.php',
                            label:'Mã trạm',
                            labelPosition:'top',
                            prompt:'Mã Trạm',
                            width:245, 
                            panelHeight: 'auto',
                                
                            onSelect: function (rec) {
                            var url = 'phieudanhgia/adminGetMaQl.php?maTram='+rec.maTram;
                            $('#maQuanli').combobox('reload', url);
                        }">
                </div>
                </div>
                 <div data-options= "region:'center', split: false" style="border-width: 0px; padding-left: 20px">
                 <div style="padding-top: 10px; text-align: center;">
                    <input id="maQuanli" class="easyui-combobox" name="maQuanli"
                data-options="
                    valueField:'maQuanli',
                    textField:'tenQuanli',
                    label:'Mã quản lí',
                    labelPosition:'top',
                    prompt:'Mã quản lí',
                    width:230, 
                    panelHeight: 'auto',
                     onSelect: function (rec) {
                            var url = 'phieudanhgia/adminGetMaGs.php?maQuanli='+rec.maQuanli;
                            $('#maGiamsat').combobox('reload', url);
                            var url1 = 'phieudanhgia/adminGetMaTTVT.php?maQuanli='+rec.maQuanli;
                            $('#maTTVT').combobox('reload', url1);

                        }
                    ">
                </div>
                <div style="padding-top: 10px; text-align: center;">
                    <input id="maGiamsat" class="easyui-combobox" name="maGiamsat"
                data-options="
                    valueField:'maGiamsat',
                    textField:'tenGiamsat',
                    label:'Mã giám sát',
                    labelPosition:'top',
                    prompt:'Mã giám sát',
                    width:230,
                    panelHeight: 'auto',
                      onSelect: function (rec) {
                            var url = 'phieudanhgia/adminGetMaTTDHTT.php?maGiamsat='+rec.maGiamsat;
                            $('#maTTDHTT').combobox('reload', url);

                        }">
                </div>
                   <div style="padding-top: 10px; text-align: center;">
                    <input id="maTTVT" class="easyui-combobox" name="maTTVT"
                data-options="
                    valueField:'maTTVT',
                    textField:'tenTTVT',
                    label:'Mã đơn vị TTVT',
                    labelPosition:'top',    
                    prompt:'Mã đơn vị TTVT',
                    width:230,
                    panelHeight: 'auto'">
                </div>
                
                     <div style="padding-top: 10px; text-align: center;">
                    <input id="maTTDHTT" class="easyui-combobox" name="maTTDHTT"
                data-options="
                    valueField:'maTTDHTT',
                    textField:'tenTTDHTT',
                    label:'Mã đơn vị TTDHTT',
                    labelPosition:'top',
                    prompt:'Mã đơn vị TTDHTT',
                    width:230,
                    panelHeight: 'auto'"
                    >
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

    $('#dlgP').dialog('open').dialog('center').dialog('setTitle','Thêm kỳ phiếu');
    $('#fmP').form('clear');
    url = 'phieudanhgia/addData.php';
}
function  editP (){
    var row = $('#dgP').datagrid('getSelected');
    if (row){
       
        $('#dlgP').dialog('open').dialog('center').dialog('setTitle','Cập nhật kỳ phiếu');
        $('#fmP').form('load',row);
        url = 'phieudanhgia/editData.php?maPhieu='+row.maPhieu;
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
                $.post('phieudanhgia/deleteData.php', {maPhieu:row.maPhieu}, function(response){
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


