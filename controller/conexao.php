<?php
static $conexao;
function conectar() {
    $dbname = "escola";
    $host = "localhost";
    $user = "root";
    $pass = "";
    try {
        $conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    return $conexao;
}
