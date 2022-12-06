<?php

namespace App\Controller\Tabela;
use App\Model\Tabela\Tabela;

class TabelaController{
    private $tabela;
    
    public function __construct() {
        $this->tabela = new Tabela;
    }

    public function CriarTabela($dados){
        $this->tabela->MontarTabela($dados);
    }
    
}

