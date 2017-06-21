<?php

if($nivel == 'USUARIO'){
$cedula = $ced_usuario;
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

$pga = $_GET['pga'];
if($pga){
$pgcanta = $pga-1;
$pgcsiga = $pca+1;
}else{
$pga = 0;
$pgcanta = 0;
$pgcsiga = $pgcanta+1;
}

$pgj = $_GET['pgj'];
if($pgj){
$pgcantj = $pgj-1;
$pgcsigj = $pcj+1;
}else{
$pgj = 0;
$pgcantj = 0;
$pgcsigj = $pgcantj+1;
}
?>

    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">
						

				
			
								
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


			<legend class="text-center">Gu&iacute;as</legend>


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


			<legend class="text-center">Aportes</legend>


			<table class="table table-striped table-bordered">
			  <thead>
			    <tr>
			      <th class="span2">Fecha</th>
			      <th class="span2">Cuota</th>
			      <th>Concepto</th>

   			      <th>Monto</th>
   			      <th>Comprobante</th>
   			      <th>Banco</th>

			      
			
				</tr>
			  </thead>
			  <tbody>
				<?php echo persona_aportes($cedula, $pga); ?>

  		          </tbody>
			</table>

			<ul class="pager">
			  <li class="previous">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pga=<?php echo $pgcanta;?>">&larr; Anterior</a>
			  </li>
			  <li class="next">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pga=<?php echo $pgcsiga;?>">Siguiente &rarr;</a>
			  </li>
			</ul>


			<legend class="text-center">Ajustes</legend>


			<table class="table table-striped table-bordered">
			  <thead>
			    <tr>
			      <th>Fecha</th>
			      <th>Detalle</th>
   			      <th>Monto de Ingreso</th>
   			      <th>Monto de Egreso</th>
   			      <th>Comprobante</th>
   			      <th>Banco</th>
				</tr>
			  </thead>
			  <tbody>
				<?php echo persona_ajustes($cedula, $pgj); ?>

  		          </tbody>
			</table>

			<ul class="pager">
			  <li class="previous">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pgj=<?php echo $pgcantj;?>">&larr; Anterior</a>
			  </li>
			  <li class="next">
			    <a href="?e=2&cedula=<?php echo $cedula; ?>&pgj=<?php echo $pgcsigj;?>">Siguiente &rarr;</a>
			  </li>
			</ul>

<?php }?>
	</div>
  </div>
</div>

