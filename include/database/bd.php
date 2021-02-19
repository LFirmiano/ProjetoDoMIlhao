<?php 
$host = "localhost";
$database = "pregao-admin";
$user = "postgres";
$password = "csc3590wxc2";

// DEFINIR O DSN
$dsn = "pgsql:host=$host;port=5432;dbname=$database;user=$user;password=$password";

// EXECUTAR CONEXAO

try {
    $conn = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
