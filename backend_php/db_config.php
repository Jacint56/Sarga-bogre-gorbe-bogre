<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_NAME','cost');
define('DB_PASS','');

//establish connection
try
{
    //$conn = new PDO("mysql:'$DB_NAME';host='$DB_HOST'","'$DB_USER'","'$DB_PASS'");
    $conn = new PDO("mysql:dbname=cost;host=localhost", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
catch (PDOException $e)
{
    exit("Nem sikerult a csatlakozas ");
}
?>