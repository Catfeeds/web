$(function(){
    jQuery(".fourClass").slide({mainCell:".fourBd ul",autoPlay:true,effect:"leftLoop",vis:4,scroll:1,autoPage:true});
});
//发送验证码
function sendYzm(e) {
    var phone = $("#phone").val();
    var phoneReg = /((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/;
    if (!phone) {
        alert("请输入手机号!");
        return false;
    } else if (!phoneReg.test(phone)) {
        alert("手机号格式不正确!");
        return false;
    } else {
        $.post('/cn/api/phone-code', {phoneNum: phone, type: 1}, function (re) {
            if (re.code == 1) {
                var _that = $(e);
                var defalutVal = $(e).val();
                var timeNum = 60;
                $(e).attr("disabled", true);
                _that.unbind("click").val(timeNum + "秒后重发");
                var timer = setInterval(function () {
                    _that.val(timeNum + "秒后重发");
                    timeNum--;
                    if (timeNum < 0) {
                        clearInterval(timer);
                        $(e).removeAttr("disabled");
                        _that.val(defalutVal);
                        _that.bind("click", e, sendYzm);

                    }
                }, 1000);
            } else {
                alert(re.message)
            }
        }, "json");
    }

}

function subInformation() {
    var phone = $('#phone').val();
    var name = $('#name').val();
    var code = $('#code').val();
    if (phone && name && code) {
        $.post('/cn/api/receive-courses', {phone: phone, name: name, code: code}, function (re) {
            alert(re.message);
        }, "json")
    } else {
        alert("请填写领取相关信息");
        return false;
    }
}
