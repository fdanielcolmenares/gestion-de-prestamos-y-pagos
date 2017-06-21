<?php

if($nivel == 'USUARIO'){
$cedula = $ced_usuario;
}

$cedula = $_POST['cedula'];
if($cedula){
}else{
$cedula = $_GET['cedula'];
}
$datos = Bper($cedula);

$pgc = $_GET['pgc'];
if($pgc){
$pgcant = $pgc-1;
$pgcsig = $pcg+1;
}else{
$pgc = 0;
$pgcant = 0;
$pgcsig = $pgcant+1;
}

$pgs = $_GET['pgs'];
if($pgs){
$pgcants = $pgs-1;
$pgcsigs = $pcs+1;
}else{
$pgs = 0;
$pgcants = 0;
$pgcsigs = $pgcants+1;
}

$pgg = $_GET['pgg'];
if($pgg){
$pgcantg = $pgg-1;
$pgcsigg = $pcg+1;
}else{
$pgg = 0;
$pgcantg = 0;
$pgcsigg = $pgcantg+1;
}
?>

    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">
						
				<form class="navbar-inner navbar-form pull-left span12" method="POST">
					<center>				
					  	<div class="input-append span6">
					<?php if($nivel == 'USUARIO'){ ?>
						  <input class="span6" id="appendedInputButton" type="text" name="cedula" Placeholder="C&eacute;dula" readonly="readonly" value="<?php echo $ced_usuario; ?>">
					<?php }else{ ?>
						<input class="span6" id="appendedInputButton" type="text" name="cedula" Placeholder="C&eacute;dula">
					<?php } ?>
						  <button class="btn" type="submit">Buscar</button>
						</div>
					</center>
				</form>

				</br></br></br>
				<table class="table-striped table-bordered span12">
					<thead>
						<tr>
							<td><strong>C.I</strong></td>
							<td><strong>Nombres y Apellidos</strong></td>
							<td><strong>Usuario</strong></td>
							<td><strong>Nivel</strong></td>
						</tr>
					</thead>
					<tbody>

					<?php 
						$sql = "SELECT * FROM usuarios ORDER BY tipo_usuario ASC";
						$ej = mysql_query($sql);
						while ($dt=mysql_fetch_array($ej)) {

						$dt_persona =	Bper($dt['personas_cedula']);
						$nombre = $dt_persona['nombre'];
						$apellido = $dt_persona['apellido'];

					?>
						<tr>
							<td><?php echo $dt['personas_cedula']; ?></td>
							<td><?php echo $nombre." ".$apellido; ?></td>
							<td><?php echo $dt['log']; ?></td>
							<td><?php echo $dt['tipo_usuario']; ?></td>
						</tr>
					<?php
						}

					?>

					</tbody>
				</table>
				
			
								
<?php if($datos['nombre']){ ?>			

<legend>Datos de la persona</legend>
				<p>
				  <label class="control-label"><strong>Nombre : </strong> <?php echo $datos['nombre']; ?> </label>
				</p>

				<!-- Text input-->
				<p>
				  <label class="control-label"><strong>Apellido : </strong> <?php echo $datos['apellido']; ?> </label>
				</p>


				<!-- Text input-->
				<p>
				  <label class="control-label" ><strong>Rif : </strong> <?php echo $datos['rif']; ?> </label>
				</p>

				<!-- Text input-->
				<p>
				  <label class="control-label"><strong>Direccion de habitación : </strong> <?php echo $datos['direccion']; ?></label>
				</p>

				<p>
				  <label class="control-label"><strong>Fecha de ingreso : </strong><?php echo $datos['fecha_ingreso']; ?></label>
				</p>

				<!-- Text input-->
				<p>
				  <label class="control-label"><strong>Telefono 1 : </strong><?php echo $datos['telefono1']; ?></label>
				</p>

				<!-- Text input-->
				<p>
				  <label class="control-label"><strong>Telefono 2 : </strong><?php echo $datos['telefono2']; ?></label>
				</p>


				<!-- Text input-->
				<p>
				  <label class="control-label" ><strong>Direcci&oacute;n de feria : </strong><?php echo $datos['telefono3']; ?></label>
				</p>

				<!-- Text input-->
				<p>
				  <label class="control-label"><strong>Fecha de nacimiento : </strong><?php echo $datos['fecha_nacimiento']; ?></label>
				</p>

				<!-- Text input-->
				<p>
				  <label class="control-label"><strong>Tipo de relación : </strong><?php echo $datos['tipo']; ?></label>
				</p>

				<p>
				  <label class="control-label"><strong>Estatus : </strong><?php echo $datos['estatus']; ?></label>
				</p>

		<?php if($nivel == 'ADMINISTRADOR' OR $nivel == 'ASISTENTE'){ ?>
			<a href="?e=3&cedula=<?php echo $datos['cedula']; ?>" class="btn" >Modificar</a>
		<?php }?>
			
			


			<legend class="text-center">Créditos</legend>


			<table class="table table-striped table-bordered">
			  <thead>
			    <tr>
			      <th>Codigo</th>
			      <th>Fecha</th>
   			      <th>Monto</th>
			      <th>Estatus</th>
			      <th>Acci&oacute;n</th>
				</tr>
			  </thead>
			  <tbody>
				<?php echo persona_creditos($cedula, $pgc); ?>
   		          </tbody>
			</table>
	
			<ul class="pager">
			  <li class="previous">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pgc=<?php echo $pgcant;?>">&larr; Anterior</a>
			  </li>
			  <li class="next">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pgc=<?php echo $pgcsig;?>">Siguiente &rarr;</a>
			  </li>
			</ul>



			<legend class="text-center">Cargas aseguradas</legend>



			<table class="table table-striped table-bordered">
			  <thead>
			    <tr>
			        <th>Número de seguro</th>
			        <th>Fecha</th>
				<th>Monto</th>
				<th>Monto Asegurado</th>
				<th>Origen</th>
				<th>Destino</th>
				<th>Acci&oacute;n</th>
				</tr>
			  </thead>
			  <tbody>
				<?php echo persona_cargas($cedula, $pgs); ?>
			  </tbody>
			</table>


			<ul class="pager">
			  <li class="previous">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pgs=<?php echo $pgcants;?>">&larr; Anterior</a>
			  </li>
			  <li class="next">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pgs=<?php echo $pgcsigs;?>">Siguiente &rarr;</a>
			  </li>
			</ul>


			<legend class="text-center">Guias</legend>


			<table class="table table-striped table-bordered">
			  <thead>
			    <tr>
			      <th>Número de guia</th>
			      <th>Fecha</th>
   			      <th>Monto</th>
   			      <th>Placa</th>
   			      <th>Origen</th>
   			      <th>Destino</th>
	
   			      <th>Acci&oacute;n</th>
			
				</tr>
			  </thead>
			  <tbody>
				<?php echo persona_guias($cedula, $pgg); ?>

  		          </tbody>
			</table>

			<ul class="pager">
			  <li class="previous">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pgg=<?php echo $pgcantg;?>">&larr; Anterior</a>
			  </li>
			  <li class="next">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pgg=<?php echo $pgcsigg;?>">Siguiente &rarr;</a>
			  </li>
			</ul>



<?php }?>
	</div>
  </div>
</div>

