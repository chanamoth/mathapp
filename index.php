<?php

/*=============================================
Mostrar errores
=============================================*/
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "C:/laragon/www/mathapp/php_error_log");

/*=============================================
Requerimientos
=============================================*/
require_once "controllers/template.controller.php";

/*=============================================
Ejecutamos la plantilla
=============================================*/
$index = new TemplateController();
$index -> index();