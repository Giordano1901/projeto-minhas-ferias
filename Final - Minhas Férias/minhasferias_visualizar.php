<?php
    require_once("PHP_Func/midia_controlador.php");
    require_once("PHP_Func/func_midia.php");

    $midiaController = new MidiaController();
    $midiaDAO = new MidiaDAO();

    $txt = "";
    $classValue = "none";

    $classTxt = "none";
    $classImg = "none";
    $classAudio = "none";

    if (filter_input(INPUT_POST, "aluno_ra", FILTER_SANITIZE_STRING)){
        $ra = filter_input(INPUT_POST, "aluno_ra", FILTER_SANITIZE_STRING);
        $result = $midiaController->AtutenticarAtividade(filter_input(INPUT_POST, "aluno_ra", FILTER_SANITIZE_STRING));

        if(strlen($result[0]) > 0 || strlen($result[1]) > 0 || strlen($result[2]) > 0){
            $classValue = " ";
            $classTxt = " ";

            if(strlen($result[1]) > 10){
                $classAudio = " ";
            }
            if(strlen($result[2]) > 10){
                $classImg = " ";
            }
        }else{
            $txt = "<br> Nenhuma atividade encontrada a partir deste endereço!";
        }
    }

    include ('header.php');
?>
<main class="sectionAtividade" id="conteudo">
    <div class='sectionAtividade'>
        <div id="att_title">
            <h1 class="title">Seja bem-vindo (a) a área de visualização!</h1>
            <?php echo $txt; ?>
        </div>
    </div>
    <div class="none" id="div_visu">
        <div class="enunciado">
            <h3 class="title">Digite o R.A do aluno:</h3>
            <p>Para visualizar a atividade do o aluno é necessário digitar o R.A do mesmo.</p>
            <p class="<?php echo $classValue ?>">R.A do Aluno: <?php echo $ra; ?></p>
        </div>
        <div>
            <form method="post" role="form">
                <input type="number" name="aluno_ra">
                <input type="submit" value="Visualizar atividade" class="inputAcesso" alt="Para visualizar a atividade do o aluno digite o R.A">
            </form>
        </div>
        <div class="" id="exibe_atividade">
            <div  class="atividade_visu">
                <div id="_1" class="<?php echo $classTxt ?>">
                    <h3 class="title">Texto escrito</h3>
                    <textarea class="textarea" cols="40" rows="10" placeholder="Não há nenhum registro de texto." disabled alt="Texto do aluno"><?= $result[0] ?></textarea>
                </div>
                <div id="_1" class="<?php echo $classImg ?>">
                    <h3 class="title">Foto do caderno</h3>
                    <img src="<?= $result[2] ?>" alt="Zoom na imagem do caderno do aluno" id="imgAluno">
                </div>
                <div id="_1" class="<?php echo $classAudio ?>">
                    <h3 class="title">Audio</h3>
                    <audio src="<?= $result[1] ?>" controls alt="Audio do aluno"></audio>
                </div>
            </div>
        </div>
        <div id="focusLock" class="none">
            <img src="<?= $result[2] ?>" alt="Imagem do caderno do aluno">
        </div>
    </div>
</main>

    <script src="script/acessibilidad.js"></script>
    <script src="script/acessibilidade_visualizar.js"></script>
    <script src="script/visu.js"></script>
</body>
</html>