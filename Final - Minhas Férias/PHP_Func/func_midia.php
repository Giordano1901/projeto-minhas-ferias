<?php

    class MidiaDAO {
        private $dir = "Arquivos/Att_Enviados";
        
        public function visualizarAtividade(string $ra) {
            $str1 = "";
            $str2 = "";
            $str3 = "";
            $str4 = "";

            $diretorioCompleto = $this->dir . "/" . $ra . "/"; //Diretório completo

            $atividade = array ("text_" . $ra .".txt",
                                "audio_" . $ra . ".txt",
                                "imageCode_" . $ra . ".txt",);

            if (file_exists($diretorioCompleto . $atividade[0])){
                $fopen = fopen($diretorioCompleto . $atividade[0], "r");
                $str1 = fread($fopen,filesize($diretorioCompleto . $atividade[0]));
                fclose($fopen);
            }

            if(file_exists($diretorioCompleto . $atividade[1])){
                $fopen = fopen($diretorioCompleto . $atividade[1], "r");
                $str2 = fread($fopen,filesize($diretorioCompleto . $atividade[1]));
                fclose($fopen);
            }
            
            if (file_exists($diretorioCompleto . $atividade[2])){
                $fopen = fopen($diretorioCompleto . $atividade[2], "r");
                $str3 = fread($fopen,filesize($diretorioCompleto . $atividade[2]));
                fclose($fopen);
            }
            
            if (file_exists($diretorioCompleto . $atividade[0]) == false && file_exists($diretorioCompleto . $atividade[1]) == false && file_exists($diretorioCompleto . $atividade[2]) == false){
                $str4 = "FALSE";
            }
            

            $valores = array($str1,
                             $str2,
                             $str3,
                             $str4);

            return $valores;
        }

        public function criaPastaAluno($raAluno){
            $diretorioCompleto = $this->dir . "/" . $raAluno;
            if(!$this->VerificaPastaExiste($diretorioCompleto)){
                mkdir('Arquivos/Att_Enviados/' . $raAluno);
            }else{
                return null;
            }
        }
        private function VerificaPastaExiste(string $nomePasta){
            $diretorioCompleto = $this->dir . "/" . $nomePasta;
            if(is_dir($nomePasta)){
                return true;
            }else{
                return false;
            }
        }
                       
        public function SalvarTexto($txt){
            $fileName = "text_" . $_SESSION["ra_aluno"] . ".txt";
            $diretorioCompleto = $this->dir . "/" . $_SESSION["ra_aluno"] . "/" . $fileName;
            $fopen = fopen($diretorioCompleto, "w");
            fwrite($fopen, $txt);
            fclose($fopen);
        }

        public function SalvarImagem($foto_caderno){
            $diretorioCompleto = "Arquivos/Att_Enviados/" . $_SESSION["ra_aluno"];
            $ext = strtolower(substr($_FILES[$foto_caderno]['name'],-4)); //Pegando extensão do arquivo
            move_uploaded_file($_FILES[$foto_caderno]['tmp_name'], $diretorioCompleto . "/" . "image_" . $_SESSION["ra_aluno"] . $ext); //Fazer upload do arquivo
            $img = file_get_contents($diretorioCompleto . "/" . "image_" . $_SESSION["ra_aluno"] . $ext);
            $data = 'data:image/png' . ';base64,' . base64_encode($img);
            $fopen = fopen($diretorioCompleto  . "/" . "imageCode_" . $_SESSION["ra_aluno"] . ".txt", "w");
            fwrite($fopen, $data);
            fclose($fopen);
            unlink($diretorioCompleto . "/" . "image_" . $_SESSION["ra_aluno"] . $ext);            
        }

        public function SalvarAudio($audio){
            $diretorioCompleto = "Arquivos/Att_Enviados/" . $_SESSION["ra_aluno"] . "/";
            $ext = strtolower(substr($_FILES[$audio]['name'],-4)); //Pegando extensão do arquivo
            move_uploaded_file($_FILES[$audio]['tmp_name'], $diretorioCompleto . "audio_" . $_SESSION["ra_aluno"] . ".txt"); //Fazer upload do arquivo
        }
    }
?>