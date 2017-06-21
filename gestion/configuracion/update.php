<?php 


//Actualizar personas
function ModPer($cedula, $nombre, $apellido, $rif, $direccion, $fecha_ingreso, $telf1, $telf2, $telf3, $fecha_nacimiento, $tipo, $estatus){
	$nombre = ValTexto($nombre);
	$apellido = ValTexto($apellido);
	$direccion = ValTexto($direccion);	
	$sql ="UPDATE personas SET	nombre = '$nombre', apellido = '$apellido', rif = '$rif',	direccion = '$direccion', fecha_ingreso = '$fecha_ingreso', telefono1 = '$telf1', 
										telefono2 = '$telf2', telefono3 = '$telf3', fecha_nacimiento = '$fecha_nacimiento', tipo = '$tipo', estatus = '$estatus'
								WHERE cedula = $cedula";
	if($ej = mysql_query($sql)){

		mensajes('Registro modificado exitosamente');
	}else{
		mensajes('Error al modificar');	
	}
}

//modificar usuario
function ModUsu($log, $pass, $tipo, $estatus, $ced){
	$log = strtolower($log);
	
	if($pass){
	$pass = md5($pass);
 	 $sql="UPDATE usuarios SET log = '$log', pass = '$pass', tipo_usuario = '$tipo', estatus = '$estatus'
 					WHERE personas_cedula = $ced";
	}else{
 	 $sql="UPDATE usuarios SET log = '$log', tipo_usuario = '$tipo', estatus = '$estatus'
 					WHERE personas_cedula = $ced";
	}
	if($ej = mysql_query($sql)){
	mensajes('Modificado exitosamente...');
	}else{
	mensajes('Error al modificar...');
	}
}
//modificar producto

function ModProd($nomb, $desc, $pcomp, $pvent, $estatus, $id){
	$nomb = ValTexto($nomb);
	$desc = ValTexto($desc);
	$sql = "UPDATE productos SET nombre='$nomb', descripcion ='$desc', precio_compra = '$pcomp', precio_venta ='$pvent', estatus= '$estatus' WHERE idproductos = $id ";
		if($ej = mysql_query($sql)){
	mensajes('Modificado exitosamente...');
	}else{
	mensajes('Error al modificar...');
	}
}

function modCuota($id, $fecha, $idc){
	$sql="UPDATE cuotas SET estatus = 'PAGADA', fecha_pago = '$fecha' WHERE idcuotas = $id ";
	if($ej = mysql_query($sql)){

		$sql2 = "SELECT * FROM cuotas WHERE credito_idcredito = $idc AND estatus = 'PENDIENTE'";
		$ej2 = mysql_query($sql2);
		if($dt2 = mysql_fetch_array($ej2)){
			$sql3 = "UPDATE credito SET estatus = 'ABIERTO' WHERE idcredito = $idc";
			mysql_query($sql3);
		}else{
			$sql3 = "UPDATE credito SET estatus = 'CERRADO' WHERE idcredito = $idc";
			mysql_query($sql3);
		}

	//header("'Location: /?e=9&ida=".$id."'");
	}else{
	mensajes('Error al actualizar...');
	}
}

function modCuota2($id, $idc){
	$sql="UPDATE cuotas SET estatus = 'PENDIENTE', fecha_pago = '' WHERE idcuotas = $id ";
	if($ej = mysql_query($sql)){

		$sql2 = "SELECT * FROM cuotas WHERE credito_idcredito = $id AND estatus = 'PENDIENTE'";
		$ej2 = mysql_query($sql2);
		if($dt2 = mysql_fetch_array($ej2)){
			$sql3 = "UPDATE credito SET estatus = 'ABIERTO' WHERE idcredito = $idc";
			mysql_query($sql3);
		}else{
			$sql3 = "UPDATE credito SET estatus = 'CERRADO' WHERE idcredito = $idc";
			mysql_query($sql3);
		}
	header("'Location: /?e=9&ida=".$id."'");
	}else{
	mensajes('Error al actualizar...');
	}
}
?>
