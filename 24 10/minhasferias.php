<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/normalize.css">
    <title>E.E. Pedro Alvares Cabral | Minhas Férias</title>
</head>
<body class="body-content">
    <header class="top-header">
        <div class="top-header-title">
            <img src="Media\logo.svg" alt="" class="top-header-logo">
            <h2>E.E. Pedro Álvares Cabral</h2>
        </div>
        <div>
            <nav class="top-nav">
                <ul>
                    <li><a href="">SECRETARIA</a></li>
                    <li><a href="">ALUNO</a></li>
                    <li><a href="">RESPONSAVEIS</a></li>
                    <li><a href="">MATRICULA</li></a>
                    <li><a href="">MINHAS FÉRIAS</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="middle-content">
        <img src="https://media.discordapp.net/attachments/595706481555537969/1030501482488922163/unknown.png">
        <div>
            <form action="" class="middleform-content">
                <textarea name="MinhasFerias" id="" cols="120" rows="20" placeholder="Escreva aqui como foi suas férias..." class="FeriasContent"></textarea>
                <label>Você também enviar das seguintes formas:</label>
                <br><br>
                <div id="input-box">
                    <div class="input-box-content">
                        <h2>Imagem</h2>
                        <div class="max-width">
                            <div class="imageContainer">
                                <img src="Media/camera.svg" alt="Selecione uma imagem" id="imgPhoto">
                            </div>
                        </div>
                        <input type="file" name="flImage" id="flImage" accept="image/*">
                    </div>
                    <div class="input-box-content">
                        <h2>Audio</h2>
                        <div class="console">

                            <div class="stopwatch"></div>

                            <div class="reset">
                                <a href="#"> <img src="Media/reset.svg" alt="" class="reset"></a>
                            </div>
                            <button class="Rec"><img src="Media/mic.svg" alt=""></button>
                            <button class="Stop"><img src="Media/stop.svg" alt=""></button>
                        </div>
                        <div>
                            <div class="device-status"></div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </section>
    <footer>
        
    </footer>
    <script src="script.js"></script>
</body>
</html>