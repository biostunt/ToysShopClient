/**
 * @const SERVER_URL : string
 *  содержит адрес сервера
 */
const SERVER_URL = "ajax-shop/index.php";


/**
 * @param method : string
 * @param args : string
 * @param return_type : string
 * @param callback : function
 *
 *  На основе метода посылает запрос на сервер, прописанный в SERVER_URL
 *
 */
function runAjax(method, args,return_type,callback) {
    switch (method.toUpperCase()){
        case "GET":
            $.ajax({
                type : method,
                url : SERVER_URL + "?" + args,
                dataType : return_type,
                success : callback
            });
            break;
        case "POST":
            $.ajax({
                type : method,
                url : SERVER_URL,
                data : args,
                dataType : return_type,
                success : callback
            });
            break;
    }
}