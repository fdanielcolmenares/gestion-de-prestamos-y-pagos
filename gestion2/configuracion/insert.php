<?php

//Agregar personas
function insPersonas($cedula, $nombre, $apellido, $rif, $direccion, $fecha_ingreso, $telf1, $telf2, $telf3, $fecha_nacimiento, $tipo, $estatus){
	$nombre = ValTexto($nombre);
	$apellido = ValTexto($apellido);
	$direccion = ValTexto($direccion);
	$sql = "INSERT INTO personas (cedula, nombre, apellido, rif, direccion, fecha_ingreso, telefono1, telefono2, telefono3, fecha_nacimiento, tipo, estatus)
			  VALUES ($cedula, '$nombre', '$apellido', '$rif', '$direccion', '$fecha_ingreso', '$telf1', '$telf2', '$telf3', '$fecha_nacimiento', '$tipo', '$estatus')";
	if(@mysql_query($sql)){
	mensajes('Registro exitoso...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}

//Agregar nuevo usuario
function insUsuarios($log, $pass, $tipo, $estatus, $ced){
	$log = strtolower($log);
	$pass = md5($pass);
 	$sqlInsUsu="INSERT INTO usuarios (log, pass, tipo_usuario, estatus, personas_cedula)
 					VALUES ('$log', '$pass', '$tipo', '$estatus', '$ced')";
	if(@mysql_query($sqlInsUsu)){
	mensajes('Usuario se registro exitosamente...');
	}else{
	mensajes('Atención! el registro fallo, es posible que el usuario ya exista...');
	}
}

//Agregar productos
function insProductos($nomb, $desc, $pcomp, $pvent){
	$nomb = ValTexto($nomb);
	$desc = ValTexto($desc);
	$estatus= "ACTIVO";
	$sqlinsert="INSERT INTO productos (nombre, descripcion, precio_compra, precio_venta,  estatus)
					VALUES ('$nomb', '$desc', '$pcomp', '$pvent',  '$estatus')";
	if(@mysql_query($sqlinsert)){
	mensajes('El producto se registro exitosamente...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}

//Agregar un movimiento de caja

function insAdministracion($tipo,$concepto,$detalle,$mingreso,$megreso,$cedula,$ingreso,$egreso, $fecha, $comprobante, $banco){
	$sql = "INSERT INTO administra (tipo_operacion, concepto, detalle, monto_ingreso, monto_egreso, personas_cedula, ingresos, egresos, fecha, comprobante, banco)
		VALUES ('$tipo','$concepto','$detalle','$mingreso','$megreso','$cedula','$ingreso','$egreso', '$fecha', '$comprobante','$banco')";
	if(@mysql_query($sql)){
	mensajes('El registro ha sido exitoso...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}
function insAdministracion2($tipo,$concepto,$detalle,$mingreso,$megreso,$cedula,$ingreso,$egreso, $fecha){
	$sql = "INSERT INTO administra (tipo_operacion, concepto, detalle, monto_ingreso, monto_egreso, personas_cedula, ingresos, egresos, fecha)
		VALUES ('$tipo','$concepto','$detalle','$mingreso','$megreso','$cedula','$ingreso','$egreso', '$fecha')";
	if(@mysql_query($sql)){
	echo "<script>";
		echo "alert('Registro Exitoso');";
		
	echo "</script>";
	}else{
	echo "<script>";
		echo "alert('Falla al registrar');";
		
	echo "</script>";
	}
}
//Agrega aportes
function insAporte ($fecha,$admid) {
	$sqlinsert="INSERT INTO aportes(fecha, administra_idadministra)
					VALUES ('$fecha','$admid')";
	if(@mysql_query($sqlinsert)){
	mensajes('Registro exitoso...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}

//Agregar guía
function insGuia($kilos, $monto, $salida, $destino, $placa, $modelo, $marca, $admid) {
	$salida = ValTexto($salida);
	$destino = ValTexto($destino);
	$modelo = ValTexto($modelo);
	$marca = ValTexto($marca);
	$sqlinsert="INSERT INTO guias(kilos_carga, monto_carga, salida, destino, placa, modelo, marca, administra_idadministra)
					VALUES ($kilos, $monto, '$salida', '$destino', '$placa', '$modelo', '$marca', $admid)";
	if(@mysql_query($sqlinsert)){
	mensajes('Se registro exitosamente...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}

//Agregar Seguro (Reporte de carga)
function insSeguro($numero, $salida, $destino, $chofer, $ced_chofer, $placa, $marca, $modelo, $tipo, $kilos_carga, $monto, $asegurador, $ced_asegurador, $admid) {
$salida = ValTexto($salida);
$destino = ValTexto($destino);
$chofer = ValTexto($chofer);
$marca = ValTexto($marca);
$modelo = ValTexto($modelo);
$asegurador = ValTexto($asegurador);
 $sqlinsert="INSERT INTO seguros (numero_seguro, salida, destino, chofer, cedula_chofer, placa, marca, modelo, tipo, kilos_carga, monto_asegura, asegurador, cedula_asegurador, administra_idadministra)
				VALUES ('$numero', '$salida', '$destino', '$chofer', '$ced_chofer', '$placa', '$marca', '$modelo', '$tipo', '$kilos_carga', '$monto', '$asegurador', '$ced_asegurador', '$admid')";
	if(@mysql_query($sqlinsert)){
	//mensajes('Se registro exitosamente...');
	}else{
	//mensajes('Atención! el registro fallo...');
	}
}

//Agrega o quita productos cantidad de un producto
function insMovimiento ($cantidad, $admid, $idprod){
	$sqlinsert="INSERT INTO movimientos(cantidad, administra_idadministra, productos_idproductos)
					VALUES ($cantidad, $admid, $idprod)";
	if(@mysql_query($sqlinsert)){
		$sel = "SELECT * FROM inventario WHERE productos_idproductos = $idprod ORDER BY idinventario DESC LIMIT 1";
		$ejsel = mysql_query($sel);
		if($dtsel = mysql_fetch_array($ejsel)){
			$ult_cant = $dtsel['existencia'];
		}else{
			$ult_cant = 0;
		}
		$total = $ult_cant + $cantidad;
		$sql = "INSERT INTO inventario (existencia, productos_idproductos) VALUES ($total, $idprod)";
		if(mysql_query($sql)){
			mensajes('Compra registrada exitosamente...');
		}else{
		mensajes('Atención! el registro fallo, es posible que el usuario ya exista...');
		}
	}
}

//Agrega o quita productos cantidad de un producto
function insMovimientoVenta($cantidad, $admid, $idprod){
	$sqlinsert="INSERT INTO movimientos(cantidad, administra_idadministra, productos_idproductos)
					VALUES ($cantidad, $admid, $idprod)";

		$sel = "SELECT * FROM inventario WHERE productos_idproductos = $idprod ORDER BY idinventario DESC LIMIT 1";
		$ejsel = mysql_query($sel);
		if($dtsel = mysql_fetch_array($ejsel)){
			$ult_cant = $dtsel['existencia'];
		}else{
			$ult_cant = 0;
		}

		
		if($cantidad > $ult_cant){
			mensajes('No hay suficientes productos en existencia...');
		}else{

			if(@mysql_query($sqlinsert)){

				$total = $ult_cant - $cantidad;
				$sql = "INSERT INTO inventario (existencia, productos_idproductos) VALUES ($total, $idprod)";
				if(mysql_query($sql)){
					mensajes('Venta registrada exitosamente...');
				}else{
				mensajes('Atención! el registro fallo...');
				}
			}
		}
	
}
//Agrega credito
function insCredito($monto, $fecha, $concepto, $cuotas, $plazo, $garantias, $fiador, $ced_fiador, $estatus, $admid, $interes){
$concepto = ValTexto($concepto);
$garantias = ValTexto($garantias);
$fiador = ValTexto($fiador);
$sqlinsert="INSERT INTO credito (monto, fecha, concepto, cuotas, plazo, garantias, fiador, cedula_fiador, estatus, administra_idadministra, interes)
				VALUES ($monto, '$fecha', '$concepto', $cuotas, $plazo, '$garantias', '$fiador', $ced_fiador, '$estatus', $admid, $interes)";
	if(@mysql_query($sqlinsert)){
			
			$sel = "SELECT * FROM credito ORDER BY idcredito DESC";
			$ejsel = mysql_query($sel);
			if($dtsel = mysql_fetch_array($ejsel)){
				$idcredito = $dtsel['idcredito'];
			}
			

			$interes = ($monto * $interes )/100;
			$amortiza = ($monto / $cuotas) ;
			$capital = ($amortiza + $interes);
			$estatus = 'PENDIENTE';
			$cont = 1;			
			$cont_year = 0;



			for($i = 1; $i<=$cuotas; $i++){
				if($month == 12){
				$cont_year++;
				}
			$date = $fecha;
			list($year, $month, $day) = explode('-', $date);			
			
			if($cont == 13){
			$cont = 1;
						
			}		
			if($month + $i > '12'){
			
			$month = $cont;		
			$cont++;
			}else{
			$month = $month + $i;

			}

			if($month == 02 || $month == 04 || $month == 06 || $month == '09' || $month == 11){
				if($day > 30){
				$day = 30;	
				} 
				if($month == 02 AND $day > 28){
				$day = 28;
				}
			}
			$year = $year + $cont_year;
			$fecha_vence = $year."-".$month."-".$day;
			$fecha_pago = "";

			  $sqlinsert="INSERT INTO cuotas(credito_idcredito, capital, amortizacion, interes, fecha_vence, fecha_pago, estatus)
					VALUES ($idcredito, '$capital', '$amortiza', '$interes', '$fecha_vence', '$fecha_pago', '$estatus')";
			$ejsql = mysql_query($sqlinsert);
			

			}
			

	
	//mensajes('Se registro exitosamente...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}











//Agrega productos a inventario
function insInventario($existencia, $idprod){
	$sqlinsert="INSERT INTO inventario (existencia, productos_idproductos)
					VALUES ($existencia, $idprod)";
	if(@mysql_query($sqlinsert)){
	mensajes('Registro exitoso...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}






//Agrega cuotas a credito
function insCuotas($idcredito, $capital, $amortiza, $interes, $fecha_vence, $fecha_pago, $estatus) {
	$sqlinsert="INSERT INTO cuotas(credito_idcredito, capital, amortizacion, interes, fecha_vence, fecha_pago, estatus)
					VALUES ($idcredito, $capital, $amortiza, $interes, $fecha_vence, $fecha_pago, $estatus)";
	if(@mysql_query($sqlinsert)){
	mensajes('Registro exitoso...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}





//Registra un Ingreso
function insIng ($tipo, $desc) {
	$tipo = ValText($tipo);
	$desc = ValText($desc);
	$sqlinsert="INSERT INTO ingresos (tipo, descripcion)
					VALUES ('$tipo', '$desc')";
	if(@mysql_query($sqlinsert)){
	mensajes('Registro exitoso...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}

//Registra un Egreso
function insEgre ($tipo, $desc) {
	$tipo = ValText($tipo);
	$desc = ValText($desc);
	$sqlinsert="INSERT INTO egresos (tipo, descripcion)
					VALUES ('$tipo', '$desc')";
	if(@mysql_query($sqlinsert)){
	mensajes('Registro exitoso...');
	}else{
	mensajes('Atención! el registro fallo...');
	}
}
?>
