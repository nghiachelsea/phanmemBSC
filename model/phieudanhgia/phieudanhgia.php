<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic DataGrid - jQuery EasyUI Demo</title>
           <link rel="stylesheet" type="text/css" href="../../lib/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../lib/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../../lib/demo/demo.css">
    <script type="text/javascript" src="../../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/jquery.easyui.min.js"></script>

</head>
<body>
 
<table id="dg">
     <p> Mã Phiếu: </p>
    <p> Mã Chi Tiết PDG: </p>
    <p> Mã Trạm: </p>
    <p> Người đánh giá: <?php include("getND.php") ?></p>
    <a> Ngày Đánh Giá: </a> <a id="date"></a>
</table>
<script type="text/javascript">
    document.getElementById("date").innerHTML = Date();
    $(function(){
    $('#dg').datagrid({ 
        title:'Bảng Đánh Giá Các Tiêu Chí',   
        url:'getData.php',
        pagination:true,
        rownumbers:true,
        fitColumns:true, 
        nowrap: false,
      
        idField:'maTieuchi',
        columns:[[  {field:'tenTieuchi',title:'Tên tiêu thí',width:50}, 
        {field:'chitietTieuchi',title:'Chi tiết tiêu chí',width:50, height:50},
        {field:'maTieuchi',align: 'center',title:'Đánh giá',width:10,formatter: function(value,row,index){
            return row.tenTieuchi == "ly3" ? '<input type="checkbox" disabled="disabled" name="ckId" />'
            :'<input type="checkbox" name="ckId" value="'+value+'" />';
        }}
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
            if(rowData.tenTieuchi != "ly3")
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


