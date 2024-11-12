<?php

class HomeController{

	public function combinations() {

		$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

		if ($action == 'ajax') {
			
			if (isset($_POST["numRows"])) {

				/*=============================================
				Validamos la sintaxis de los campos
				=============================================*/
				if(preg_match('/^[0-9]{1,5}(\.[0-9]{0,2})?$/', $_POST["numRows"] )) {

					/*=============================================
					Realizamos el conteo de combinaciones
					=============================================*/
					$chars = array(1,0); // se cambio a datos binarios para poder alternar si esta marcado con  1 o no marcado con 0
					$output = TemplateController::fncComb($chars, $_POST["numRows"]);
					$countComb = count($output);

					$filas=$_POST['numRows'];

					/*=============================================
					Imprimimos el resultado del conteo
					=============================================*/
					echo '
					<button class="btn btn-primary" onclick="exportExcel()"><i class="fas fa-file-excel"></i></button>
					<button class="btn btn-primary" onclick="exportPdf()"><i class="fas fa-file-pdf"></i></button>
					<button class="btn btn-primary" onclick="exportWord()"><i class="fas fa-file-word"></i></button>
					<button class="btn btn-primary" onclick="exportPrint()"><i class="fas fa-print"></i></button>
					<hr class="divider">

					<div id="form-print">

						<div class="form-group mb-3">
							<span class="form-text text-muted">Total de filas: 
								<b>'.$filas.'</b>
							</span>
							<span class="form-text text-muted">Combinaciones: 
								<b>'.$countComb.'</b>
							</span>
						</div>

						<div class="row d-flex justify-content-center mb-3">';

						/*=============================================
						Creamos las tablas con la cantidad de combinaciones posibles
						=============================================*/
						$creaTabla = TemplateController::createTable($_POST["numRows"], $countComb/2, $countComb, $output);
						echo $creaTabla;

						echo '</div>
					</div>';

					if ($countComb > 0) {
						
						/*=============================================
						Cerramos el loader
						=============================================*/
						echo '<script>

							fncFormatInputs();
							matPreloader("off");
							fncSweetAlert("close", "", "");

						</script>';

					}

				} else {

					/*=============================================
					Cerramos el loader y mostramos la alerta
					=============================================*/
					echo '<script>

						fncFormatInputs();
						matPreloader("off");
						fncSweetAlert("close", "", "");
						fncNotie(3, "Error de sintaxis de campo");

					</script>';
					
				}

			} else {

				/*=============================================
				Mostramos el mensaje inicial o que no se han encontrado resultados
				=============================================*/
				echo '<div class="row justify-content-center">

						<div class="col-12 col-lg-10">
							<div class="card bg-primary shadow-soft border-light px-4 py-1 mb-6">
								<div class="card-body text-center text-md-left">
									<div class="row align-items-center">
										<div class="col-md-6">
											<h2 class="mb-3">No hay datos para mostrar</h2>
											<p class="mb-4">Ingrese un valor en el formulario para visualizar las combinaciones.</p>
										</div>
										<div class="col-12 col-md-6 mt-4 mt-md-0 text-md-right">
											<img src="views/assets/img/welcome.png" height="200" alt="illustration">
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>';

			}

		}

	}

}