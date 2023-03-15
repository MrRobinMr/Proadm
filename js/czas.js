function zegar(){
    d = new Date();
    var h=d.getHours(),m=d.getMinutes(),s=d.getSeconds(),r;
    r=(h<10?"0"+h:h)+":"+(m<10?"0"+m:m)+":"+(s<10?"0"+s:s);
    
    document.getElementById('czas').innerHTML=r;
    setTimeout("zegar()", 1000);
}