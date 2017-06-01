$(function(){
      $("#allCheck").change(function(){allChecked(this);});//上边的全选
      $("#allC").change(function(){allChecked(this);});//下边的全选
    oneChecked();

});
//单选
function oneChecked(){
    //单独选择复选框
    $(".catContent table tr:not(:first-child) td").each(function(){
        $(this).find("input[type]:checkbox").change(function(){
            var xiaoji=$(this).parents("td").siblings("td").find(".subtotal span").html();
            var nums= $(this).parents("td").siblings("td").find(".calculate span").html();
            var totalPiece=null;
            var allXJ=null;
            if(this.checked==true){
                totalPiece=parseInt($("#piece").html())+parseInt(nums);
                allXJ=parseFloat($("#lastTotal").html())+parseFloat(xiaoji);
            }else{
                totalPiece=parseInt($("#piece").html())-parseInt(nums);
                allXJ=parseFloat($("#lastTotal").html())-parseFloat(xiaoji);
            }
            $("#lastTotal").html(allXJ);
            $("#piece").html(totalPiece);
            //判断全选框选中与否
            if($(".catContent table tr:not(:first-child) td input:checked").length==0){
                $(".catContent table tr:first-child th input").attr("checked",false);
                $(".catContent table tr:first-child th input").prop("checked",false);
                $("#allC").attr("checked",false);
                $("#allC").prop("checked",false);
            }
            if($(".catContent table tr:not(:first-child) td input:checked").length==
                $(".catContent table tr:not(:first-child) td:first-child input").length){
                $(".catContent table tr:first-child th input").attr("checked",true);
                $(".catContent table tr:first-child th input").prop("checked",true);
                $("#allC").attr("checked",true);
                $("#allC").prop("checked",true);
            }else{
                $(".catContent table tr:first-child th input").attr("checked",false);
                $(".catContent table tr:first-child th input").prop("checked",false);
                $("#allC").attr("checked",false);
                $("#allC").prop("checked",false);
            }
        });
    });
}
//全选
function allChecked(o){
    var tds=$(".catContent table tr:not(:first-child) td");
    var num=0;
    var allXJ=0;
    if(o.checked==true){
        tds.each(function(){
            var jmNum=$(this).siblings("td").find(".calculate span").html();
            var xiaoji=$(this).siblings("td").find(".subtotal span").html();
            $(this).find("input[type]:checkbox").attr("checked","checked");
            $(this).find("input[type]:checkbox").prop("checked",true);
            if($(this).find("input[type]:checkbox").is(":checked")==true){
                num=num+parseInt(jmNum);
                allXJ=allXJ+parseInt(xiaoji);
            }
        });
    }else{
        tds.each(function(){
            $(this).find("input[type]:checkbox").removeAttr("checked");
            $(this).find("input[type]:checkbox").prop("checked",false);
        });
    }
    $("#lastTotal").html(allXJ);
    $("#piece").html(num);
}

//计算减法
function subFun(o){
    var goodsId=$(o).attr("data-id");//商品Id
    var _type=$(o).attr("data-type");//商品类型
    var oldVal=$(o).next("span").html();//要改变的数量
    var subtotals=$(o).parents("td").prev("td").find("span span").html();//单价
    if(oldVal>1){
        oldVal--;
        $.post('/cn/api/cart-change-num',{goodsId:goodsId,type:_type,num:oldVal},function(re){
            if(re.code == 1){
                //计算合计
                $(o).parents("td").next("td").find(".subtotal span").html(subtotals*oldVal);
                if($(o).parents("td").siblings("td").find("input")[0].checked){
                    var addT=$("#lastTotal").html();
                    var addPi=$("#piece").html();
                    $("#lastTotal").html(parseFloat(addT)-parseFloat(subtotals));
                    $("#piece").html(parseFloat(addPi)-1);
                }
            }
        },'json')

    }else{
        alert("已经到底啦！不能再减了");
    }
    $(o).next("span").html(oldVal);

}

//计算加法
function addFun(o){
    var goodsId=$(o).attr("data-id");//商品Id
    var _type=$(o).attr("data-type");//商品类型
    var oldVal=$(o).prev("span").html();//要改变的数量
    var subtotals=$(o).parents("td").prev("td").find("span span").html();//单价
        oldVal++;
    $.post('/cn/api/cart-change-num',{goodsId:goodsId,type:_type,num:oldVal},function(re){
        //计算合计
        $(o).parents("td").next("td").find(".subtotal span").html(subtotals*oldVal);
        $(o).prev("span").html(oldVal);
        if($(o).parents("td").siblings("td").find("input")[0].checked){
            var addT=$("#lastTotal").html();
            var addPi=$("#piece").html();
            $("#lastTotal").html(parseFloat(addT)+parseFloat(subtotals));
            $("#piece").html(parseFloat(addPi)+1);
        }
    },'json')


}
//删除记录
function deleteRecord(o){
    var goodsId=$(o).attr("data-id");//商品Id
    var _type=$(o).attr("data-type");//商品类型
    $.post('/cn/api/delete-cart',{goodsId:goodsId,type:_type},function(re){
        $(o).parents("tr").remove();
        //计算合计
        var xiaoji=$(o).parents("td").siblings("td").find(".subtotal span").html();
        var num=$(o).parents("td").siblings("td").find(".calculate span").html();
        $("#lastTotal").html(parseFloat( $("#lastTotal").html())-parseFloat(xiaoji));
        $("#piece").html(parseInt( $("#piece").html())-parseInt(num));
    },'json')
}
//删除选中产品
function deleteChecked(){
    var arrId=[];
    var arrType=[];
    $(".catContent table tr:not(:first-child)").each(function(){
        var _that=$(this);
            if(_that.find("td input")[0].checked){
                arrId.push(_that.find("td:last-child a.redColor").attr("data-id"));
                arrType.push(_that.find("td:last-child a.redColor").attr("data-type"));
            }
    });
    $.post('/cn/api/delete-cart',{goodsId:arrId,type:arrType},function(re){
        if(re.code==1){
            //删除成功
            $(".catContent table tr:not(:first-child)").each(function(){
                var _that=$(this);
                if(_that.find("td input")[0].checked){
                    _that.remove();
                    //计算合计
                    var xiaoji=_that.find("td .subtotal span").html();
                    var num=_that.find("td .calculate span").html();
                    $("#lastTotal").html(parseFloat( $("#lastTotal").html())-parseFloat(xiaoji));
                    $("#piece").html(parseInt( $("#piece").html())-parseInt(num));
                }
            });
        }
    },'json');
}