

/**
 *  Метод, вызывающийся при создании страницы, отправляет ajax-запрос на сервер на получение товаров
 *                                             отправляет ajax-запрос на сервер на создание сессии
 */
$(document).ready(function () {
    runAjax("POST", "method=goods&type=all", "xml", (xml) => {
        $(xml).find("items").find("item").each(function (i) {
            $("#goods").append(
                "<div class='item' >"
                + "<img class='photo' src='" + $(this).find("image").text() + "'>"
                + "<div class='item-footer'>"
                + "<h3 class='name'>" + $(this).find("name").text() + "</h3>"
                + "<h3 class='price'>₽" + $(this).find("price").text() + "</h3>"
                + "<a class='to-cart' id='"+ $(this).find("id").text() +"'>В корзину</a>"
                + "</div>"
                + "</div>");
        });
    });
    runAjax("POST","method=user&type=create","text",()=>{});
});


/**
 *  Метод, вызывающийся при нажатии на кнопку "В корзину" у товара, отправляет ajax-запрос на добавление в корзину товара
 *
 */
$(document).on('click','.to-cart',function () {
    let id = $(this).attr("id");
    runAjax("POST","method=user&type=append&item=" + id,"json",(data)=>{});
    $(this).text("В корзине");
    $(this).attr('class','to-cart-in');
});


/**
 *  Метод, вызывающийся при нажатии на кнопку "В корзине" у товара, перенаправляет человека в корзину
 *
 */
$(document).on('click','.to-cart-in',function () {
    location.href = 'cart.php';
});
/**
 *  Метод, вызывающийся при нажатии на кнопку "В корзину" в Header, перенаправляет человека в корзину
 *
 */
$(document).on('click','#cart',function () {
    location.href = 'cart.php';
});




