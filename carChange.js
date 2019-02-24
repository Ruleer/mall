//购物车添加
function show(data,i){
    goodInformation = JSON.parse(data[i]);
    console.log(goodInformation);
    var good = document.createElement("div");
    var select = document.createElement("div");
    var input1 = document.createElement("input");
    var img = document.createElement("div");
    var photo = document.createElement("img");
    var name =document.createElement("h4");
    var onePrice = document.createElement("h4");
    var num = document.createElement("div");
    var btn1 = document.createElement("button");
    var input2 = document.createElement("input");
    var btn2 = document.createElement("button");
    var allPrice = document.createElement("h4");
    var del = document.createElement("div");
    var btn3 = document.createElement("button");
    good.className = "good";
    select.className = "item select";
    input1.type = "radio";
    input1.className = "select-btn";
    input1.want = false;
    img.className = "item img";
    img.code = goodInformation.productid;
    photo.src = goodInformation.imageway;
    photo.className = "picture";
    name.className = "item name";
    name.code = goodInformation.productid;
    name.innerHTML = goodInformation.productname;
    onePrice.className = "item one-price";
    onePrice.innerHTML = goodInformation.price;
    num.className = "item num";
    btn1.className = "down";
    btn1.innerHTML = "-";
    input2.className = "input";
    input2.type = "number";
    input2.value = goodInformation.count;
    //console.log(input2.value);
    btn2.className = "add";
    btn2.innerHTML = "+";
    allPrice.className = "item all-price";
    allPrice.innerHTML = parseFloat(goodInformation.price)*parseInt(goodInformation.count);
    del.className = "item delete";
    btn3.className = "btn";
    btn3.innerHTML = "删除";
    select.appendChild(input1);
    img.appendChild(photo);
    num.appendChild(btn1);
    num.appendChild(input2);
    num.appendChild(btn2);
    del.appendChild(btn3);
    good.appendChild(select);
    good.appendChild(img);
    good.appendChild(name);
    good.appendChild(onePrice);
    good.appendChild(num);
    good.appendChild(allPrice);
    good.appendChild(del);
    $(".mid-container")[0].appendChild(good);
    
}


//每次改变重新计算-选择
function reCalculate(radio){
    var select=0;
    var sum=0;
    for(var x=0;x<radio.length;x++){
        //console.log(radio[x].parentNode.parentNode);
        var num;
        var money;
        num = parseInt(radio[x].parentNode.parentNode.childNodes[4].childNodes[1].value);
        //console.log(num);
        money = parseFloat(radio[x].parentNode.parentNode.childNodes[5].innerHTML);
        //console.log(money);
        if(radio[x].want === true){
            select += num;
            sum += money;
        }
    }
    //console.log(select);
    //console.log(sum);
    $(".num-all")[0].innerHTML = select;
    $(".num-price")[0].innerHTML = sum;
}


//每次改变重新计算-修改数量后
function reCalculateNum(){
    var radio = $(".select-btn");
    console.log(radio);
    var select=0;
    var sum=0;
    for(var x=0;x<radio.length;x++){
        //console.log(radio[x].parentNode.parentNode);
        var num;
        var money;
        num = parseInt(radio[x].parentNode.parentNode.childNodes[4].childNodes[1].value);
        //console.log(num);
        money = parseFloat(radio[x].parentNode.parentNode.childNodes[5].innerHTML);
        //console.log(money);
        if(radio[x].want === true){
            select += num;
            sum += money;
        }
    }
    console.log(select);
    //console.log(sum);
    $(".num-all")[0].innerHTML = select;
    $(".num-price")[0].innerHTML = sum;
    
}


//购物车物品数量改变
function numChange(a){
    $.ajax({
        type:"get",
        url:"php_files/update_cart.php",
        data:{
            "productid" : a.parentNode.parentNode.childNodes[2].code,
            "username" : searchCookie("username"),
            "count" : a.value,
        },
        success : function(msg){
            console.log(msg);
        },
        error : function(xml){
            console.log(xml.status);
        },
    })
}


//删除
function carDelete(btn){
    $.ajax({
        type:"get",
        url:"php_files/delete_cart.php",
        data:{
            "productid" : btn.parentNode.parentNode.childNodes[2].code,
        },
        success : function(msg){
            console.log(msg);
        },
        error : function(xml){
            console.log(xml.status);
        },
    })
}