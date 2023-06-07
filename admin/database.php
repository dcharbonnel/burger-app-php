<?php

class Database {

    private static $dbHost;
    private static $dbName;
    private static $dbUsername;
    private static $dbUserpassword;
    private static $connection = null;

    
    public static function initialize()
{
    self::$dbHost = getenv('DATABASE_HOST');
    self::$dbName = getenv('DATABASE_NAME');
    self::$dbUsername = getenv('DATABASE_USERNAME');
    self::$dbUserpassword = getenv('DATABASE_PASSWORD');
}
    public static function connect() {
        self::initialize();
        if(self::$connection == null) {
            try {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        return self::$connection;
    }
    
    public static function disconnect() {
        self::$connection = null;
    }
}

?>
