

          <form class="" method="POST">
		<fieldset>


		<fieldset>
		<legend>Creditos</legend>

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
		<legend class="">Detalle del credito</legend>

		<div class="control-group">
		  <label class="control-label" for="credito_monto">Monto:</label>
		  <div class="controls">
		    <input type="number" id="credito_monto" name="credito_monto" class=" span4" readonly="true" value="<?php echo $transaccion['monto_egreso']; ?>">
		  </div>
		</div>

		<div class="control-group">
		  <label class="control-label" for="credito_interes">Interes (%):</label>
		  <div class="controls">
		    <input type="number" id="credito_interes" name="credito_interes" class=" span1">
		  </div>
		</div>



		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="credito_fecha">Fecha:</label>
		  <div class="controls">
		    <input id="credito_fecha" name="credito_fecha" type="date" placeholder="xx/yy/zzzz" class="span4"required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="credito_concepto">Concepto:</label>
		  <div class="controls">
		    <input id="credito_concepto" name="credito_concepto" type="text" placeholder="" class="span4"required="">
		    
		  </div>
		</div>

		<!-- Select Basic -->
		<div class="control-group">
		  <label class="control-label" for="credito_plazo">Plazo en meses:</label>
		  <div class="controls">
		    <select id="credito_plazo" name="credito_plazo" class="input-xlarge">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		      <option>6</option>
		      <option>7</option>
		      <option>8</option>
		      <option>9</option>
		      <option>10</option>
		      <option>11</option>
		      <option>12</option>
		      <option>13</option>
		      <option>14</option>
		      <option>15</option>
		      <option>16</option>
		      <option>17</option>
		      <option>18</option>
		      <option>19</option>
		      <option>20</option>
		      <option>21</option>
		      <option>22</option>
		      <option>23</option>
		      <option>24</option>

		    </select>
		  </div>
		</div>


		<!-- Textarea -->
		<div class="control-group">
		  <label class="control-label" for="credito_garantia">Garantías:</label>
		  <div class="controls">                     
		    <textarea id="credito_garantia" name="credito_garantia"></textarea>
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="credito_fiador">Fiador:</label>
		  <div class="controls">
		    <input id="credito_fiador" name="credito_fiador" type="text" placeholder="" class="span4"required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="credito_cedulafiador">Cédula del fiador:</label>
		  <div class="controls">
		    <input id="credito_cedulafiador" name="credito_cedulafiador" type="text" placeholder="" class="span4"required="">
		    
		  </div>
		</div>

		<!-- Button (Double) -->
		<div class="control-group">
		  <label class="control-label" for="credito_botonguardar"></label>
		  <div class="controls">
		    <button type="submit" id="credito_botonguardar" name="guardar_credito" value="guardar_credito" class="btn btn-success">Guardar</button>
		    <button id="credito_botoncancelar" name="credito_botoncancelar" class="btn btn-danger">Cancelar</button>
		  </div>
		</div>

		</fieldset>
	</form>

