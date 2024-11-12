<?php

/*=============================================
Capturar las rutas de la URL
=============================================*/
$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);

?>

<!DOCTYPE html>

<html lang="es">

	<head>
		<!--begin::Meta-->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!--end::Meta-->
	    <!--begin::Titulo-->
	    <title>.:: Web App Matemática ::.</title>
	    <!--end::Titulo-->
	    <!--begin::Base url-->
	    <base href="<?php echo TemplateController::path() ?>">
	    <!--end::Base url-->
	    <!--begin::Estilos css-->
	    <link rel="stylesheet" href="<?php echo TemplateController::path() ?>views/assets/css/neumorphism.css">
	    <link rel="stylesheet" href="<?php echo TemplateController::path() ?>views/assets/css/custom.css">
	    <link rel="stylesheet" href="views/assets/css/font-awesome/all.min.css">
	    <link rel="stylesheet" href="views/assets/plugins/material-preloader/material-preloader.css">
	    <link rel="stylesheet" href="views/assets/plugins/notie/notie.css">
	    <!--end::Estilos css-->
	    <!--begin::Scripts-->
		<script src="views/assets/vendor/jquery/dist/jquery.min.js"></script>
		<script src="views/assets/plugins/material-preloader/material-preloader.js"></script>
		<script src="views/assets/plugins/notie/notie.min.js"></script>
		<script src="views/assets/js/sweetalert2@10.js"></script>
		<script src="views/assets/js/alerts.js"></script>
		<script src="views/assets/js/html2pdf.min.js"></script>
		<!--end::Scripts-->
	</head>

	<body>
		
		<?php

		if(!empty($routesArray[1])){

			/*=============================================
			Si la ruta no viene vacia recorre la pagina
			=============================================*/
			if($routesArray[1] == "home"){

				/*=============================================
				Si la pagina existe incluye la cabecera y la pagina
				=============================================*/
				include "views/modules/navbar.php";
				include "views/pages/".$routesArray[1]."/".$routesArray[1].".php";

			} else {

				/*=============================================
				Caso contrario muestra la pagina de error 404
				=============================================*/
				include "views/pages/404/404.php";

			}

		} else {

			/*=============================================
			Si la ruta viene vacia redirige a la pagina principal
			=============================================*/
			include "views/modules/navbar.php";
			include "views/pages/home/home.php";

		}

		/*=============================================
		Incluimos el pie de pagina
		=============================================*/
		include "views/modules/footer.php";

		?>

		<!--begin::Scripts-->
		<script src="views/assets/js/custom.js"></script>
		<script src="views/assets/js/ventanaCentrada.js"></script>
		<script src="views/assets/js/export.js"></script>
		<!--end::Scripts-->
		
	</body>

</html>