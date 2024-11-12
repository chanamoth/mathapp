<?php
/*=============================================
Requerimientos
=============================================*/
date_default_timezone_set('America/Lima');
require_once "../../../controllers/template.controller.php";
//require_once "../../../controllers/home.controller.php";

/*=============================================
Recogemos las filas enviadas
=============================================*/
$numRows = $_GET['numRows'];
$date = date('d-m-y h:i:s A');

/*=============================================
Incluimos las cabeceras
=============================================*/
header("Content-type: application/vnd.ms-excel");
header("Content-type: application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=Combinaciones con ".$numRows." filas (".$date.").xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$action  = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';

if ($action == 'ajax') {
    
    /*=============================================
    Realizamos el conteo de combinaciones
    =============================================*/
    $chars = array(1,0); // se cambio a datos binarios para poder alternar si esta marcado con  1 o no marcado con 0
    $output = TemplateController::fncComb($chars, $_GET["numRows"]);
    $countComb = count($output);

    $filas=$_GET['numRows'];

    /*=============================================
    Creamos las tablas con la cantidad de combinaciones posibles
    =============================================*/
    echo '<link rel="stylesheet" href="'.TemplateController::path().'views/assets/css/neumorphism.css">
        <link rel="stylesheet" href="'.TemplateController::path().'views/assets/css/custom.css">
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-center" colspan="2">Total de filas: <b>'.$filas.'</b><br>Combinaciones: <b>'.$countComb.'</b></th>
                            </tr>
                        </thead>
                    </table>
                    <div class="row d-flex justify-content-center mb-3">';
                    $creaTabla = TemplateController::exportTable($_GET["numRows"], $countComb/2, $countComb, $output);
                        echo $creaTabla;
                    echo '</div>
                </div>
            </div>
        </div>
    <br>';
    
}