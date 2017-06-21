<?php
$idt = $_GET['idt'];

$guardar = $_POST['guardar'];
if($guardar == 'Modificar Comprobante'){
	$comp = $_POST['comprobante'];
	$sql = "UPDATE administra SET comprobante = '$comp' WHERE idadministra = $idt";
	mysql_query($sql);
}

$transaccion = selAdministr($idt);
$persona = Bper($transaccion['personas_cedula']);


?>
    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">

         <form name="formulario" method="POST" action="" id='formulario'>

		<!-- Form Name -->
		<legend class="text-center">Detalle de transacci&oacute;n</legend>

		<!-- Text input-->
		<p>
		  <label class="control-label" for="cuotas_codigo del credito"><strong>Fecha : </strong> <?php echo $transaccion['fecha']; ?></label>
		</p>

		<p>
		  <label class="control-label" for="cuotas_codigo del credito"><strong>Operaci&oacute;n : </strong> <?php echo $transaccion['tipo_operacion']; ?></label>
		</p>

		<p>
		  <label class="control-label" for="cuotas_codigo del credito"><strong>Concepto : </strong> <?php echo $transaccion['concepto']; ?></label>
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label"><strong>Detalle : </strong> <?php echo $persona['nombre'];?> <?php echo $transaccion['apellido'];?></label>
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label" ><strong>Monto ingreso : </strong> <?php echo round($transaccion['monto_ingreso'],2);?> </label>
		</p>

		<p>
		  <label class="control-label" ><strong>Monto egreso : </strong> <?php echo round($transaccion['monto_egreso'],2);?> </label>
		</p>
		<!-- Text input-->
		<p>
		  <label class="control-label"><strong>Nombre : </strong> <?php echo $persona['nombre']." ".$persona['apellido']; ?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Banco : </strong> <?php echo $transaccion['banco']; ?> </label> 
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label" ><strong>Comprobante : </strong> </label>
		  <input type="text" name="comprobante" id='comprobante' value="<?php echo $transaccion['comprobante'];?>">
		</p>

			<div class="form-controls">
				<input type="submit" name="guardar" value="Modificar Comprobante" class="btn btn-success">
				<a href="?e=10" class="btn btn-danger">Cancelar y volver</a>
			</div>
		</form>


		</div>
	</div>
</div>
