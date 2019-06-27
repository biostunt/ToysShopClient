<?php

require_once "database/databaseAPI.php";
require_once "transaction/transactionAPI.php";
require_once "user/userAPI.php";
require_once "goods/goodsAPI.php";

class SDK{


    /**
     *
     *  SDK обычный конструктор
     */
    public function __construct(){}


    /**
     * @see goodsAPI::run()
     * @see transactionAPI::run()
     * @see userAPI::run()
     * @param array $args
     *  метод вызывает соответсвующий метод по методу в запросе, в именно $args['method']
     */
    public function run($args){
        switch ($args['method']){
            case "goods":
                (new goodsAPI())->run($args);
                break;
            case "pay":
                (new transactionAPI())->run($args);
                break;
            case "user":
                (new userAPI())->run($args);
                break;
        }
    }
}