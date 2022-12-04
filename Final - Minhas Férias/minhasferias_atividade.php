<?php
    session_start();
    if (!isset($_SESSION["nomeusuario_aluno"])) {
        header("Location: index.php?msg=1");
    }

    require_once("PHP_Func/func_midia.php");

    $txt = "";

    $midiaDAO = new midiaDAO();
    $midiaDAO->criaPastaAluno($_SESSION["ra_aluno"]);

    if(filter_input(INPUT_POST, "Aluno_txt", FILTER_SANITIZE_STRING)){
        $midiaDAO->SalvarTexto(filter_input(INPUT_POST, "Aluno_txt", FILTER_SANITIZE_STRING));
        $txt = "Texto enviado com sucesso, agora é possível visualiza-la!";
    }
    if(isset($_FILES["flImage"])){
        $midiaDAO->SalvarImagem("flImage");
        $txt = "Imagem enviada com sucesso, agora é possível visualiza-la!";
    }
    if(isset($_FILES["audio_aluno"])){
        $midiaDAO->SalvarAudio("audio_aluno");
        $txt = "Audio enviado com sucesso, agora é possível visualiza-la!";
    }

    include ('header.php');
?>

<!-- Atividade -->
<main class="sectionAtividade" id="conteudo">
    <div id="att_title">
        <p>Olá, <?=$_SESSION["nomeusuario_aluno"]?> (R.A: <?=$_SESSION["ra_aluno"]?>) !
        <button id="exit"><img src="media/return.png"></button>
        
        <h1 class="title">Selecione a maneira de envio:</h1>
    </div>
    <div class="selectButtons">
        <div class="selectButtonsContent">
            <button id="btn_texto"><img src="media/render/escrever.png" alt="icone para escrever texto escrito"></button>
            <h3>Escrever texto</h3>
        </div>
        <div class="selectButtonsContent">
            <button id="btn_img"><img src="media/render/pensando.png" alt="icone para envio de imagem do caderno"></button>
            <h3>Enviar imagem do caderno</h3>
        </div>
        <div class="selectButtonsContent">
            <button id="btn_audio"><img src="media/render/audio.png" alt="icone para envio de áudio"></button>
            <h3>Enviar áudio</h3>
        </div>
    </div>
    
    <h3 class="title"><?php echo $txt; ?></h3>

    <div class="none" id="div_texto">
        <form method="post" role="form" id="form_img">
            <h3 class="title">Texto</h3>
            <p class="instruct">Nos diga como foram suas férias no campo abaixo.</p>
            <textarea class="textarea" name="Aluno_txt" cols="40" rows="10" placeholder="Digite como foram suas férias..." required></textarea>
            <input type="submit" value="Enviar" id="submit_texto" class="send_input">
        </form>
    </div>

    <div class="none" id="div_img">
        <form method="post" id="form_img" role="form" enctype="multipart/form-data">
            <h3 class="title">Imagem</h3>
            <p class="instruct">Clique no icone abaixo e selecione a imagem de seu caderno para envio.</p>
                <div class="max-width">
                    <div class="imageContainer">
                        <img src="media/camera.svg" alt="Selecione uma imagem" id="imgPhoto">
                    </div>
                </div>
                <input type="file" name="flImage" id="flImage" accept="image/*">
                <br><br>
            <input type="submit" value="Enviar" class="none send_input" id="submit_img">
        </form>
    </div>

    <div class="none" id="div_audio">
        <form method="post" id="form_audio" role="form" enctype="multipart/form-data">
            <h3 class="title">Áudio</h3>
            <p class="instruct">Clique no ícone de microfone para iniciar, e no botão ao lado para encerrar.</p>
            <div id="saved-audio-messages">
                <input type="file" id="audio_input" name="audio_aluno" accept="audio/*">
                <input type="submit" name="Aluno_audio" value="Enviar" class="send_input" id="submit_audio">
        </form>
                <h1 class="title">Áudio gravado</h1>
                <audio controls class="audio_aluno" controls>
            </div>
        <div class="recordControls">
            <button class="btnRecord none" id="stop"><img src="media/parar.svg"><p>Encerrar</p></button>
            <button class="btnRecord" id="record"><img src="media/microfone.svg"><p>Gravar</p></button>
        </div>
    </div>
</main>

<script src="script/acessibilidad.js"></script>
<script src="script/acessibilidade_atividade.js"></script>
<script src="script/aluno.js"></script>
<script src="script/audioRecorddd.js"></script>
</body>
</html>