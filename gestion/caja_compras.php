<div class="alert alert-block ">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Atenci&oacute;n!</h4>
  La ultima transacci&oacute;n registrada no se ha completado, debe finalizarla antes de poder continuar...
</div>



    <form class="" method="POST">
	<fieldset>
	<legend>Compras</legend>

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
	  <label class="control-label" for="aporte_codigotransacion"><strong>Monto : </strong><?php echo $transaccion['monto_egreso']; ?> </label>
	</p>
		<p>
	  <label class="control-label" for="aporte_codigotransacion"><strong>Comprobante : </strong><?php echo $transaccion['comprobante']; ?> </label>
	</p>
	<legend class="">Detalle de la compra</legend>

	<!-- Text input-->



	<!-- select-->
			<div class="control-group">
			<label class="control-label" for="personas_estatus">Producto:</label>
				<div class="controls">
					<select id="compras_producto" name="compras_producto" class="span4">
					<option>--Seleccione--</option>
					<?php echo comboProductos(); ?>
					</select>
				</div>
			</div>
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="compras_cantidad">Cantidad:</label>
	  <div class="controls">
	    <input id="guias_montocarga" name="compras_cantidad" type="text" placeholder="" class="span4" required="">
	    
	  </div>
	</div>


	<!-- Button (Double) -->
	<div class="control-group">
	  <label class="control-label" for="guias_bottonguardar"></label>
	  <div class="controls">
	    <button type="submit" id="guias_bottonguardar" name="guardar_compra" value="guardar_compra"  class="btn btn-success">Procesar</button>
	  </div>
	</div>

	</fieldset>
</form>

