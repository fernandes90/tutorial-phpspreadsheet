<?php

/**
 * Description of Mensagem
 *
 * @author Magno
 */

namespace Utils;

class Mensagem {

    private $texto;
    private $mensagem;
    private $tipo;

    public function getTexto() {
        return $this->texto;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTexto($texto): void {
        $this->texto = $texto;
    }

    public function setMensagem($mensagem): void {
        $this->mensagem = $mensagem;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    /**
     * <b>FormataMensagem:</b> Classifica as mensagens do sistema de acordo com o tipo informado
     * @param STRING  $Texto = CORPO DA MENSAGEM 
     * @param STRING  $Tipo  = TIPO DE MENSAGEM | AVISO | ERRO | SUCESSO   
     */
    public function FormataMensagem($Texto, $Tipo) {        
        
        $this->setTexto($Texto);
        $this->setTipo($Tipo);

        if ($this->getTipo() === 'aviso'):
            $this->setMensagem("<div class='alert alert-warning'>" . $this->getTexto() . "</div>");
        elseif ($this->getTipo() === 'erro'):
            $this->setMensagem("<div class='alert alert-danger'>" . $this->getTexto() . "</div>");
        elseif ($this->getTipo() === 'sucesso'):
            $this->setMensagem("<div class='alert alert-success'>" . $this->getTexto() . "</div>");
        endif;
        
        $this->ViewMensagens($this->getMensagem());
    }

    public function ViewMensagens($msg) {
        if (!empty($msg)):
            $_SESSION['Mensagem'] = (String) $msg;
        endif;
    }

}
