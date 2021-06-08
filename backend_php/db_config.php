<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_NAME','cost');
define('DB_PASS','');

try
{
    $conn = new PDO("mysql:dbname=cost;host=localhost", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e)
{
    exit("Nem sikerult a csatlakozas ");
}
?>