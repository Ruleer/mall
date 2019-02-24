function createPage(totalPage){
    console.log(totalPage);
    var t;
    for(t=0;t<totalPage;t++){
        var apage = document.createElement("button");
        apage.className = "pagebtn page-"+(t+1);
        //console.log(apage);
        apage.innerHTML = t+1;
        $(".page-container")[0].appendChild(apage);
    }
}