<?php

use App\Controller\Form\FormController;
use App\Controller\Tabela\TabelaController;
?>
<?php
if (!empty($_SESSION['Mensagem'])):    
    echo "<div class='row'>{$_SESSION['Mensagem']}</div>";
    unset($_SESSION['Mensagem']);
endif;
?>
<div class="row">
    <div class="col-6 offset-2">
        <h2>Tutorial Importação Planilha Excel</h2>
        <hr>
        <form id="frmArquivo" name="frmArquivo" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-2">
                    <label>Arquivo</label>
                </div>
                <div class="col-8">
                    <input type="file" class="form-control" id="arquivo" name="arquivo" required />
                    <input type="hidden" name="hddnSalvar" id="hddnSalvar" value="hddnSalvar" />
                </div>
                <div class="col-2">
                    <button class="btn btn-primary " type="submit">Enviar</button>
                </div>
            </div>
            <br>
        </form>
    </div>
</div>

<?php
$validate = filter_input(INPUT_POST, 'hddnSalvar', FILTER_SANITIZE_STRING);
if ($validate):
    $data = filter_var_array($_FILES, FILTER_DEFAULT);
    $ctrForm = new FormController;
    if ($ctrForm->SubmitForm($data)):
       $dadosTabela = $ctrForm->PegarDados();
    endif;
    if(isset($dadosTabela) and is_array($dadosTabela)):
        $ctrTabela = new TabelaController;
        $ctrTabela->CriarTabela($dadosTabela); 
    endif;    
endif;
?>