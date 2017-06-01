$(function(){
//    控制表格标题的宽度
    $(".info-title ul li:nth-child(1)").css("width",$(".course-col:nth-child(1) ul li:nth-child(1)").width());
    $(".info-title ul li:nth-child(2)").css("width",$(".course-col:nth-child(1) ul li:nth-child(2)").width());
    $(".info-title ul li:nth-child(3)").css("width",$(".course-col:nth-child(1) ul li:nth-child(3)").width());
    $(".info-title ul li:nth-child(4)").css("width",$(".course-col:nth-child(1) ul li:nth-child(4)").width());
    $(".info-title ul li:nth-child(5)").css("width",$(".course-col:nth-child(1) ul li:nth-child(5)").width());
});

//删除订单
function deleteCourseRecord(o){
    $(o).parents("li.topLi").remove();
}