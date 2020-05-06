(function(){
   setInterval(nowTime,300);
})();
function nowTime(){
    var time=new Date(Date.now());
    var hour=time.getHours();
    var mini = time.getMinutes();
    var seccond=time.getSeconds();
    var year=time.getFullYear();
    var month=time.getMonth()+1;
    var day=time.getDate();
    var today=time.getDay();
    var str_day=['日','一','二','三','四','五','六'];
    if(hour>12)
    {
        var apm="PM";
        hour=hour-12;
    }else{
        var apm="AM"
    }
    if(hour<10)
    {
         hour="0"+hour;
    }
    if(day<10)
    {
        day="0"+day;
    }
    if(month<10)
    {
        month="0"+month;
    }
    if(mini<10)mini="0"+mini;
    if(seccond<10)seccond="0"+seccond;
    $('#b_time').html("<h2><span>"+apm+"</span>"+hour+":"+mini+":"+seccond+"</h2>");
    $('#date').html("<h3>"+year+"-"+month+"-"+day+"<span>星期"+str_day[today]+"</span></h3>");
    $('#info').html("<p><span class='col-sm-12 d-xs-block d-sm-inline-block py-xs-3 py-sm-0'><i class='far fa-clock mr-1'></i>"+year+"-"+month+"-"+day+" "+hour+":"+mini+":"+seccond+"</span></p>");

}
