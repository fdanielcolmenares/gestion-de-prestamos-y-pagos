
<div class="alert alert-block ">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Atenci&oacute;n!</h4>
  La ultima transacci&oacute;n registrada no se ha completado, debe finalizarla antes de poder continuar...
</div>




    <form class="" method="POST">
	<fieldset>

	<!-- Form Name -->
	<legend class="">Aportes</legend>


	<p>
	  <label class="control-label" for="aporte_fecha"><strong>Fecha : </strong> <?php echo $transaccion['fecha']; ?></label>
	</p>

	<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>Codigo de la transación : </strong><?php echo $transaccion['idadministra']; ?> </label>
	</p>
	<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>C&eacute;dula : </strong><?php echo $transaccion['personas_cedula']; ?> </label>
	</p>
	<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>Nombre : </strong><?php echo $persona_transaccion['nombre']; ?> <?php echo $persona_transaccion['apellido']; ?></label>
	</p>
	<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>Tipo de transaccion : </strong><?php echo $transaccion_tipo; ?> </label>
	</p>
	<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>Concepto : </strong> APORTES </label>
	</p>
	<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>Detalle : </strong><?php echo $transaccion['detalle']; ?> </label>
	</p>

	<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>Monto : </strong><?php echo $transaccion['monto_ingreso']; ?> </label>
	</p>

	<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>Comprobante : </strong><?php echo $transaccion['comprobante']; ?> </label>
	</p>
	
	<legend class="">Detalle del aporte</legend>

	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="aportes_fecha">Fecha correspondiente al aporte:</label>
	  <div class="controls">
	    <input id="aportes_cedula" name="aportes_fecha" type="date" placeholder="" class="span3" required="">
	    
	  </div>
	</div>

	<!-- Button (Double) -->
	<div class="control-group">
	  <label class="control-label" for="aportes_botonconsultar"></label>
	  <div class="controls">
	    <button id="aportes_botonconsultar" name="guardar_aporte" value="guardar_aporte" class="btn btn-primary">Procesar</button>
	  </div>
	</div>

	</fieldset>
</form>



