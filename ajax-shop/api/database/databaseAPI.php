<?php
    class databaseAPI{
        /**
         * @var string $CONFIG_PATH
         * Файл с параметрами подключения к Базе данных.
         */
        var $CONFIG_PATH = "api/database/config.json";


        /**
         * @var mysqli $SQL
         *  Переменная для хранения активного подключения к базе данных.
         */
        var $SQL;


        /**
         * databaseAPI инициализатор. Достаёт параметры для подлючения к бд, а именно:
         *                                           host : string, login : string, password : string, db_name : string
         */
        private function initialize(){
            $config = json_decode(file_get_contents($this->CONFIG_PATH),true);
            $this->createHandle($config['host'],$config['login'],$config['password'],$config['db_name']);
        }


        /**
         * @param string $HOST
         * @param string $LOGIN
         * @param string $PASSWORD
         * @param string $DB_NAME
         *
         *  Создается подключение к базе данных и записывается в SQL
         */
        private function createHandle($HOST,$LOGIN,$PASSWORD,$DB_NAME){
            $this->SQL =mysqli_connect($HOST,$LOGIN,$PASSWORD,$DB_NAME);
        }


        /**
         * databaseAPI конструктор
         *  Вызывается инициализатор класса
         */
        public function __construct(){
            $this->initialize();
        }


        /**
         *@param string $statement
         *
         * Делает запрос к базе данных
         *
         * @return array массив, который содержит в себе данные по запросу от базы данных
         */
        public function execute($statement){
            return $this->compileList(mysqli_query($this->SQL, $statement));
        }


        /**
         *@param bool|mysqli_result $result
         *
         * конвертирует данные из mysqli_result в массив типа array со значениями array($key => $value)
         *
         * @return array массив, который содержит в себе данные по запросу от базы данных
         */
        private function compileList($result)
        {
            $resultSet = array();
            $i = 0;
            while ($row = mysqli_fetch_assoc($result))
                $resultSet[$i++] = $row;
            return $resultSet;
        }

    }