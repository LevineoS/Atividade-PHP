<?php

include("conexao.php");

$usuario = $_POST['usuario'] ?? null;
$senha = $_POST['senha'] ?? null;
$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;

if(!$usuario || !$senha || !$nome || !$email){
    echo "Preencha todos os campos.";
    exit;
}

try{

    $varVerifica = $pdo->prepare("SELECT COUNT(*) FROM login WHERE usuario = :usuario");
    $varVerifica->bindParam(':usuario', $usuario);
    $varVerifica->execute();

    if($varVerifica->fetchColumn() > 0){
        echo "Usuário já está em uso.";
        exit;
    }

    $pdo->beginTransaction();

    $varLogin = $pdo->prepare("INSERT INTO login (usuario, senha) VALUES (:usuario, :senha)");
    $varLogin->bindParam(':usuario', $usuario);
    $varLogin->bindParam(':senha', $senha);
    $varLogin->execute();

    $id_login = $pdo->lastInsertId();

    $varUsuario = $pdo->("INSERT INTO usuario (nome, email, id_login) VALUES (:nome, :email, :id_login)");
    $varUsuario->bindParam(':nome', $nome);
    $varUsuario->bindParam(':email', $email);
    $varUsuario->bindParam(':id_login', $id_login);
    $varUsuario->execute();

    $pdo->commit();
    echo "Cadastro realizado com sucesso!";

} catch (Exception $e){

    $pdo->rollBack();
    echo "Erro ao cadastrar: " . $e->getMessage();

}

?>