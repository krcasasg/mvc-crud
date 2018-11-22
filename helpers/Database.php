<?php
/**
 * Created by PhpStorm.
 * User: krcasasg
 * Date: 21/11/2018
 * Time: 10:12 AM
 */

class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}