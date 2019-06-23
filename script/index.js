function setCookie(args = [['id','1'],['login','admin']]) {
    args.forEach(function (set) {
        document.cookie = set[0] + "=" + set[1];
    });
}
function appendCookie(key,value) {
    document.cookie = key + "=" + value;
}
function getCookie(){
    return document.cookie;
}

//create Item
// n - name; p - price; s - image source
function createItem(n, p, s){
    var item = document.createElement("div");
    item.className = "item";
    var photo = document.createElement("img");
    photo.className = "photo";
    photo.src = s;
    item.appendChild(photo);
    var footer = document.createElement("div");
    footer.className = "item-footer";
    var name = document.createElement("h3");
    name.className = "name";
    name.innerText = n;
    var price = document.createElement("h3");
    price.className = "price";
    price.innerText = p;
    var button = document.createElement("a");
    button.className = "to-cart";
    button.innerText = "В корзину";
    footer.appendChild(name);
    footer.appendChild(price);
    footer.appendChild(button);
    item.appendChild(footer);
    document.getElementById("goods").appendChild(item);
}

window.onload = function () {
    setCookie();
    // ajax загрузка всех картинок и элементов
    for(var i = 0; i < 10; i ++){
        createItem("ИМя" + i, "$" + i, "https://html5book.ru/wp-content/uploads/2015/10/black-dress.jpg");
    }
};