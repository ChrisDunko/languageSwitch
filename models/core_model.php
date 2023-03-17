<?php declare(strict_types=1);

    #[AllowDynamicProperties]
    class Model {

        static protected $database;
        static protected $tableName;
        static protected $dbColumns;

        public function __construct() {
            foreach (static::$dbColumns as $dbColumn) {
                $this->$dbColumn = '';
            }
        }

        public static function database_connect() {
            // not necessary in this project
        }

        public static function set_database($connection) {
            // not necessary in this project
        }

        protected static function instantiate(array $record) :object|bool {
            // not necessary in this project
            return false;
        }

        public function insert() {
            // not necessary in this project
            return false;
        }

        public function update() {
            // not necessary in this project
            return false;
        }
    }
