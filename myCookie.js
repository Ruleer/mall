//添加cookie
function addCookie(key,value,day,path,domain){
    //"key=value;expires=date;path=path;domain=domain"
    //1.路径
    var index = window.location.pathname.lastIndexOf("/");
    var currentPath = window.location.pathname.slice(0,index);
    path = path || currentPath;
    //2.domain
    domain = domain || document.domain;
    //3.时间
    if(!day){
        document.cookie = key+"="+value+";path="+path+";domain="+domain;
    }else{
        var date = new Date();
        date.setDate(date.getDate() + day);
        document.cookie = key+"="+value+";expires="+date.toGMTString()+";path="+path+";domain="+domain;
    }
    //console.log(currentPath);
}

//查询cookie
function searchCookie(key){
    var res = document.cookie.split(";");
    //console.log(res);
    for(var i=0;i<res.length;i++)
    {
        var temp = res[i].split("=");
        //console.log(temp);
        if(temp[0].trim() === key){
            return temp[1];
        }
    }
}

//删除cookie
function deleteCookie(key,path){
    addCookie(key,searchCookie(key),-1,path);
}
