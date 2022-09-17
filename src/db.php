<?php
include 'constants.php';

class DB
{

    private static $conn;

    private function __construct()
    {
    }

    public static function connect()
    {
        if (!empty(self::$conn)) {
            return self::$conn;
        }


        try {
            $dbh = new PDO('mysql:host=db;port=3306;dbname=appDB', Constants::$user, Constants::$password, array(
                PDO::ATTR_PERSISTENT => true
            ));

            self::$conn = $dbh;

            return $dbh;

        } catch (PDOException $e) {
            print "Error! : " . $e->getMessage() . "<br/>";
            exit();
        }
    }

}