<?php

namespace App\Model\Pagina;

class Pagina{

    private $Url;
    private $Path;
    private $Error;

    function getUrl() {
        return $this->Url;
    }

    function getPath() {
        return $this->Path;
    }

    function getError() {
        return $this->Error;
    }

    /*
     * Verifica se a url solicitada é válida       
     */

    public function VerificaUrl($Url) {
        $this->Url = $Url;
        if (isset($this->Url) && !empty($this->Url)):
            $this->Url = explode('/', $this->Url);
            $this->VerificaPath();
        else:
            $this->Error = 'Url em branco ou invalida';
        endif;
    }

    /*
     * Formata a url requisitada pelo browser e chama outra função      
     */

    private function VerificaPath() {
        if (!$this->Url || empty($this->Url)):
            $this->Path = 'index.php';
        else:
            $this->Url = implode("", $this->Url);
            $this->Path = 'view' . DIRECTORY_SEPARATOR . strip_tags(trim($this->Url) . '.php');
            $this->VerificaArquivo();
        endif;
    }

    /* <b>VerificaArquivo</b>
     * Verifica se o arquivo existe nos diretorios principais do sistema       
     */

    private function VerificaArquivo() {
        if (file_exists($this->Path)):
            require_once($this->Path);
        else:
            $this->VerificaSubDiretorios();
        endif;
    }

    /*
     * Verifica se o arquivo existe em sub-diretorios      
     */

    private function VerificaSubDiretorios() {

        $file = [
                'form'
            ];
        $cfile = null;

        foreach ($file as $fileName):
            $this->Path = 'view' . DIRECTORY_SEPARATOR . $fileName . DIRECTORY_SEPARATOR . strip_tags(trim($this->Url) . '.php');
            if (file_exists($this->Path)):
                require_once($this->Path);
                $cfile = true;
            endif;
        endforeach;

        if (!$cfile):
            $this->Error = 'Arquivo não encontrado';
        endif;
    }

}