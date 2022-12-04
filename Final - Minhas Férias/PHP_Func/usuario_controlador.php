<?php

require_once("PHP_Func/func_usuario.php");

class UsuarioController {

    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }
    
    public function Cadastrar(Usuario $usuario) {
        if (strlen($usuario->getNome()) > 3 && strlen($usuario->getRA()) > 0 && strlen($usuario->getSenha()) >= 7) {
            return $this->usuarioDAO->Cadastrar($usuario);
        } else {
            return -2; //Dados inválidos
        }
    }

    public function Autenticar(string $ra, string $senha) {
        if (strlen($ra) > 0 && strlen($senha) >= 1) {
            return $this->usuarioDAO->Autenticar($ra, $senha);
        } else {
            return null;
        }
    }

    public function RetornarUsuario(string $ra) {
        if (strpos($ra)> 0) {
            return $this->usuarioDAO->RetornarUsuario($ra);
        } else {
            return null;
        }
    }

    
}
?>