<?php

class Usuario {

    private $nome;
    private $ra;
    private $senha;

    //set = Atribuir
    //get = Obter

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }

    // ======================================

    function setRA($ra){
        $this->ra = $ra;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }
    
    // ======================================

    function getRA(){
        return $this-> ra;
    }
    function getSenha(){
        return $this-> senha;
    }
    
}