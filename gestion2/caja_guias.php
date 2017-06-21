<div class="alert alert-block ">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Atenci&oacute;n!</h4>
  La ultima transacci&oacute;n registrada no se ha completado, debe finalizarla antes de poder continuar...
</div>



    <form class="" method="POST">
	<fieldset>
	<legend>Guias</legend>

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
	  <label class="control-label" for="aporte_codigotransacion"><strong>Concepto : </strong>GUIAS </label>
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
	<legend class="">Detalle de la guia</legend>

	<!-- Text input-->



	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="guias_kiloscarga">Kilogramos de carga:</label>
	  <div class="controls">
	    <input id="guias_kiloscarga" name="guias_kiloscarga" type="text" placeholder="" class="span4" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="guias_montocarga">Monto de la carga:</label>
	  <div class="controls">
	    <input id="guias_montocarga" name="guias_montocarga" type="text" placeholder="" class="span4" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="guias_salida">Origen de la carga:</label>
	  <div class="controls">
	    <input id="guias_salida" name="guias_salida" type="text" placeholder="" class="span4" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="guias_destino">Destino de la carga:</label>
	  <div class="controls">
	    <input id="guias_destino" name="guias_destino" type="text" placeholder="" class="span4" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="guias_placa">Placa del vehiculo:</label>
	  <div class="controls">
	    <input id="guias_placa" name="guias_placa" type="text" placeholder="" class="span4" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="guias_modelo">Modelo del vehiculo:</label>
	  <div class="controls">
	    <input id="guias_modelo" name="guias_modelo" type="text" placeholder="" class="span4" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="guias_marca">Marca del vehiculo:</label>
	  <div class="controls">
	    <input id="guias_marca" name="guias_marca" type="text" placeholder="" class="span4" required="">
	    
	  </div>
	</div>

	<!-- Button (Double) -->
	<div class="control-group">
	  <label class="control-label" for="guias_bottonguardar"></label>
	  <div class="controls">
	    <button type="submit" id="guias_bottonguardar" name="guardar_guia" value="guardar_guia"  class="btn btn-success">Procesar</button>
	  </div>
	</div>

	</fieldset>
</form>

