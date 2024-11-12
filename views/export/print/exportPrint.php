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

$action  = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
//export.php  
if($action == 'ajax')  
{  
     
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
        <div class="container" id="htmlPrint">
            <div class="card mb-3">
                <div class="card-body">
                    <table border="1" cellspacing="0" style="margin-left: 17px;">
                        <thead>
                            <tr>
                                <th class="text-center" colspan="2" style="padding: 5px;">Total de filas: <b>'.$filas.'</b><br>Combinaciones: <b>'.$countComb.'</b></th>
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
        <button id="btnImpr" style="display: none;">Imprimir</button>';

} ?>
<script src="<?php echo TemplateController::path(); ?>views/assets/vendor/jquery/dist/jquery.min.js"></script>
<script>
    function printHtml() {
        window.print();
        //window.close();
    }
    setTimeout(printHtml, 1);
</script>