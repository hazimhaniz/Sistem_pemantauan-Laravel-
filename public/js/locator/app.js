
var locatorPopupUrl = "https://geolocator.doe.gov.my/locatorapp/locator/main.html";
var locationQueryUrl = "https://geolocator.doe.gov.my/manager";
var formName = "ekaslocator";

var timergeo = null;
var geolocatorWin = null;

guid = function () {
    function s4() {
        var d = new Date();
        var n = d.getMilliseconds();
        return Math.floor((n/1000 + Math.random()) * 0x10000).toString(16).substring(1);
    }
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}

populateFields= function(data){
    clearFormData();
    if(data && data.length && data.length> 0 ){
        for (let i = 0; i < data.length; i++) {
            const element = data[i];
            if(document.getElementById(element[0]))document.getElementById(element[0]).value = element[1];
        }
    }
    if(geolocatorWin)geolocatorWin.close();
    geolocatorWin = null;
}
clearFormData = function(){
    for (let i = 0; i < $(":text").length; i++) {
        $(":text")[i].value = "";
    }
}

queryAndPopulateResults= function(uniqueId){
    requestProc = function () {
        $.ajax({
            type: 'POST',
            url: locationQueryUrl +"/layer/queryContent",
            dataType: 'json',
            data: {id:uniqueId},
            timeout: 7000,
            success: function (res) {
                if(res.code == 200){
                    if(res.data && res.data.content)populateFields(JSON.parse(res.data.content));
                }
            },
            error: function (jqXHR, textStatus, error) {
                console.error("ajax get geo location failed, status: " + textStatus + ", error: " + error)
            }
        });
    };
    requestProc();
}
getLocationXY = function(){
    var str = "";
    if((document.getElementById("longitude") && document.getElementById("longitude").value != "") && (document.getElementById("latitude") && document.getElementById("latitude").value !="")){
        str = document.getElementById("longitude").value +","+document.getElementById("latitude").value;
    }
    return str;
}

 openPopup=function(){
    var uniqueId = guid();
    var location = getLocationXY();
    geolocatorWin = window.open(locatorPopupUrl + "?formId="+uniqueId+"&formType="+formName+"&formXY="+location, '_blank', 'location=no,height=570,width=840,scrollbars=yes,status=yes');
    timergeo = window.setInterval(function() {
        if(geolocatorWin.closed) {
            clearInterval(timergeo);
            queryAndPopulateResults(uniqueId);
        }
    }, 500);
}
document.getElementById("geobutton").addEventListener("click", openPopup);