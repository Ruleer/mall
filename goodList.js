//创建商品卡片
function listGood(){
    var goods = $(".good-container")[0];
    var module = document.createElement("div");
    var name = document.createElement("div");
    var image = document.createElement("img");
    var introduction = document.createElement("span");
    var price = document.createElement("div");
    var priceN = document.createElement("div");
    var priceW = document.createElement("div");
    var add = document.createElement("div");
    var code = goodInformation.productid;
    add.className = "add";
    add.innerHTML = "加入购物车";
    name.className = "name";
    name.innerHTML = goodInformation.productname;
    name.code = goodInformation.productid;
    image.className = "img";
    image.code = goodInformation.productid;
    image.src = goodInformation.imageway;
    introduction.className = "introduction";
    introduction.innerHTML = goodInformation.introduction;
    price.className = "prise";
    priceN.className = "prise-num";
    priceN.innerHTML = goodInformation.price;
    priceW.className = "prise-word";
    priceW.innerHTML = "元";
    module.className = "good";
    module.appendChild(add);
    module.appendChild(image);
    module.appendChild(name);
    price.appendChild(priceN);
    price.appendChild(priceW);
    module.appendChild(price);
    module.appendChild(introduction);
    module.setAttribute("code",code);
    goods.appendChild(module);
    //console.log(module);
    addToCar();
}

//加入购物车
function addToCar(){
    $(".add").click(function (){
        //console.log(this.parentNode.getAttribute("code"));
        $.ajax({
            type:"get",
            url:"php_files/insert_cart.php",
            data:"productid="+this.parentNode.getAttribute("code"),
            success:function(msg){
                console.log(msg);
            },
            error:function(xml){
                console.log(xml.status);
            }
        })
    })
}