<!--begin::Cabecera-->
<header class="header-global" id="inpFix">

	<!--begin::Navbar-->
	<nav class="navbar navbar-light bg-light" id="navbar-main">

		<div class="container position-relative">

			<!--begin::Logo / Titulo-->
			<a class="navbar-brand shadow-soft py-2 px-3 rounded border border-light mr-lg-4" href="/">
				Math<b>App</b>
			</a>
			<!--end::Logo / Titulo-->

			<!--begin::Formulario-->
			<form autocomplete="off" id="enviar_form" name="enviar_form">
				
				<div class="input-group">
					<!--begin::Input-->
					<input type="text" class="form-control form-control-sm numRows" id="numRows" name="numRows" placeholder="Ingrese el n&uacute;mero de filas" onkeyup="validMax(this.value);" required>
					<!--end::Input-->
					<!--begin::Boton-->
					<div class="input-group-append">
						<button class="btn btn-primary text-secondary d-md-inline-block btn-sm" type="submit" id="button-addon2">Enviar</button>
					</div>
					<!--end::Boton-->
				</div>

			</form>
			<!--end::Formulario-->
			
		</div>

	</nav>
	<!--end::Navbar-->

</header>
<!--end::Cabecera-->