<?php
$param = parse_ini_file("db2.ini");
try{
    $pdo = new PDO("mysql:host=".$param['url'].";dbname=".$param["db"], $param["user"], $param["passwd"]);
} catch (PDOException $e) {
    echo $e->getCode() . "<br/>";
    echo $e->getMessage() . "<br/>";
}
?>