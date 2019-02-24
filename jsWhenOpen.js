//开始隐藏logo2
//$(".logo2").hide();
    
//检测登入信息
var username = searchCookie("username");
    //console.log(username);
    //console.log(nolog);
    if(username != undefined){
        var user = $(".username")[0];
        //console.log(user.innerHTML);
        user.innerHTML = username;
    }
    var out = $(".out")[0];
    //console.log(out);
    out.onclick = function(){
        deleteCookie("username");
        quit();
        window.location.href = "/main.html";
    }
    
//主页显示
var logo = $(".logo1");
//console.log(logo);
logo.on("mouseover",function(){
    //$(".logo1").hide();
    //$(".logo2").fadeIn("slow");
    $(".logo1")[0].src = "/img/home2.png";
    //console.log($(".logo1")[0]);
})
logo.on("mouseout",function(){
    //$(".logo2").hide();
    //$(".logo1").fadeIn("slow");
    $(".logo1")[0].src = "/img/logo.png";
})

//回主页
logo[0].onclick = function (){
    window.location.href = "/main.html";
}