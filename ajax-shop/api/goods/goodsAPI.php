<?php
    require_once "api/database/databaseAPI.php";
    require_once "api/user/userAPI.php";
class goodsAPI{


    /**
     * @var databaseAPI $DATABASE
     * переменная для хранения databaseAPI объекта
     */
    var $DATABASE;


    /**
     * goodsAPI конструктор. создает объект типа databaseAPI
     */
    public function __construct(){
        $this->DATABASE = new databaseAPI();
    }


    /**
     * Метод делает запрос на получение элементов из бд таблице `goods`
     *  Конвертирует данные в XML объект
     * @echo DOMDocument в текстовом формате
     */
    private function getAllItems(){
        $itemList = $this->DATABASE->execute("SELECT * FROM `goods`");
        echo $this->compileXML($itemList)->saveHTML();
    }


    /**
     * @param array $idList
     * Метод делает запрос на получение определенных элементов из бд по `id` в таблице `goods`
     *  Конвертирует данные в XML объект
     * @echo DOMDocument в текстовом формате
     */

    private function getSpecificItems($idList){
        $itemList = array();
        for($i = 0; $i < count($idList); $i++){
            $itemList[$i] = $this->DATABASE->execute("SELECT * FROM `goods` WHERE id = ".((int) $idList[$i]))[0];
        }
        echo $this->compileXML($itemList)->saveHTML();
    }

    /**
     * @param array $args
     *  метод вызывает соответсвующую функцию по типу обращения в аргументе
     *                                                                 $args['type']
     */
    public function run($args){
        switch ($args['type']){
            case "all":
                $this->getAllItems();
                break;
            case "cart":
                $this->getSpecificItems((new userAPI())->getItemList());
                break;
        }
    }


    /**
     * @param array $list
     *  Метод создает DomDocument, где корень <items></items>,
     *                                                  а каждый наследник - <item></item> с заданными параметрами.
     * @return DOMDocument
     */
    private function compileXML($list){
        $output = new domDocument("1.0", "utf-8");
        $items = $output->createElement("items");
        $output->appendChild($items);
        foreach ($list as $listItem){
            if($listItem != NULL){
                $item = $output->createElement("item");
                foreach ($listItem as $key => $value){
                    $node = $output->createElement($key,$value);
                    $item->appendChild($node);
                }
                $items->appendChild($item);
            }
        }
        return $output;
    }
}