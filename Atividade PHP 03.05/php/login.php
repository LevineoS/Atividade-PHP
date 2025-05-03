<?php
include("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if (!$usuario || !$senha) {
    echo "Preencha todos os campos.";
    exit;
}

$query = "SELECT * FROM login WHERE usuario = :usuario";
$varVerifica = $pdo->prepare($query);
$varVerifica->bindParam(':usuario', $usuario);
$varVerifica->execute();

$usuario_bd = $varVerifica->fetch(PDO::FETCH_ASSOC);

if ($usuario_bd) {
    if (password_verify($senha, $usuario_bd['senha'])) {
        session_start();
        $_SESSION['usuario'] = $usuario_bd['usuario'];

        echo "<script>
                    alert('Login bem-sucedido!');
                    window.location.href = 'home.php'; // Redireciona para home.php
                  </script>";
        exit();
    } else {
        echo "<script>
                    alert('Senha incorreta.');
                    window.location.href = 'login.php'; // Redireciona de volta para login
                  </script>";
        exit();
    }
} else {
    echo "<script>
                alert('Usuário não encontrado.');
                window.location.href = 'login.php'; // Redireciona de volta para login
              </script>";
    exit();
}

?>