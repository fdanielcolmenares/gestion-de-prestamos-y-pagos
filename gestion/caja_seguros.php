<div class="alert alert-block ">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Atenci&oacute;n!</h4>
  La ultima transacci&oacute;n registrada no se ha completado, debe finalizarla antes de poder continuar...
</div>


       <form class="" method="POST">
		<fieldset>

		<legend class="">Seguros</legend>

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
		  <label class="control-label" for="aporte_codigotransacion"><strong>Concepto : </strong> SEGUROS </label>
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
		<!-- formulario -->
		<legend class="">Detalle del seguro</legend>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_numeroseguro">C&oacute;digo de seguro:</label>
		  <div class="controls">
		    <input id="seguros_numeroseguro" name="seguros_numeroseguro" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_salida">Origen de la carga:</label>
		  <div class="controls">
		    <input id="seguros_salida" name="seguros_salida" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_destino">Destino de la carga:</label>
		  <div class="controls">
		    <input id="seguros_destino" name="seguros_destino" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_chofer">Chofer del vehiculo:</label>
		  <div class="controls">
		    <input id="seguros_chofer" name="seguros_chofer" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_cedulachofer">Cédula de chofer:</label>
		  <div class="controls">
		    <input id="seguros_cedulachofer" name="seguros_cedulachofer" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_placa">Placa del vehiculo:</label>
		  <div class="controls">
		    <input id="seguros_placa" name="seguros_placa" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_marca">Marca del vehiculo:</label>
		  <div class="controls">
		    <input id="seguros_marca" name="seguros_marca" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_modelo">Modelo del vehiculo:</label>
		  <div class="controls">
		    <input id="seguros_modelo" name="seguros_modelo" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Select Basic -->
		<div class="control-group">
		  <label class="control-label" for="seguros_tipo">Tipo:</label>
		  <div class="controls">
		    <select id="seguros_tipo" name="seguros_tipo" class="input-xlarge">
		      <option>propio</option>
		      <option>flete</option>
		    </select>
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_kilos">Kilogramos de carga:</label>
		  <div class="controls">
		    <input id="seguros_kilos" name="seguros_kilos" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_montoasegura">Monto a asegurar:</label>
		  <div class="controls">
		    <input id="seguros_montoasegura" name="seguros_montoasegura" type="text" placeholder="" class="span4" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_asegurador">Asegurador:</label>
		  <div class="controls">
		    <input id="seguros_asegurador" name="seguros_asegurador" type="text" placeholder="" value="ASOHORJAUREGUI" class="span4" required="" readonly value="ASOHORJAUREGUI">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="seguros_cedulaasegurador">Cédula del asegurador:</label>
		  <div class="controls">
		    <input id="seguros_cedulaasegurador" name="seguros_cedulaasegurador" type="text" placeholder="" class="span4" required="" value="J-31205995-8" readonly>
		    
		  </div>
		</div>

		<!-- Button (Double) -->
		<div class="control-group">
		  <label class="control-label" for="seguros_botonguardar"></label>
		  <div class="controls">
		    <button id="seguros_botonguardar" name="guardar_seguro" value="guardar_seguro" type="submit" class="btn btn-success">Asegurar</button>
		    <button id="seguros_botoncancelar" name="seguros_botoncancelar" class="btn btn-danger">Cancelar</button>
		  </div>
		</div>

		</fieldset>
	</form>

    
