<?php
namespace Core;
use \PDO;
use \Exception;
use Core\{Config, H};

class DB {
    protected $_dbh, $_results, $_lastInsetedId, $_rowCount = 0, $_fetch = PDO::FETCH_OBJ, $_class, $_error = false;
    protected static $_db;

    public function __construct(){
        $host = Config::get('db_host');
        $name = Config::get('db_name');
        $user = Config::get('db_user');
        $pass = Config::get('db_pass');

        $options = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_OBJ
        ];

        try {
          $this->dbh = new PDO("mysql:dbname={$name};host={$host}", $user, $pass, $options);
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public static function getInstance(){
        if (!self::$_db){
           self::$_db = new DB();
        }
        return self::$_db;
    }
}
