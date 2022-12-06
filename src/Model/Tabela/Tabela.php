<?php

namespace App\Model\Tabela;

class Tabela {

    private $cabecalho;
    private $informacoes;
    private $erro;

    public function getCabecalho() {
        return $this->cabecalho;
    }

    public function getInformacoes() {
        return $this->informacoes;
    }

    public function getErro() {
        return $this->erro;
    }

    public function setCabecalho($cabecalho): void {
        $this->cabecalho = $cabecalho;
    }

    public function setInformacoes($informacoes): void {
        $this->informacoes = $informacoes;
    }

    public function setErro($erro): void {
        $this->erro = $erro;
    }

    private function CriarCabecalhoTabela(array $dados) {
        if (!empty($dados) and is_array($dados)):
            $this->setCabecalho($dados[0]);
            return true;
        else:
            return false;
        endif;
    }

    private function CarregarDadosTabela(array $dados) {
        if (!empty($dados) and is_array($dados)):
            for ($i = 1; $i < count($dados); $i++):
                $dadosTabela[] = $dados[$i];
            endfor;
            $this->setInformacoes($dadosTabela);
            return true;
        else:
            return false;
        endif;
    }

    public function MontarTabela(array $dados) {
        if (empty($dados) or!is_array($dados)):
            $this->setErro('A planilha não contém informações');
            return false;
        endif;
        if ($this->CriarCabecalhoTabela($dados)):
            $this->getCabecalho();
        endif;
        if ($this->CarregarDadosTabela($dados)):
            $this->getInformacoes();
        endif;
        if (!empty($this->getCabecalho() and!empty($this->getInformacoes()))):
            echo "<table class='table table-hover'><thead><tr>";
            foreach ($this->getCabecalho() as $val):
                echo "<th>{$val}</th>";
            endforeach;
            echo "</tr></thead><tbody>";
            foreach ($this->getInformacoes() as $bval):
                echo "<tr>";
                foreach ($bval as $linhas):
                    echo "<td>{$linhas}</td>";
                endforeach;
                echo "</tr>";
            endforeach;
            echo "</tbody></table>";
        endif;
    }

}
