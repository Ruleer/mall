//检测登入信息
var username = searchCookie("username");
//console.log(username);
var nolog = $(".logtext");
//console.log(nolog);
$(".username").hide();
$(".out").hide();
if(username != undefined){
    $(".logtext").hide();
    var user = $(".username")[0];
    //console.log(user.innerHTML);
    user.innerHTML = username;
    $(".username").show();
    $(".out").show();
}
var out = $(".out")[0];
//console.log(out);
out.onclick = function(){
    deleteCookie("username");
}

//搜索
var searchBtn = $(".btn")[0];
//console.log(searchBtn);
searchBtn.onclick = function(){
    addCookie("keyword",$(".input")[0].value);
    addCookie("pageSearch",1);
    window.open("goodPage.html");
};

//购物车
var car = $(".car")[0];
//console.log(car);
//console.log(searchCookie("username"));
car.onclick = function(){
    if(searchCookie("username") == undefined){
        alert("请先登入哦");
    }else{
        
        window.location.href = "shoppingCar.html";
    }
    
};