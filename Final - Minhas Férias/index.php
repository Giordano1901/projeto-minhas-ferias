<?php
    session_start();
    require_once("PHP_Func/usuario_controlador.php");
    require_once("PHP_Func/usuario_construtor.php");
    $usuarioController = new UsuarioController(); //Instância da Controladora
    $msg = "";
    
    if (filter_input(INPUT_GET, "msg", FILTER_SANITIZE_NUMBER_INT)) {
        if (filter_input(INPUT_GET, "msg", FILTER_SANITIZE_NUMBER_INT) == 1) {
            $msg = "<p>Faça o login para acessar o painel!</p>";
        } else {
            $msg = "<p>Você fez o logout!</p>";
        }
    }

    if (filter_input(INPUT_POST, "ra_registro", FILTER_SANITIZE_STRING)) {

        $usuario = new Usuario(); //Instância de usuário
    
        $usuario->setNome(filter_input(INPUT_POST, "nome_registro", FILTER_SANITIZE_STRING));
        $usuario->setRA(filter_input(INPUT_POST, "ra_registro", FILTER_SANITIZE_STRING));
        $usuario->setSenha(md5(filter_input(INPUT_POST, "senha_registro", FILTER_SANITIZE_STRING)));

        $result = $usuarioController->Cadastrar($usuario);
    
        switch ($result) {
            case 1:
                $msg = "<p>Usuário cadastrado com sucesso!</p>";
                break;
    
            case -1:
                $msg = "<p>Usuário já está cadastrado!</p>";
                break;
            case -2:
                $msg = "<p>Dados inválidos!</p>";
                break;
    
            case -10:
                $msg = "<p>Houve um erro ao tentar cadastrar, tente novamente mais tarde.</p>";
                break;
        }
    }
    
    if (filter_input(INPUT_POST, "ra_acesso", FILTER_SANITIZE_STRING)) {
        $usuario = $usuarioController->Autenticar(filter_input(INPUT_POST, "ra_acesso", FILTER_SANITIZE_STRING), filter_input(INPUT_POST, "senha_acesso", FILTER_SANITIZE_STRING));
        if ($usuario != null) {
    
            $_SESSION["nomeusuario_aluno"] = $usuario->getNome();
            $_SESSION["ra_aluno"] = $usuario->getRA();
    
            header("Location: minhasferias_atividade.php");
        } else {
            $msg = "<p>Usuário ou senha inválido!</p>";
            // header("Location: index.php");
        }
    }
// ===============================
    
    include ('header.php');
?>

<!-- Login do aluno -->
    <main class="initialContent" id="conteudo">
        <img src="media/render_site.png" alt="">
        <div class="content">
            <h1>Minhas Férias</h1>
            <p>Como foram suas férias? <br> Acesse e nos diga tudinho sobre sua viagem e brincadeiras, estamos ansioso para saber!</p>
            <button class="btn_alunobox" id="aluno">Aluno</button>
            <button class="btn_redirect" id="redirectBtn">Visualizar Atividade</button>
            
            <div class="content">
                <?= $msg; ?>
            </div>
        </div>
        <div id="box" class="box_aluno none">
            <button class="to_close_aluno to_close" alt="Fechar janela">X</button>
            <div class="alinhar1">
                <div class="opcaoAluno">
                    <h3>Aluno</h3>
                    <button class="btn aluno_FirstAccess" id="aluno_FirstAccess">Primeiro acesso</button>
                    <button class="btn aluno_Access" id="aluno_Access">Acessar</button>
                </div>
                <div class="formAcesso_aluno none">
                    <h3>Acessar</h3>
                    <form method="post" role="form">
                        <label>R.A</label>
                        <input type="number" name="ra_acesso">
                        <label>Senha</label>
                        <input type="password" name="senha_acesso" maxlength="16" required>
                        <input type="submit" value="Acessar" class="inputAcesso">
                    </form>
                </div>
                <div class="formFirstAccess_aluno none">
                    <h3>Primeiro acesso</h3>
                    <form method="post" role="form">
                        <label>Nome</label>
                        <input type="text" name="nome_registro">
                        <label>R.A</label>
                        <input type="number" name="ra_registro">
                        <label>Senha</label>
                        <input type="password" name="senha_registro" maxlength="16" required>
                        <input type="submit" value="Primeiro acesso" class="inputPrimeiroAcesso">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
        include ('footer.php');
    ?>
    
    <script src="script/acessibilidade.js"></script>
    <script src="script/scriptt.js"></script>
</body>
</html>