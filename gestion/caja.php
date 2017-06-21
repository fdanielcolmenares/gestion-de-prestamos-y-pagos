<?php
//ultima transaccion registrada
$transaccion = ultAdministr();

//ingresar nuevo aporte
$guardar_aporte = $_POST['guardar_aporte'];
if($guardar_aporte =='guardar_aporte'){
	$fecha = $_POST['aportes_fecha'];
	$id = $transaccion['idadministra'];
	insAporte ($fecha,$id);
}

//ingresar nueva guia
$guardar_guia = $_POST['guardar_guia'];
if($guardar_guia =='guardar_guia'){

$kilos = $_POST['guias_kiloscarga'];
$monto = $_POST['guias_montocarga'];
$salida = $_POST['guias_salida'];
$destino = $_POST['guias_destino'];
$placa = $_POST['guias_placa'];
$modelo = $_POST['guias_modelo'];
$marca = $_POST['guias_marca'];
$admid = $transaccion['idadministra'];

insGuia($kilos, $monto, $salida, $destino, $placa, $modelo, $marca, $admid);

}

//ingresar nuevo seguro

$guardar_seguro = $_POST['guardar_seguro'];
if($guardar_seguro =='guardar_seguro'){
$numero = $_POST['seguros_numeroseguro'];
$salida = $_POST['seguros_salida'];
$destino = $_POST['seguros_destino'];
$chofer = $_POST['seguros_chofer'];
$ced_chofer = $_POST['seguros_cedulachofer'];
$placa = $_POST['seguros_placa'];
$marca = $_POST['seguros_marca'];
$modelo = $_POST['seguros_modelo'];
$tipo = $_POST['seguros_tipo'];
$kilos_carga = $_POST['seguros_kilos'];
$monto = $_POST['seguros_montoasegura'];
$asegurador = $_POST['seguros_asegurador'];
$ced_asegurador = $_POST['seguros_cedulaasegurador'];
$admid = $transaccion['idadministra'];

insSeguro($numero, $salida, $destino, $chofer, $ced_chofer, $placa, $marca, $modelo, $tipo, $kilos_carga, $monto, $asegurador, $ced_asegurador, $admid);
}

//ingresar nueva compra de productos tabla movimientos

$guardar_compra = $_POST['guardar_compra'];
if($guardar_compra == 'guardar_compra'){
$cantidad = $_POST['compras_cantidad'];
$admid = $transaccion['idadministra'];
$idprod = $_POST['compras_producto'];
insMovimiento ($cantidad, $admid, $idprod);
}

//ingresar nueva venta de productos tabla movimientos

$guardar_venta = $_POST['guardar_venta'];
if($guardar_venta == 'guardar_venta'){
$cantidad = $_POST['compras_cantidad'];
$admid = $transaccion['idadministra'];
$idprod = $_POST['compras_producto'];
insMovimientoVenta($cantidad, $admid, $idprod);
}

//ingresar nuevo credito 
$guardar_credito = $_POST['guardar_credito'];
if($guardar_credito == 'guardar_credito'){
$monto = $_POST['credito_monto'];
$fecha = $_POST['credito_fecha'];
$concepto = $_POST['credito_concepto'];
$cuotas = $_POST['credito_plazo'];
$plazo = $_POST['credito_plazo'];
$garantias = $_POST['credito_garantia'];
$fiador = $_POST['credito_fiador'];
$ced_fiador = $_POST['credito_cedulafiador'];
$estatus = 'ABIERTO';
$admid = $transaccion['idadministra'];
$interes = $_POST['credito_interes'];
insCredito($monto, $fecha, $concepto, $cuotas, $plazo, $garantias, $fiador, $ced_fiador, $estatus, $admid, $interes);
}

//verificar si hay transacciones abiertas

$transaccion_tipo = $transaccion['tipo_operacion'];
if($transaccion_tipo =='INGRESO'){
	$transaccion_ingreso = $transaccion['ingresos'];
	if($transaccion_ingreso=='APORTES'){
		//verifica si ya hay un registro en la tabla aportes para esa transaccion
		$dt_aporte = selAporte($transaccion['idadministra']);
		if($dt_aporte['idaportes']){
		$formulario = "";
		}else{	
		$formulario = "caja_aporte.php";
		$persona_transaccion = Bper($transaccion['personas_cedula']);
		}
	}

	if($transaccion_ingreso=='GUIAS'){
		//verifica si ya hay un registro en la tabla aportes para esa transaccion
		$dt_guia = selGuia($transaccion['idadministra']);
		if($dt_guia['idguias']){
		$formulario = "";
		}else{	
		$formulario = "caja_guias.php";
		$persona_transaccion = Bper($transaccion['personas_cedula']);
		}
	}

	if($transaccion_ingreso=='SEGUROS'){
		//verifica si ya hay un registro en la tabla seguros para esa transaccion
		$dt_seguro = selSeguro($transaccion['idadministra']);
		if($dt_seguro['idseguros']){
		$formulario = "";
		}else{	
		$formulario = "caja_seguros.php";
		$persona_transaccion = Bper($transaccion['personas_cedula']);
		}
	}
	if($transaccion_ingreso=='VENTAS'){
		//verifica si ya hay un registro en la tabla movimientos para esa transaccion
		$dt_ventas = selCompra($transaccion['idadministra']);
		if($dt_ventas['idmovimientos']){
		$formulario = "";
		}else{	
		$formulario = "caja_ventas.php";
		$persona_transaccion = Bper($transaccion['personas_cedula']);
		}
	}
}elseif($transaccion_tipo =='EGRESO'){
	$transaccion_egreso = $transaccion['egresos'];

	if($transaccion_egreso=='COMPRAS'){
		//verifica si ya hay un registro en la tabla seguros para esa transaccion
		$dt_compra = selCompra($transaccion['idadministra']);
		if($dt_compra['idmovimientos']){
		$formulario = "";
		}else{	
		$formulario = "caja_compras.php";
		$persona_transaccion = Bper($transaccion['personas_cedula']);
		}
	}

	if($transaccion_egreso=='CREDITOS'){
		//verifica si ya hay un registro en la tabla seguros para esa transaccion
		$dt_credito = selCredito($transaccion['idadministra']);
		if($dt_credito['idcredito']){
		$formulario = "";
		}else{	
		$formulario = "caja_credito.php";
		$persona_transaccion = Bper($transaccion['personas_cedula']);
		}
	}

}
//buscar al cliente segun la cedula ingresada
$ced = $_POST['cedula'];
$persona = Bper($ced);


//guardar nueva transaccion
$guardar = $_POST['guardar'];
if($guardar == 'guardar'){
	$tipo = $_POST['administracion_operacion'];
	$concepto = $_POST['administracion_detalle'];
	$detalle = $_POST['administracion_detalle'];
	$mingreso = $_POST['administracion_monto'];
	$megreso = $_POST['administracion_monto'];
	$cedula = $_POST['administracion_cedula'];
	$ingreso = $_POST['administracion_concepto'];
	$egreso = $_POST['administracion_concepto'];
	$fecha = $_POST['administracion_fecha'];
	$comprobante = $_POST['administracion_comprobante'];
	$banco = $_POST['administracion_banco'];	
	if($_POST['administracion_concepto'] == 'PAGOS'){		
		$fecha = date("Y-m-d");	
		modCuota($_POST['cuota_credito'], $fecha, $_POST['administracion_ingreso_prestamo']);
	}
	if($tipo == 'INGRESO'){
		$egreso ="";
		$megreso="";
	}
	if($tipo == 'EGRESO'){
		$ingreso ="";
		$mingreso="";
	}

	insAdministracion($tipo,$concepto,$detalle,$mingreso,$megreso,$cedula,$ingreso,$egreso, $fecha, $comprobante, $banco);
}

?>

    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">

<?php if($formulario){ 
include($formulario);
}else{
?>

		<!-- Form Name -->
		

				<form class="navbar-inner navbar-form pull-left span12" method="POST">
					<center>				
					  	<div class="input-append span6">
						  <input class="span6" id="appendedInputButton" type="text" name="cedula" Placeholder="C.I. Asociado/Afiliado">
						  <button class="btn" type="submit">Buscar</button>
						</div>
					</center>
				</form>
				</br></br>



	<?php if($persona['nombre']){ ?>
	    <form class="form-horizontal" method="POST">
			<fieldset>
			<legend >Nueva transacci&oacute;n</legend>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="administracion_cedula">Cédula:</label>
			  <div class="controls">
			    <input id="administracion_cedula" name="administracion_cedula" type="text" placeholder="" class="span4" value="<?php echo $persona['cedula']; ?>" readonly="readonly">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="administracion_nombre">Nombre:</label>
			  <div class="controls">
			    <input id="administracion_cedula" name="administracion_nombre" type="text" placeholder="" class="span4" value="<?php echo $persona['nombre'];?> <?php echo $persona['apellido'];?>" readonly="readonly">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="administracion_fecha">Fecha:</label>
			  <div class="controls">
			    <input id="administracion_fecha" name="administracion_fecha" type="date" placeholder="" class="span4" required="" value="<?php //echo date('Y-m-d'); ?>" >
			    
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="control-group">
			  <label class="control-label" for="administracion_operacion">Operación:</label>
			  <div class="controls">
			    <select id="administracion_operacion" name="administracion_operacion" class="span4"  onchange="validar(this.options[this.selectedIndex].value);">
			      <option>--Seleccione--</option>		      
			      <option value="INGRESO" >Ingreso</option>
			      <option value="EGRESO">Egreso</option>
			    </select>
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="control-group">
			  <label class="control-label" for="administracion_concepto">Ingresos:</label>
			  <div class="controls">
			    <select id="administracion_concepto_ingresos" name="administracion_concepto" class="input-xlarge" disabled="true" onchange="habPrestamo(this.options[this.selectedIndex].value);">
			      <option>--Seleccione--</option>
			      <option value="VENTAS">Ventas</option>
			      <option value="SEGUROS">Fonde de contingencia</option>
			      <option value="APORTES">Aportes</option>
			      <option value="PAGOS">Pago de cr&eacute;ditos</option>
			      <option value="AJUSTES">Ajuste</option>
			      <option value="GUIAS">Gu&iacute;as</option>
				  <option value="HISTORICO">Hist&oacute;rico</option>
				  <option value="INGRESOS DE SOCIOS">Ingresos de socios</option>
				  <option value="REEMBOLSOS U OTROS">Reembolsos u otros</option>
			    </select>
			  </div>
			</div>

			<!-- Select Basic  aqui quede colocar el select de prestamos -->
			<div id="input_pago_credito">
				<div class="control-group">
				  <label class="control-label" for="administracion_ingreso_prestamo">Cr&eacute;dito:</label>
				  <div class="controls">
				    <select id="administracion_ingreso_prestamo" name="administracion_ingreso_prestamo" class="span4" onchange="cargarCuota(this.options[this.selectedIndex].value);">
				      <option value="">--Seleccione--</option>	
				      <?php 
				      	echo persona_creditos_select($persona['cedula']);
				      ?>	
				    </select>
				  </div>
				</div>
				
				<div id="cuotas_credito"> </div>
			</div>

			<!-- Select Basic -->
			<div class="control-group">
			  <label class="control-label" for="administracion_concepto">Egresos:</label>
			  <div class="controls">
			    <select id="administracion_concepto_egresos" name="administracion_concepto" class="input-xlarge" disabled="true">
			      <option>--Seleccione--</option>
			      <option value="COMPRAS">Compras</option>
			      <option value="GASTOS">Gastos varios</option>
			      <option value="CREDITOS">Asignaci&oacute;n de cr&eacute;ditos</option>
				  <option value="HISTORICO">Hist&oacute;rico</option>
				  <option value="AJUSTES">Ajustes</option>
				  <option value="DONATIVOS U OTROS">Donativos u otros</option>	
				  
			    </select>
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="administracion_detalle">Detalle:</label>
			  <div class="controls">
			    <input id="administracion_detalle" name="administracion_detalle" type="text" placeholder="" class="span4" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="administracion_monto">Monto de la transacci&oacute;n:</label>
			  <div class="controls">
			    <input id="administracion_monto" name="administracion_monto"  type="text" placeholder="" class="span4" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="administracion_comprobante">N&uacute;mero de comprobante o voucher:</label>
			  <div class="controls">
			    <input id="administracion_comprobante" name="administracion_comprobante" type="text" placeholder="" class="span4" required="">
			    
			  </div>
			</div>


			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="administracion_banco">Banco:</label>
			  <div class="controls">
			    <select id="administracion_banco" name="administracion_banco" class="span4" required="">
				<option>--Seleccione--</option>
				<option value="SOFITASA">Sofitasa</option>
				<option value="PROVINCIAL">Provincial</option>
				<option value="VENEZUELA">Venezuela</option>
				<option value="EFECTIVO">Efectivo</option>
			    </select>
			  </div>
			</div>


			<!-- Button (Double) -->
			<div class="control-group">
			  <label class="control-label" for="administracion_botonguard"></label>
			  <div class="controls">
			    <button id="administracion_botonguard" name="guardar" class="btn btn-success" type="submit" value="guardar">Procesar</button>
			    <a href="?e=8" id="administracion_botoncancel" name="administracion_botoncancel" class="btn btn-danger" >Cancelar</a>
			  </div>
			</div>

			</fieldset>
		</form>

	<?php } ?>
<?php } ?>
	</div>
  </div>
</div>
<script>
$(document).ready(function(){
  //$('#administracion_monto').mask('000.000.000.000.000,00', {reverse: true});
  $('#administracion_monto').mask('000000000000000.00', {reverse: true});
  $('#input_pago_credito').hide();
});
function validar(val){
	
	if(val =='INGRESO'){
		document.getElementById('administracion_concepto_ingresos').disabled =false;
		document.getElementById('administracion_concepto_egresos').disabled = true;		
	}
	else if(val =='EGRESO'){
		document.getElementById('administracion_concepto_egresos').disabled =false;
		document.getElementById('administracion_concepto_ingresos').disabled = true;
	}
	noPagoCredito();
}
function habPrestamo(val){
	if(val == 'PAGOS'){
		//document.getElementById('administracion_ingreso_prestamo').disabled = false;
		if(document.getElementById('administracion_ingreso_prestamo').options[1].value == '-1'){
			alert('La persona no tiene créditos pendientes.');
		}
		else{
			$('#input_pago_credito').show();
			$('#administracion_detalle').val('pago de cuota');
			$('#administracion_detalle').prop('readonly', true);
		}		
	}
	else{
		noPagoCredito();
	}
}

function cargarCuota(val){
	//alert(val);
	if(val != ''){
		$.post( "getCuotas.php", { id: val }, function( data ) {
		  $("#cuotas_credito").html( data );
		});
	}
	else{
		$("#cuotas_credito").html('');
	}
	
}

function mostrarMontoCuota(val){
	$('#administracion_monto').val(val);
	$('#administracion_monto').prop('readonly', true);
}

function noPagoCredito(){
	$('#input_pago_credito').hide();
	$('#administracion_detalle').prop('readonly', false);
	$('#administracion_monto').prop('readonly', false);
	$('#administracion_detalle').val('');
	$('#administracion_monto').val('');
}
</script>
