<?php

/*=============================================
Incluimos los controladores
=============================================*/
require_once "../controllers/template.controller.php";
require_once "../controllers/home.controller.php";

/*=============================================
Esperamos un minuto para disfrutas del loader
=============================================*/
sleep(1);

/*=============================================
Ejecutamos la clase
=============================================*/
$objeHome = new HomeController;
$consulta = $objeHome->combinations();

/*=============================================
Mostramos los resultados
=============================================*/
echo $consulta;