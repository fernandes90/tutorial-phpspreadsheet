<?php

namespace App\Model\Form;

class Form{

    private $arquivo;
    private $result;
    private $mensagem;

    public function getArquivo(){
        return $this->arquivo;
    }
    
    public function getResult() {
        return $this->result;
    }
    
    public function getMensagem() {
        return $this->mensagem;
    }

    public function setArquivo(array $file){
        $this->arquivo = $file;
    }
    
    public function setResult($result): void {
        $this->result = $result;
    }
    
    public function setMensagem($mensagem): void {
        $this->mensagem = $mensagem;
    }

    public function LerArquivo(){
        $filename = $this->getArquivo()['arquivo']['tmp_name'];
        if(!empty($filename)):
            $format = \PhpOffice\PhpSpreadsheet\IOFactory::identify($filename);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($format);
            $reader->setReadDataOnly(true);
            try{
                $spreadsheet = $reader->load($filename);
                $this->setResult($spreadsheet->getActiveSheet()->toArray());
                return true;
            }catch(\PhpOffice\PhpSpreadsheet\Reader\Exception $e){
                die('Erro ao carregar o arquivo: '.$e->getMessage());
            }
        else:
            $this->setMensagem('Erro, nenhum arquivo foi informado');
            return false;
        endif;
    }
    
    public function ValidaArquivo($file){
        $this->setArquivo($file);
        if ($this->getArquivo()['arquivo']['size'] === "0"):
            $this->setMensagem('Por favor, selecione um arquivo!');
            return false;
        else:
            return true;
        endif;
    }
    
}

