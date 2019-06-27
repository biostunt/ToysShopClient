

/**
 *  Метод, вызывающийся при создании страницы, отправляет ajax-запрос
 *                                              на сервер на получение товаров из корзины в сессии
 *                          компилирует строку общей цены
 */
$(document).ready(function () {
    runAjax("POST","method=goods&type=cart","xml",(xml)=>{
        $(xml).find("items").find("item").each(function (i) {
            $("#goods").append(
                "<div class='item' >"
                + "<img class='photo' src='"+ $(this).find("image").text() +"'>"
                + "<div class='item-footer'>"
                + "<h3 class='name'>"+ $(this).find("name").text() +"</h3>"
                + "<h3 class='price'>₽" + $(this).find("price").text() + "</h3>"
                + "</div>"
                + "</div>");
            $("#totalPrice")
                .text($("#totalPrice")
                        .text()
                        .split(": ")[0]
                    + ": "
                    + (Number($("#totalPrice")
                            .text()
                            .split(": ")[1])
                        + Number($(this)
                            .find("price")
                            .text())));
        })
    });
});


/**
 *  Метод, вызывающийся при нажатии на кнопку "Оплатить"
 *                  Делает ajax-запрос на сервер об оплате заказа
 *
 */
$(document).on('click',".to-cart",()=>{
    runAjax("GET","method=pay&type=pay","json",(json) => {
        if(json['state'] === "OK"){
            $(".to-cart").hide();
            createNotification("Платеж оплачен!",'#fff503')
        }
    });
});


/**
 *  Метод, вызывающийся при нажатии на кнопку "Заказать"
 *                  Делает ajax-запрос на сервер о создании заказа
 *                      Создает уведомление о статусе создания заказа
 *
 */
$(document).on('click','#cart',function () {
    runAjax("POST","method=pay&type=create","json",(json) =>{
        if(json['state'] !== "OK"){
            createNotification("Произошла ошибка!","#ff2100")
        } else {
            createNotification("Заказ создан!",'#fff503');
            $("#cart").hide();
            createPriceList();
        }
    });
});


/**
 * Метод создает элемент , в котором выводятся все элементы, в чеке
 *                      делает ajax-запрос на сервер о создании элементов на сервер
 */
function createPriceList(){
    $("#main").show();
    runAjax("POST","method=goods&type=cart","xml",(xml) =>{
        $(xml).find("items").find("item").each(function (i) {
            $("#main").append(
                "<div class='.element'>"
                    + $(this).find("name").text()
                    + " = "
                    + $(this).find("price").text()
                    + "</div>")});
        $("#main").append("<a class='to-cart'>Оплатить</a>");
    });
}