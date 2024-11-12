//Jquery
/*=============================================
Definimos el máximo de caracteres permitido
=============================================*/

var numRows = $('.numRows');
numRows.attr('maxlength','2');

/*=============================================
Validamos que solo se permita número
=============================================*/

numRows.on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

//Javascript
/*=============================================
Iniciamos el boton deshabilitado
=============================================*/

var btnSend = document.getElementById("button-addon2");

btnSend.disabled = true;

/*=============================================
Función para validar formulario
=============================================*/

function validMax(valor){

	if(valor.length > 0) {

		btnSend.disabled = false;

		if(valor > 20 || valor < 1) {

			if(valor > 20) {

				btnSend.disabled = true;
				fncFormatInputs();
				fncNotie(3, "Solo se permite un máximo de 20 filas");
				numRows.focus();

			} else if(valor < 1) {

				btnSend.disabled = true;
				fncFormatInputs();
				fncNotie(3, "Por favor ingrese un valor mayor a cero");
				numRows.focus();

			} else {

				btnSend.disabled = false;

			}

		}

	} else {

		btnSend.disabled = true;

	}

}

/*=============================================
Función up
=============================================*/

mybutton = document.getElementById("myBtn");
inpFix = document.getElementById("inpFix");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 65 || document.documentElement.scrollTop > 65) {
    mybutton.style.display = "block";
    inpFix.style.position = "sticky";
    inpFix.style.top = "0px";
    inpFix.classList.add("headroom--not-top1");
    //inpFix.classList.add("headroom--unpinned");
  } else {
    mybutton.style.display = "none";
    inpFix.style.position = "initial";
    inpFix.style.top = "0px";
    inpFix.classList.remove("headroom--not-top1");
    //inpFix.classList.remove("headroom--unpinned");
  }
}

function topFunction() {
  $('html, body').animate({scrollTop:0}, '600', 'swing');
}

/*=============================================
Enviamos los datos del formulario por ajax
=============================================*/

$("#enviar_form").submit(function(event) {

	var numRows = $('#numRows').val();
	var parametros = {"action":"ajax","page":1,"numRows":numRows};

	$.ajax({
		type: "POST",
		url: "ajax/data-home.php",
		data: parametros,

		beforeSend: function(objeto) {

			$('#button-addon2').attr("disabled", true);
			$('#numRows').attr("disabled", true);
			matPreloader("on");
			fncSweetAlert("loading", "Cargando combinaciones...", "");

		},
		
		success: function(datos) {
			$("#resultado").html(datos).fadeIn('slow');
			$('#button-addon2').html('Enviar');
			$('#button-addon2').attr("disabled", false);
			$('#numRows').attr("disabled", false);
			$("#numRows").focus();
			//$('html, body').animate({scrollTop:0}, '600', 'swing');
		}

	});

	event.preventDefault();

})

/*=============================================
Función para cargar la vista inicial
=============================================*/

function load(page){

	var numRows = $('#numRows').val();

	if (numRows > 0) {
		towC = numRows;
	} else {
		towC = ' ';
	}

	var parametros = {"action":"ajax","page":page,"numRows":towC};
	$("#loader").fadeIn('slow');
	$("#resultado").hide();
	$.ajax({
		//type: "POST",
		url:'ajax/data-home.php',
		data: parametros,
		beforeSend: function(objeto) {
			$("#loader").html('<div class="d-flex justify-content-center"><div class="spinner-border text-muted my-5"></div></div>');
		},
		success:function(data) {
			$("#resultado").html(data).fadeIn('slow');
			$("#loader").html("");
		}
	})
}




/*=============================================
Ejecutar funciones globales
=============================================*/

$(function() {
	load(1);
    //pagination();
    //listarRes();
});