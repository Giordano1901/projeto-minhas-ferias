<?php

require_once("PHP_Func/func_midia.php");

class MidiaController {

    private $midiaDAO;

    public function __construct() {
        $this->midiaDAO = new MidiaDAO();
    }
    
    public function AtutenticarAtividade(string $ra) {
        if(strlen($ra > 0)){
            return $this->midiaDAO->visualizarAtividade($ra);
        }
        else {
            return -2;
        }
    }
}


?>