<?php
session_start();
ob_start();
require __DIR__. '/vendor/autoload.php';

use App\Controller\Form\FormController;
use App\Controller\Pagina\PaginaController;

$ctrForm    = new FormController();
$ctrPagina  = new PaginaController();

$getexe = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="dist/css/form.css" rel="stylesheet" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Exemplo de Importação com Excel</title>
</head>
<body>
    
    <div class="container" id="mainContainer">
        <?php
            if (isset($getexe)):
                $ctrPagina->VerificarUrl($getexe);
            else:
                header('location:form.html');
            endif;
        ?>
    </div>
</body>
</html>
<?php
ob_end_flush();