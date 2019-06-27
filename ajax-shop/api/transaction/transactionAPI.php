<?php
    require_once "api/user/userAPI.php";

class transactionAPI{


    /**
     * @var string $DEFAULT_GATEWAY
     * переменная для хранения string, указывающая на сервер транзакции
     */
    var $DEFAULT_GATEWAY = "https://ya.ru/";


    /**
     * @var array $STATUS
     * массив хранения ответов на заданные коды ответа от сервера транзакций
     */
    var $STATUS = array(
        200 => "OK"
    );


    /**
     * transactionAPI конструктор. Подключается к текущей сессии клиентаа
     */
    public function __construct(){
        session_start();
    }


    /**
     * метод, посылающий запрос на транзакцию с id транзакции(_она хранится в переменной сессии_)
     *                          меняет статус заказа на оплачено
     *                              получает код-ответ сервера
     */
    public function pay(){
        $ch = curl_init($this->DEFAULT_GATEWAY."?transaction=".$_SESSION['orderId']['orderId']);
        $this->setChannelOptions($ch);
        curl_exec($ch);
        $this->getStatusCode($ch);
        $_SESSION['orderId']['status'] = 'paid';
        curl_close($ch);
    }

    /**
     * Метод создаёт id транзакции на основе id товаров в корзине (_имитация_)
     *                          Создаем переменную в сессии клиента о транзакции
     * @echo json объект
     */
    public function createOrder(){
        $orderId = "";
        for($i = 0; $i < count($_SESSION['cart']);$i++){
            $item = $_SESSION['cart'][$i];
            if($item['status'] == "not paid") $orderId = $orderId.$item['id'];
        }
        $_SESSION['orderId'] = array(
            "orderId" => $orderId,
            "status" => "not paid"
        );
        echo $this->compileAnswer("create_order","OK");
    }


    /**
     * @param resource $channel
     *
     *  Настраивает параметры curl - канала
     */
    private function setChannelOptions($channel){
        curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($channel,CURLOPT_TIMEOUT,10);
        curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($channel, CURLOPT_HEADER, false);
    }


    /**
     * @param resource $channel
     *
     *  получает код-ответ сервера и происходит выборка из переменной $STATUS(см. начало)
     *  @echo json объект о действии и результат
     */
    private function getStatusCode($channel){
        if(curl_getinfo($channel, CURLINFO_HTTP_CODE) == 200)
            echo $this->compileAnswer("pay",$this->STATUS[curl_getinfo($channel, CURLINFO_HTTP_CODE)]);
        else
            echo $this->compileAnswer("pay","BAD");
    }


    /**
     * @param string $action
     * @param string $result
     *
     * компилирует json объект ответа об операции с заданными параметрами
     *
     * @return string
     */
    private function compileAnswer($action,$result){
        return json_encode(array(
            "action" => $action,
            "state" => $result
        ));
    }

    /**
     * @see userAPI::getItemList()
     * @see userAPI::updateItemStatus()
     * @see transactionAPI::pay()
     *
     * Метод производит оплату, меняет статус всех предметов в корзине на "paid"(оплачено)
     */
    public function createTransaction(){
        $userAPI = new userAPI();
        $items = $userAPI->getItemList();
        $this->pay();
        foreach ($items as $item)
            $userAPI->updateItemStatus($item);
    }


    /**
     * @param array $args
     *  метод вызывает соответсвующую функцию по типу обращения в аргументе
     *                                                                 $args['type']
     */
    public function run($args){
        if($args['type']){
            switch ($args['type']){
                case "pay":
                    $this->createTransaction();
                    break;
                case "create":
                    $this->createOrder();
                    break;
            }
        }
    }

}