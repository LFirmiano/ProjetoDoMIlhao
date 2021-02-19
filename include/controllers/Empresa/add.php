<?php 

include '../../database/bd.php';

var_dump($_POST);
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// DEFINA A QUERY (O SQL QUE VAI SER PASSADO AO BANCO) DESTA FORMA
$query = "INSERT INTO empresas (email,usuario,senha,razaosocial,cnpj,created,modified,pendente) VALUES (:email,:usuario,:senha,:razaosocial,:cnpj,NOW(),NOW(),:pendente)";
$pendente = true;
// PREPARE A CONEXAO DA QUERY COM O BANCO
$stmt = $conn->prepare($query);

// PASSE OS PARAMETROS QUE IRAO NA QUERY
$stmt->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$stmt->bindParam(':usuario',$_POST['user'],PDO::PARAM_STR);
$stmt->bindParam(':senha',$_POST['senha'],PDO::PARAM_STR);
$stmt->bindParam(':razaosocial',$_POST['razaoSocial'],PDO::PARAM_STR);
$stmt->bindParam(':cnpj',$_POST['cnpj'],PDO::PARAM_STR);
$stmt->bindParam(':pendente',$pendente,PDO::PARAM_STR);

// EXECUTE O SQL NO BANCO
if($stmt->execute()){
    $empresa_id = $conn->lastInsertId();

    // ADICIONA ENDERECO
    $query_end = "INSERT INTO endereco_empresas (cep,logradouro,numero,complemento,cidade,bairro,uf,empresa_id,created,modified) VALUES (:cep,:logradouro,:numero,:complemento,:cidade,:bairro,:uf,:empresa_id,NOW(),NOW())";

    $stmt_end = $conn->prepare($query_end);

    $stmt_end->bindParam(':cep',$_POST['cep'],PDO::PARAM_STR);
    $stmt_end->bindParam(':logradouro',$_POST['logradouro'],PDO::PARAM_STR);
    $stmt_end->bindParam(':numero',$_POST['numero'],PDO::PARAM_STR);
    $stmt_end->bindParam(':complemento',$_POST['complemento'],PDO::PARAM_STR);
    $stmt_end->bindParam(':cidade',$_POST['cidade'],PDO::PARAM_STR);
    $stmt_end->bindParam(':bairro',$_POST['bairro'],PDO::PARAM_STR);
    $stmt_end->bindParam(':uf',$_POST['uf'],PDO::PARAM_STR);
    $stmt_end->bindParam(':empresa_id',$empresa_id,PDO::PARAM_STR);

    $stmt_end->execute();

    // ADICIONA TELEFONE
    $query_tel = "INSERT INTO telefone_empresas (ddd,telefone,empresa_id,created,modified) VALUES (:ddd,:numero,:empresa_id,NOW(),NOW())";

    $stmt_tel = $conn->prepare($query_tel);

    $stmt_tel->bindParam(':ddd',$_POST['DDD'],PDO::PARAM_STR);
    $stmt_tel->bindParam(':numero',$_POST['telefone'],PDO::PARAM_STR);
    $stmt_tel->bindParam(':empresa_id',$empresa_id,PDO::PARAM_STR);

    $stmt_tel->execute();

    // header('Location: ../index.html');

}

?>