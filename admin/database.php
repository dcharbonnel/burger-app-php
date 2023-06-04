<?php

class Database {

    private static $dbHost = getenv('DATABASE_HOST');
    private static $dbName = getenv('DATABASE_NAME');
    private static $dbUsername = getenv('DATABASE_USERNAME');
    private static $dbUserpassword = getenv('DATABASE_PASSWORD');
    private static $connection = null;
    
    public static function connect() {
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
