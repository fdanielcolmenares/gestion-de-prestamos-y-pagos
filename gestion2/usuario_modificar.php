<?php

$buscar = $_POST['buscar'];
if($buscar == "buscar"){

$cedula = $_POST['cedula'];
$datos = Bper($cedula);
$datos_usuario = BUsu($cedula);
$tipo = $datos['tipo_usuario'];
if($tipo =="ADMINISTRADOR"){
	$opt1 = "selected=\"selected\"";
}
if($tipo =="ASISTENTE"){
	$opt2 = "selected=\"selected\"";
}
if($tipo =="USUARIO"){
	$opt3 = "selected=\"selected\"";
}


$estatus = $datos_usuario['estatus'];
if($estatus =="ACTIVO"){
	$ope1 = "selected=\"selected\"";
}
if($estatus =="INACTIVO"){
	$ope2 = "selected=\"selected\"";
}
}

$guardar = $_POST['guardar'];
if($guardar == "guardar"){
$ced = $_POST['usuarios_cedula'];
$log  = $_POST['usuarios_usuario'];
$pass  = $_POST['usuarios_contrasena'];
$tipo  = $_POST['usuarios_tipo'];
$estatus = $_POST['usuarios_estatus'];

ModUsu($log, $pass, $tipo, $estatus, $ced);

}

?>

    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">
               
               
				<form class="navbar-inner navbar-form pull-left span12" method="POST">
					<center>				
					  	<div class="input-append span6">
						  <input class="span6" id="appendedInputButton" type="text" name="cedula" Placeholder="C&eacute;dula">
						  <button class="btn" type="submit" name="buscar" value="buscar">Buscar</button>
						</div>
					</center>
				</form>


<?php if($datos['nombre']){ ?>			
			
   	<form class="form-horizontal" method="POST">
			<fieldset>

				<!-- Form Name -->
				<legend class="text-center">Modificar Usuario</legend>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="usuarios_cedula">C&eacute;dula:</label>
				  <div class="controls">
				    <input id="usuarios_cedula" name="usuarios_cedula" type="text" placeholder="" class="span4" required="" value="<?php echo $datos['cedula']; ?>">
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="usuarios_nombre">Nombre:</label>
				  <div class="controls">
				    <input id="usuarios_nombre" name="usuarios_nombre" type="text" placeholder=""  class="span4" required="" value="<?php echo $datos['nombre']; ?> <?php echo $datos['apellido']; ?>">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="usuarios_usuario">Usuario:</label>
				  <div class="controls">
				    <input id="usuarios_apellido" name="usuarios_usuario" type="text" placeholder="" class="span4" required="" value="<?php echo $datos_usuario['log']; ?>">
				    
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="control-group">
				  <label class="control-label" for="usuarios_tipode">Tipo de usuario:</label>
				  <div class="controls">
				    <select id="usuarios_tipodeusuario" name="usuarios_tipo" class="span4">
				      <option value="ADMINISTRADOR" <?php echo $opt1; ?> >administrador</option>
				      <option value="ASISTENTE" <?php echo $opt2; ?> >asistente</option>
				      <option value="USUARIO" <?php echo $opt3; ?> >usuario</option>
				    </select>
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="usuarios_contrasena">Ingrese contrase&ntilde;a:</label>
				  <div class="controls">
				    <input id="usuarios_contraseña" name="usuarios_contrasena" type="password" placeholder="introduzca contraseña" class="span4">
				    
				  </div>
				</div>



				<!-- Select Basic -->
				<div class="control-group">
				  <label class="control-label" for="usuarios_contraseñaestatus">Estatus:</label>
				  <div class="controls">
				    <select id="usuarios_estatus" name="usuarios_estatus" class="span4">
				      <option value="ACTIVO" <?php echo $ope1; ?> >ACTIVO</option>
				      <option value="INACTIVO" <?php echo $ope2; ?> >INACTIVO</option>
				    </select>
				  </div>
				</div>

				<!-- Button (Double) -->
				<div class="control-group">
				  <label class="control-label" for="usuarios_botguardausuarios"></label>
				  <div class="controls">
				    <button id="usuarios_botguardausuarios" name="guardar" value="guardar" type="submit" class="btn btn-success">Modificar</button>
				    
				  </div>
				</div>

			</fieldset>
	</form>	

<?php }?>
	</div>
  </div>
</div>

