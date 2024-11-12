<?php

class TemplateController {

	/*=============================================
	Ruta del aplicativo
	=============================================*/
	static public function path() {

		return "http://mathapp.local/";

	}

	/*=============================================
	Traemos la Vista Principal de la plantilla
	=============================================*/
	public function index() {

		include "views/template.php";

	}

	/*=============================================
	Función para calcular las combinaciones posibles
	=============================================*/
	static public function fncComb($chars, $size, $combinations = array()) {

	    if (empty($combinations)) {

	        $combinations = $chars;

	    }

	    if ($size == 1) {

	        return $combinations;

	    }

	    $new_combinations = array();

	    foreach ($combinations as $combination) {

	        foreach ($chars as $char) {

	            $new_combinations[] = $combination .' '. $char;

	        }

	    }

	    /*=============================================
		Si la cantidad de filas es valida ejecuta la funcion
		=============================================*/
	    if (!empty($size)) {

	    	return TemplateController::fncComb($chars, $size - 1, $new_combinations);

	    }

	}

	/*=============================================
	Función para crear las tablas
	=============================================*/
	static public function createTable($rows, $tables, $countComb, $output) {

		$count = 1;
		$s = '';
		$celdas=$rows;
		
		$dato=[[]];
		$long=0;
		$col=0;

		/*=============================================
		Obtenemos las combinaciones y las guardamos en un arreglo
		=============================================*/
		for ($t=0; $t<$countComb ; $t++) {

			for ($x=0 ; $x<$celdas; $x++) {

				$long = explode(" ", $output[$t]);
				$dato[$x][$t]=$long[$x];
					
			}

		}

		/*=============================================
		Creamos las tablas con la cantidad de combinaciones posibles
		=============================================*/
		for ($iT=0; $iT < $tables*2; $iT++) {

			$s .= '<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 scroll article-loop">';
			$s .= '<table class="table table-hover table-bordered">';

			/*=============================================
			Creamos la cabecera
			=============================================*/
			$counter = $count++;
			$s .= '<thead>';

			$s .= '<tr>';
			$s .= '<th class="text-center col1" colspan="2">'.$counter.'</th>';
			$s .= '</tr>';

			$s .= '</thead>';

			/*=============================================
			Creamos el cuero
			=============================================*/
			$s .= '<tbody>';

			$h=0;
			$f=0;

			for ($iR=0; $iR < $rows; $iR++) {

				/*=============================================
				Creamos las filas
				=============================================*/
		        $s .= '<tr>';
		        $f=$iR;

				for ($m=0; $m < 2; $m++) {

					$h++;
					$col=$dato[$iR][$iT];

					/*=============================================
					Creamos las celdas y las pintamos si cumple la condicional
					=============================================*/
					if (($iR==$f) and ($m==$col)) {

						$s .= '<td class="text-center color-none" style="background:none;" id="celda">&nbsp;</td>';

					} else {

						$s .= '<td class="text-center color-yellow" style="background:#FFFF00 !important;" id="celda">&nbsp;</td>';

					}

				}

		        $s .= '</tr>';

		    }

	        $s .= '</tbody>';

	        $s .= '</table>';

	        $s .='</div>';

		}

		/*=============================================
		Imprimimos las tablas creada
		=============================================*/
		return $s;

	}

	/*=============================================
	Función para exportar las tablas
	=============================================*/
	static public function exportTable($rows, $tables, $countComb, $output) {

		$count = 1;
		$s = '';
		$celdas=$rows;
		
		$dato=[[]];
		$long=0;
		$col=0;

		/*=============================================
		Obtenemos las combinaciones y las guardamos en un arreglo
		=============================================*/
		for ($t=0; $t<$countComb ; $t++) {

			for ($x=0 ; $x<$celdas; $x++) {

				$long = explode(" ", $output[$t]);
				$dato[$x][$t]=$long[$x];
					
			}

		}

		/*=============================================
		Creamos las tablas con la cantidad de combinaciones posibles
		=============================================*/
		for ($iT=0; $iT < $tables*2; $iT++) {
			
			$s .= '<table border="1" cellspacing="0" style="margin-right: 10px; margin-top: 10px; text-align: center;">';

			/*=============================================
			Creamos la cabecera
			=============================================*/
			$counter = $count++;
			$s .= '<thead>';

			$s .= '<tr>';
			$s .= '<th colspan="2">'.$counter.'</th>';
			$s .= '</tr>';

			$s .= '</thead>';

			/*=============================================
			Creamos el cuero
			=============================================*/
			$s .= '<tbody>';

			$h=0;
			$f=0;

			for ($iR=0; $iR < $rows; $iR++) {

				/*=============================================
				Creamos las filas
				=============================================*/
		        $s .= '<tr>';
		        $f=$iR;

				for ($m=0; $m < 2; $m++) {

					$h++;
					$col=$dato[$iR][$iT];

					/*=============================================
					Creamos las celdas y las pintamos si cumple la condicional
					=============================================*/
					if (($iR==$f) and ($m==$col)) {

						$s .= '<td class="text-center" id="celda" style="background:none; width: 80px;" >&nbsp;</td>';

					} else {

						$s .= '<td class="text-center" id="celda" style="background:#FFFF00; width: 80px;" >&nbsp;</td>';

					}

				}

		        $s .= '</tr>';

		    }

	        $s .= '</tbody>';

	        $s .= '</table>';

			$s .='<br>';

		}

		/*=============================================
		Imprimimos las tablas creada
		=============================================*/
		return $s;

	}

}