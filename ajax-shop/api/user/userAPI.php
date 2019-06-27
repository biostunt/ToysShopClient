<?php

class userAPI{


    /**
     * userAPI конструктор. Подключается к текущей сессии клиентаа
     */
    public function __construct(){
        session_start();
    }


    /**
     * @param string $type
     * @param string $status
     *
     * Возращает json ответ по заданным параметрам
     *
     * @return string
     */
    private function compileCallBack($type,$status){
        return json_encode(array(
            "user" => $_SESSION['login'],
            "method" => "user",
            "type" => $type,
            "status" => $status
        ));
    }


    /**
     * Создаёт необходимые переменные при вызове метода, отправляет json ответ об успешном создании
     *
     * @echo string
     */
    private function createSession(){
        $_SESSION['id'] = 1;
        $_SESSION['login'] = "admin";
        $_SESSION['cart'] = array();
        echo $this->compileCallBack("session_create","created");
    }


    /**
     * @param string $itemId
     *
     * Добавляет в корзину сессии товар, присваивает ему статус "not paid"(не оплачено),
     * отправляет json ответ об успешном добавлении
     *
     * @echo string
     */
    private function addToCart($itemId){
        $_SESSION['cart'][count($_SESSION['cart'])] = array(
            "id" => $itemId,
            "status" => "not paid"
        );
        echo $this->compileCallBack("item_add_to_cart","ADDED");
    }


    /**
     *
     * Создает массив всех id товаров, хранящихся в корзине клиента.
     * @return array
     */
    public function getItemList(){
        $itemList = array();
        foreach ($_SESSION['cart'] as $value){
            $itemList[count($itemList)] = $value['id'];
        }
        return $itemList;
    }


    /**
     * @param string $itemId
     *
     * Изменяет статус товара в корзине клиента по id товара.
     */
    public function updateItemStatus($itemId){
        for($i = 0; $i < count($_SESSION['cart']);$i++)
            $itemId == $_SESSION['cart'][$i]['id'] ? $_SESSION['cart'][$i]['id'] = 'paid' : "";
    }


    /**
     *  Возращает массив всех товаров, которые лежат в корзине клиента
     *
     * @echo string
     */
    private function getItemStatusList(){
        echo json_encode($_SESSION['cart']);
    }


    /**
     * @param array $args
     *  метод вызывает соответсвующую функцию по типу обращения в аргументе
     *                                                                 $args['type']
     */
    public function run($args){
        switch ($args['type']){
            case "create":
                $this->createSession();
                break;
            case "append":
                $this->addToCart($args['item']);
                break;
            case "status":
                $this->getItemStatusList();
                break;
        }
    }
}