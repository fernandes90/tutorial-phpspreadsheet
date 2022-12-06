<?php

namespace App\Controller\Pagina;

use App\Model\Pagina\Pagina;

class PaginaController{

    private $pagina;

    function __construct() {
        $this->pagina = new Pagina();
    }

    public function VerificarUrl($url){
        if(!$this->pagina->VerificaUrl($url)):
            echo "{$this->pagina->getError()}";
        endif;    
    }
}