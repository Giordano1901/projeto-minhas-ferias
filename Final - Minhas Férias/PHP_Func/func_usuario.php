<?php

require_once("PHP_Func/usuario_construtor.php");

class UsuarioDAO {

    private $debug = true;
    private $dir = "Arquivos/Login";

    public function Cadastrar(Usuario $usuario) {
        try {
            $fileName = $usuario->getRA() . ".txt";
            if (!$this->VerificaArquivoExiste($fileName)) {
                //Faz o cadastro
                $diretorioCompleto = $this->dir . "/" . $fileName; //Diretório completo
                $fopen = fopen($diretorioCompleto, "w");

                $str = "{$usuario->getNome()};{$usuario->getRA()};{$usuario->getSenha()};";
                if (fwrite($fopen, $str)) {
                    fclose($fopen);
                    return 1; //Usuário cadastrado com sucesso
                } else {
                    fclose($fopen);
                    return -10; //Erro ao tentar cadastrar
                }
            } else {
                return -1; //Usuário já cadastrado
            }
        } catch (Exception $ex) {
            if ($this->debug) {
                echo $ex->getMessage();
            }
        }
    }

    public function Autenticar(string $ra, string $senha) {

        $fileName = "{$ra}.txt";

        if ($this->VerificaArquivoExiste($fileName)) {
        
            $usuario = $this->RetornarUsuario($fileName);
               echo $usuario->getSenha() . "-" . md5($senha);
            if($usuario->getSenha() == md5($senha)) {
             
                return $usuario;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function RetornarUsuario(string $ra) {
        if ($this->VerificaArquivoExiste($ra)) {

            $diretorioCompleto = $this->dir . "/" . $ra; //Diretório completo

            $fopen = fopen($diretorioCompleto, "r");

            $file = fread($fopen, filesize($diretorioCompleto));
            $arr = explode(";", $file);

            $usuario = new Usuario();
            $usuario->setNome($arr[0]);
            $usuario->setRA($arr[1]);
            $usuario->setSenha($arr[2]);

            fclose($fopen);
            
            return $usuario;
        } else {
            return null;
        }
    }

    private function VerificaArquivoExiste(string $nomeArquivo) {
        $diretorioCompleto = $this->dir . "/" . $nomeArquivo;
        //file_exists = Verificar se um diretório existe
        if (file_exists($diretorioCompleto)) {
            return true;
        } else {
            return false;
        }
    }
}