<?php
session_start();

if (isset($_SESSION['usuario'])) {
    echo "Bem-vindo, " . $_SESSION['usuario'] . "!";
} else {
    echo "Usuário não autenticado.";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    
    <title> Joguetes </title>
    
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
                <li> <a href = "cadastroproduto.html"> Cadastrar Jogos </a> </a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2> Jogos Destacados </h2>
        <section class="produtos">
            <div class="jogo">
                <img src="./img/deathstranding.png" alt="Death Stranding">
                <h3> Death Stranding </h3>
                <p class="preco"> R$ 159,90 </p>
                <button> Comprar </button>
            </div>

            <div class="jogo">
                <img src="./img/enigmadomedo.png" alt="Enigma do Medo">
                <h3> Enigma do Medo </h3>
                <p class="preco"> R$ 65,00 </p>
                <button> Comprar </button>
            </div>

            <div class="jogo">
                <img src="./img/cyberpunk.png" alt="Cyberpunk 2077">
                <h3> Cyberpunk 2077 </h3>
                <p class="preco"> R$ 249,00 </p>
                <button> Comprar </button>
            </div>
        </section>

        <h2> Recomendados </h2>
        <section class="carrossel-container">
            <input type="radio" name="slider" id="slide1" checked>
            <input type="radio" name="slider" id="slide2">
            <input type="radio" name="slider" id="slide3">

        <div class="carrossel">
            <div class="slide" id="s1">
                <img src="./img/stardewvalley.png" alt="Stardew Valley">
                <h3> Stardew Valley </h3>
                <p class="preco"> R$ 24,99 </p>
                <button> Comprar </button>
            </div>

            <div class="slide" id="s2">
                <img src="./img/terraria.png" alt="Stardew Valley">
                <h3> Terraria </h3>
                <p class="preco"> R$ 32,99 </p>
                <button> Comprar </button>
            </div>

            <div class="slide" id="s3">
                <img src="./img/batmanarkhamknight.png" alt="Terraria">
                <h3> Batman Arkham Knight </h3>
                <p class="preco"> R$ 89,99 </p>
                <button> Comprar </button>
            </div>   
        </div>

        <div class="nav-carrossel">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
        </div>

        </section>
    </main>

    <footer>
        <p>&copy; 2025 Joguetes. Todos os direitos reservados. </p>
    </footer>
</body>
</html>