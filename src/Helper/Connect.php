<?php


namespace Joey\Helper;


class Connect
{
    private static $pdo = null;

    public static function getConnect()
    {
        if (is_null((self::$pdo))) {
            try {
                self::$pdo = new \PDO('mysql:host='.APP_DB_HOST.';dbname='.APP_DB_NAME.';port='.APP_DB_PORT, APP_DB_USER, APP_DB_PSWD);

                self::$pdo->exec("SET NAMES UTF8");

            } catch (\PDOException $exception) {
                die("Tu te connecte pas du tout");
            }
        }

        return self::$pdo;
    }
}