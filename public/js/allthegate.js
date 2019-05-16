StartSmartUpdate();
$('#pay').click(function () {
    var form = $('.frmAGS_pay');

    if (document.AGSPay == null || document.AGSPay.object == null) {
        alert("ÇÃ·¯±×ÀÎ ¼³Ä¡ ÈÄ ´Ù½Ã ½Ãµµ ÇÏ½Ê½Ã¿À.");
    } else {
        $('input[name=DeviId]').val("9000400001");


        MakePayMessage(form);
    }
});
function Enable_Flag(form) {
    form.Flag.value = "enable"
}
function Disable_Flag(form) {
    form.Flag.value = "disable"
}
function Check_Common(form) {
    if (form.StoreId.value == "") {

        return false;
    }
    else if (form.StoreNm.value == "") {
        alert("»óÁ¡¸íÀ» ÀÔ·ÂÇÏ½Ê½Ã¿À.");
        return false;
    }
    else if (form.OrdNo.value == "") {
        alert("ÁÖ¹®¹øÈ£¸¦ ÀÔ·ÂÇÏ½Ê½Ã¿À.");
        return false;
    }
    else if (form.ProdNm.value == "") {
        alert("»óÇ°¸íÀ» ÀÔ·ÂÇÏ½Ê½Ã¿À.");
        return false;
    }
    else if (form.Amt.value == "") {
        alert("±Ý¾×À» ÀÔ·ÂÇÏ½Ê½Ã¿À.");
        return false;
    }
    else if (form.MallUrl.value == "") {
        alert("»óÁ¡URLÀ» ÀÔ·ÂÇÏ½Ê½Ã¿À.");
        return false;
    }
    return true;
}