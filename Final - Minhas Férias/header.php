<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E.E. Pedro Alvares Cabral</title>
    <link rel="stylesheet" href="css/styleee.css">
    <link rel="icon" href="media/logo.png" type="image/png">
</head>
<body>
    <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <!-- Parte do NavBar -->
    <header class="top-header">
        <nav>
            <div class="topNav">
                <div class="top-header-title">
                    <a href="index.php" class="logoLink" alt="Retornar ao início">
                        <img src="media/logo.png" alt="">
                        <h2>E.E. Pedro Álvares Cabral</h2>
                    </a>
                    <button id="btn-mobile">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </button>
                </div>

                <a href="#conteudo" class="pularConteudo" id="irDireto">Ir para o conteúdo</a>

                <ul class="close menu" id="menu">
                    <li><a href="">ALUNO</a></li>
                    <li><a href="">RESPONSAVEIS</a></li>
                    <li><a href="">MATRICULA</li></a>
                    <li><a href="index.php">MINHAS FÉRIAS</a></li>
                    <abbr title="Alto-contraste"><li><button id="altoContraste" class="altoContraste"><img src="media/colorswitch.svg" alt="Modo escuro"></button></li></abbr>
                </ul>
            </div>
        </nav>
    </header>