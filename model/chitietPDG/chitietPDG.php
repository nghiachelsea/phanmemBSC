<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
           <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>

</head>
<body>
     <p> Người đánh giá: <?php include("getND.php") ?></p>
   <p> Mã Phiếu: <?php  echo $_SESSION['maPhieu']; ?></p>
    <p> Mã Chi Tiết PDG: </p>
    <p> Mã Trạm:  <?php  echo $_SESSION['maTram']; ?></p></p>
   
    <a> Ngày Đánh Giá: </a> <a id="date"></a>

<table id="dg"  >
  
    
</table>
<input type="button" id="btn" value="Xem kết quả"/><br>
         
        <script language="javascript">
            document.getElementById('btn').onclick = function()
            {
                // Khai báo tham số
                var checkbox = document.getElementsByName('ckId');
                var result = "";
                 
                // Lặp qua từng checkbox để lấy giá trị
                for (var i = 0; i < checkbox.length; i++){
                    if (checkbox[i].checked === true){
                        result += ' [' + checkbox[i].value + ']';
                    }
                }
                 
                // In ra kết quả
                alert("Các tiêu chí chưa đạt: " + result);
            };
        </script>

    <a href="javascript:void(0)" plain = "true" id="save" class="easyui-linkbutton" data-options=" iconCls:'icon-save' " >Lưu đánh giá</a>
    <a href="#" id="sent" plain="true" class="easyui-linkbutton" data-options="iconCls:'icon-redo', disabled:true">Chuyển cấp trên</a>
    <a href="javascript:void(0)" plain="true" id="resent"  class="easyui-linkbutton"  data-options="iconCls:'icon-undo' ,disabled:true" >Lấy lại phiếu đã gửi</a>
<script type="text/javascript">
    $('#save').click(function(){
       $('#sent').linkbutton('enable');
       
    })
    document.getElementById("date").innerHTML = Date();
    $(function(){
    $('#dg').datagrid({ 
        title:'Bảng Đánh Giá Các Tiêu Chí',   
        url:'getData.php',
        pagination:true,
        rownumbers:true,
        fitColumns:true, 
        nowrap: false,
        singleSelect: true,
      
        idField:'maTieuchi',
        columns:[[  {field:'tenTieuchi',title:'Tên tiêu thí',width:50}, 
        {field:'chitietTieuchi',title:'Chi tiết tiêu chí',width:50, height:50},
        {field:'maTieuchi',align: 'center',title:'Đánh giá',width:10,formatter: function(value,row,index){
            return row.tenTieuchi == "ly3" ? '<input type="checkbox" disabled="disabled" name="ckId" />'
            :'<input type="checkbox" name="ckId" value="'+value+'" />';
        }},
        {field:'action',title:'Action',width:20,align:'center',
                formatter:function(value,row,index){
                         var d = '<a href="chitietPDG.php" >Thêm hình ảnh</a>';
                        return d; }}
        ]],

        onLoadSuccess:function(){
            $("#ck_all").click(function(){
                if($(this).attr("checked"))
                {
                    var chks = $("input[name='ckId']");
                    for(var i=0;i<chks.length;i++)
                    {
                        var chkobj = $(chks[i])
                        if(!chkobj.attr("disabled"))
                        {
                            chkobj.attr("checked",true);
                        }
                        else
                        {
                           chkobj.parent().parent().parent().css({"background-color":"White"})
                        }
                    }
                }
                else
                {
                    $("input[name='ckId']").attr("checked",false);
                }
            })
        },
        onSelect:function(rowIndex, rowData){
            if(rowData.tenTieuchi == "ly3")
            {
                $("input[value='"+rowData.maTieuchi+"']").attr("checked",true);
            }
        },
        onUnselect:function(rowIndex, rowData){
            $("input[value='"+rowData.maTieuchi+"']").attr("checked",false);
        }  

    });   
})


</script>

</html>


