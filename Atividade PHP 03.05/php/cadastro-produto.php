<?php

include("conexao.php");

$nome = $_POST['nome'] ?? null;
$marca = $_POST['marca'] ?? null;
$preco = $_POST['preco'] ?? null;
$descricao = $POST['descricao'] ?? null;

if(!$nome || !$marca || !$preco || !$descricao){

    echo "Preencha todos os campos.";
    exit;

}

try{

    $pdo->beginTransaction();

    $varVerifica = $pdo->prepare("INSERT INTO produtos (nome, marca, preco, descricao) VALUES (:nome, :marca, :preco, :descricao)");
    $varVerifica->bindParam(':nome', $nome);
    $varVerifica->bindParam(':marca', $marca);
    $varVerifica->bindParam(':preco', $preco);
    $varVerifica->bindParam(':descricao', $descricao);

    $varVerifica->execute();

    $pdo->commit();
    echo "Produto cadastrado com sucesso!";

} catch(Exception $e) {

    $pdo->rollBack();
    echo "Erro ao cadastrar produto: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="./css/cadastro.css">
        <script src="./js/cadastro.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"> </script>

        <title>Tela de Cadastro</title>

    </head>
    <body>
        <header>

            <h1> Joguetes </h1>
            <nav>
                <ul>
                    <li> <a href = "home.html"> Início </a> </li>
                    <li> <a href = "jogos.html"> Jogos </a> </li>
                    <li> <a href = "contato.html"> Contato </a> </li>
                    <li> <a href = "cadastro.html"> Cadastro </a> </li>
                    <li> <a href = "index.html"> Login </a> </li>
                </ul>
            </nav>
        </header>


        <div class="container-principal">
            <div class="formulario">
                <form id="form-cadastro" action = "./php/cadastro-produto.php">

                    <h3> Cadastro de Jogos </h3>

                    <input type="text" name="Nome" placeholder="Nome do Jogo:" id="nome"  required="true" minlength="3" maxlength="80">

                    <input type="text" placeholder="Marca:" id="marca" required="true" minlength="14" maxlength="255"/> 

                    <input type="number" placeholder="Preço:" id="preco" required="true" minlength="3" maxlength="15"/>

                    <input type="text" placeholder="Descrição:" id="descricao" required="true" minlength="4" maxlength="100"/>  

                    <input type="submit" value="Cadastrar Produto">

                </form>
            </div>
        </div>

        <footer>
            <p>&copy; 2025 Joguetes. Todos os direitos reservados. </p>
        </footer>
        
    </body>
</html>