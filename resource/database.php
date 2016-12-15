<?php
/**
 * Created by PhpStorm.
 * User: haozhang
 * Date: 12/1/16
 * Time: 9:51 PM
 */
$username='root';
$password='root';
$dsn = 'mysql:host=127.0.0.1; port:3306; dbname=recipe;charset=utf8';

try{
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "connnected to the user database";

}catch (PDOException $exception) {
    echo $exception -> getMessage();
}
