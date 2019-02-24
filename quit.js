function quit(){
    $.ajax({
        type:"GET",
        url:"php_files/quit.php",
        success:function(msg){
            alert(msg);
            window.location.href = "/main.html";
        },
        error:function(xml){
            console.log(xml.status);
        }
    })
}