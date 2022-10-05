<?php
class Connect
{
    private static $connect;
    private const DB_HOST = 'mvc';
    private const DB_DATABASE_NAME = 'mvc';
    private const DB_USER = 'root';
    private const DB_PASS = 'root';
    private function __construct()
    {
        
    }
    public static function getConnect()
    {
        if (self::$connect == null) {
            self::$connect = mysqli_connect(
                self::DB_HOST,
                self::DB_USER,
                self::DB_PASS,
                self::DB_DATABASE_NAME
            )
                or die('Mysql connection error: ' . mysqli_connect_error());
        }

        return self::$connect;
    }
}
