<?php

class DbConfig {
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
            $dbh = new mysqli("db", "root", "example", "appDB");

            self::$conn = $dbh;

            return $dbh;

        } catch (PDOException $e) {
            print "Error! : " . $e->getMessage() . "<br/>";
            exit();
        }
    }
}