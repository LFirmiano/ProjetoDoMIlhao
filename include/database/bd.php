<?php 
$host = "localhost";
$database = "pregao-producao-v01";
$user = "associado_user";
$password = "cabemce2014";

// DEFINIR O DSN
$dsn = "pgsql:host=$host;port=5432;dbname=$database;user=$user;password=$password";

// EXECUTAR CONEXAO

try {
    $conn = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
