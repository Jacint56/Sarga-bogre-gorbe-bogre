<?php


try
{
    $conn = new PDO("mysql:dbname=cost_;host=localhost", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e)
{
    exit("Nem sikerult a csatlakozas ");
}
?>