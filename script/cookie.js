
function getCookie(){
    return document.cookie;
}

function setCookie(args = {"id":1,"login":admin,"expires":1}) {
    args.forEach(function (key,value) {
        document.cookie = key + "=" + value;
    });
}

function appendCookie() {

}
function deleteCookie() {

}
function deleteCookieKey() {

}