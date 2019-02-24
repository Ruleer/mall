function search(){
    var returnMsg;
    var keyword = searchCookie("keyword");
    //console.log(keyword);
    $.ajax({
        type:"GET",
        url:"php_files/search.php",
        data:{
            "keywords" : keyword,
        },
        success:function(msg){
            returnMsg = msg;
            console.log(returnMsg);
            //var data = returnMsg.split("&");
            //console.log(data);
            //addCookie("search",data);
            //window.open("goodPage.html")
        },
        error:function(xml){
            console.log(xml.status);
        },
    })
}


function searchID(keyword){
    $.ajax({
        type:"GET",
        url:"php_files/search1.php",
        data:{
            "keywords" : keyword,
        },
        success:function(msg){
            returnMsg = msg;
            // console.log(returnMsg);
            var data = returnMsg.split("&");
            //console.log(data);
            addCookie("resultID",data[0]);
        },
        error:function(xml){
            console.log(xml.status);
        },
    })
}