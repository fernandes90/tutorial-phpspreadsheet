<?php

namespace App\Controller\Form;

use App\Model\Form\Form;
use Utils\Mensagem;

class FormController {

    private $form;
    private $mensagem;

    function __construct() {
        $this->form = new Form;
        $this->mensagem = new Mensagem;
    }

    public function SubmitForm($data) {
        if ($this->form->ValidaArquivo($data)):
            if($this->TransformarArquivo($data)):
                return true;
            else:
                $this->mensagem->FormataMensagem($this->form->getMensagem(),'erro');
                header('Location: form.html');
            endif; 
        else:
            $this->mensagem->FormataMensagem($this->form->getMensagem(),'erro');   
            header('Location: form.html');
        endif;
    }
    
    
    public function PegarDados(){
        return !empty($this->form->getResult()) ? $this->form->getResult() : NULL;
    }

    public function TransformarArquivo($data) {
        if ($this->form->LerArquivo($data)):
            return true;
        else:
            return false;
        endif;
    }
    

}
