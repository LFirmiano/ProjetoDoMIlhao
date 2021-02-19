<?php

include '../../../database/bd.php';

var_dump($_POST);

$query = "INSERT INTO usuarios (usuario,senha,cpf,created,modified) VALUES (:usuario,:senha,:cpf,NOW(),NOW())";

$stmt = $conn->prepare($query); 

$_POST['cep'] = str_replace("-","",$_POST['cep']);

$stmt->bindParam(':usuario',$_POST['usuario'],PDO::PARAM_STR);
$stmt->bindParam(':senha',$_POST['senha'],PDO::PARAM_STR);
$stmt->bindParam(':cpf',$_POST['cpf'],PDO::PARAM_STR);

if($stmt->execute()){
    $usuario_id = $conn->lastInsertId();

    $query_end = "INSERT INTO endereco_usuarios (cep,logradouro,numero,complemento,bairro,uf,usuario_id,created,modified) VALUES (:cep,:logradouro,:numero,:complemento,:bairro,:uf,:usuario_id,NOW(),NOW())";

    $stmt_end = $conn->prepare($query_end);

    $stmt_end->bindParam(':cep',$_POST['cep'],PDO::PARAM_STR);
    $stmt_end->bindParam(':logradouro',$_POST['logradouro'],PDO::PARAM_STR);
    $stmt_end->bindParam(':numero',$_POST['numero'],PDO::PARAM_STR);
    $stmt_end->bindParam(':complemento',$_POST['complemento'],PDO::PARAM_STR);
    $stmt_end->bindParam(':bairro',$_POST['bairro'],PDO::PARAM_STR);
    $stmt_end->bindParam(':uf',$_POST['uf'],PDO::PARAM_STR);
    $stmt_end->bindParam(':usuario_id',$usuario_id,PDO::PARAM_STR);

    $stmt_end->execute();
}