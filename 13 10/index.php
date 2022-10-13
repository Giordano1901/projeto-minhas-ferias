<?php
    include 'header.php';
?>

<main>
    <div>
        <h1>Como foi as minhas férias</h1>
    </div>
    <div>
        <form action="" method="get">
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <h3>Ou você pode adicionar uma imagem de sua atividade:</h3>
            <div>
                <input type="file" name="imagem" id="img-input">
            </div>
            <div id="img-container">
                <img id="preview" src="">
            </div>
            <div>
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</main>

<?php
    include 'footer.php';
?>