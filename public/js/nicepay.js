
function nicepayStart(){
    document.getElementById("vExp").value = getTomorrow();
    goPay(document.payForm);
}
//°áÁ¦ ÃÖÁ¾ ¿äÃ»½Ã ½ÇÇàµË´Ï´Ù. <<'nicepaySubmit()' ÀÌ¸§ ¼öÁ¤ ºÒ°¡´É>>
function nicepaySubmit(){
    document.payForm.submit();
}

//°áÁ¦Ã¢ Á¾·á ÇÔ¼ö <<'nicepayClose()' ÀÌ¸§ ¼öÁ¤ ºÒ°¡´É>>
function nicepayClose(){
    //alert("°áÁ¦°¡ Ãë¼Ò µÇ¾ú½À´Ï´Ù");
}

//°¡»ó°èÁÂÀÔ±Ý¸¸·áÀÏ ¼³Á¤ (today +1)
function getTomorrow(){
    var today = new Date();
    var yyyy = today.getFullYear().toString();
    var mm = (today.getMonth()+1).toString();
    var dd = (today.getDate()+1).toString();
    if(mm.length < 2){mm = '0' + mm;}
    if(dd.length < 2){dd = '0' + dd;}
    return (yyyy + mm + dd);
}
