<?php
    // https://phpdelusions.net/pdo#emulation
    // https://phpdelusions.net/pdo_examples/connect_to_mysql
    // http://zetcode.com/php/pdo/
    class Database
    {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASSWORD;
        private $name = DB_NAME;

        private $pdo;
        private $stmt;
        private $error;        

        public function __construct() {
            $dsn = "mysql:host=$this->host;dbname=$this->name;";
            $options = [
                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES      => false
            ];
            try {
                $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (\PDOException $e) {
                $this->error = $e;
                echo $e->getMessage();
            }
        }

        public function query($sql) {
            $this->stmt = $this->pdo->prepare($sql);
        }

        public function execute() {
            return $this->stmt->execute();
        }

        public function fetchAll() {
            $this->execute();
            return $this->stmt->fetchAll();
        }

        // https://stackoverflow.com/questions/5456626/php-pdo-returning-single-row
        public function fetchOne() {
            $this->execute();
            return $this->stmt->fetch();
        }

        // https://stackoverflow.com/questions/1179874/what-is-the-difference-between-bindparam-and-bindvalue
        // https://www.php.net/manual/en/pdo.constants.php
        // https://www.php.net/manual/en/pdostatement.bindvalue.php
        public function bind($param, $value, $type = NULL) {
            if(is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
    }
    