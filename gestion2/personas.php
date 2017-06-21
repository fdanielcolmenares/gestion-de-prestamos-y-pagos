<?php

$guardar = $_POST['personas_guardar'];
if($guardar == 'personas_guardar'){

	$cedula = $_POST['personas_cedula'];
	$nombre  = $_POST['personas_nombre'];
	$apellido  = $_POST['personas_apellido'];
	$rif  = $_POST['personas_rif'];
	$direccion  = $_POST['personas_direccion'];
	$fecha_ingreso  = $_POST['personas_fecha'];
	$telf1  = $_POST['personas_telefono1'];
	$telf2  = $_POST['personas_telefono2'];
	$telf3  = $_POST['personas_telefono3'];
	$fecha_nacimiento  = $_POST['personas_fechanacimiento'];
	$tipo  = $_POST['personas_tipo'];
	$estatus  = $_POST['personas_estatus'];

	insPersonas($cedula, $nombre, $apellido, $rif, $direccion, $fecha_ingreso, $telf1, $telf2, $telf3, $fecha_nacimiento, $tipo, $estatus);

}

?>

    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">
                <form class="form-horizontal" method="POST" name="formulario">
			<fieldset>

			<legend class="text-center">Nuevo Registro</legend>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_cedula">Cédula:</label>
			  <div class="controls">
			    <input id="personas_cedula" name="personas_cedula" type="text" placeholder="" class="span4"required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_nombre">Nombre:</label>
			  <div class="controls">
			    <input id="personas_nombre" name="personas_nombre" type="text" placeholder="" class="span4"required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_apellido">Apellido:</label>
			  <div class="controls">
			    <input id="personas_apellido" name="personas_apellido" type="text" placeholder="" class="span4"required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_rif">RIF:</label>
			  <div class="controls">
			    <input id="Personas_rif" name="personas_rif" type="text" placeholder="" class="span4"required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_direccion">Dirección de habitación:</label>
			  <div class="controls">
			    <input id="personas_direccion" name="personas_direccion" type="text" placeholder="" class="span4"required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_fecha">Fecha de ingreso:</label>
			  <div class="controls">
			    <input id="personas_fecha" name="personas_fecha" type="date" placeholder="xx/yy/zzzz" class="span4"required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_telefono1">Teléfono 1:</label>
			  <div class="controls">
			    <input id="personas_telefono1" name="personas_telefono1" type="text" placeholder="" class="span4"required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_telefono2">Teléfono 2:</label>
			  <div class="controls">
			    <input id="personas_telefono2" name="personas_telefono2" type="text" placeholder="" class="span4">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_telefono3">Direcci&oacute;n de feria:</label>
			  <div class="controls">
			    <input id="personas_telefono3" name="personas_telefono3" type="text" placeholder="" class="span4">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="personas_fechanacimiento">Fecha de nacimiento:</label>
			  <div class="controls">
			    <input id="personas_fechanacimiento" name="personas_fechanacimiento" type="date" placeholder="xx/yy/zzzz" class="span4"required="">
			    
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="control-group">
			  <label class="control-label" for="personas_tipo">Tipo de relación:</label>
			  <div class="controls">
			    <select id="personas_tipo" name="personas_tipo" class="span4">
			      <option value="SOCIO">Socio</option>
			      <option value="AFILIADO">Afiliado</option>
			    </select>
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="control-group">
			  <label class="control-label" for="personas_estatus">Estatus:</label>
			  <div class="controls">
			    <select id="personas_estatus" name="personas_estatus" class="span4">
			      <option value="ACTIVO">Activo</option>
			      <option value="INACTIVO">Inactivo</option>
			    </select>
			  </div>
			</div>

			<!-- Button (Double) -->
			<div class="control-group">
			  <label class="control-label" for="personas_guardar"></label>
			  <div class="controls">
			    <button id="personas_guardar" name="personas_guardar" value="personas_guardar" class="btn btn-success" type="submit">Guardar</button>
			    <button id="personas_cancelar" name="personas_cancelar" class="btn btn-danger">Cancelar</button>
			  </div>
			</div>

			</fieldset>
	</form>


                
	</div>
  </div>
</div>

