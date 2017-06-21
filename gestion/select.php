<?php

//buscar personas por cedula
function Bper($cedula){
		$sql = "SELECT * FROM personas WHERE cedula = '$cedula'";
			if($ej=mysql_query($sql)) {
				$datos = mysql_fetch_array($ej);
			}
		return  $datos;
}

//Buscar Usuario por cedula
function BUsu($cedula){
		$nombre = ValTexto($nombre);
		$sql = "SELECT * FROM usuarios WHERE personas_cedula = '$cedula'";
			if($ej=mysql_query($sql)) {
				$datos = mysql_fetch_array($ej);
			}
		return  $datos;
}

//Ultima transaccion abierta
function ultAdministr(){
	$sql ="SELECT * FROM administra ORDER BY idadministra DESC LIMIT 1";
	$ej = mysql_query($sql);
	if($dt = mysql_fetch_array($ej)){
	return $dt;
	}
}

//buscar aportes por codigo de transaccion 'administra'
function selAporte($idadministra){
	$sql = "SELECT * FROM aportes WHERE administra_idadministra = $idadministra";
	$ej = mysql_query($sql);
	if($dt = mysql_fetch_array($ej)){
	return $dt;
	}
}

//buscar guias por codigo de transaccion 'administra'
function selGuia($idadministra){
	$sql = "SELECT * FROM guias WHERE administra_idadministra = $idadministra";
	$ej = mysql_query($sql);
	if($dt = mysql_fetch_array($ej)){
	return $dt;
	}
}

//buscar seguros por codigo de transaccion 'administra'
function selSeguro($idadministra){
	$sql = "SELECT * FROM seguros WHERE administra_idadministra = $idadministra";
	$ej = mysql_query($sql);
	if($dt = mysql_fetch_array($ej)){
	return $dt;
	}
}

//buscar creditos por codigo de transaccion 'administra'
function selCredito($idadministra){
	$sql = "SELECT * FROM credito WHERE administra_idadministra = $idadministra";
	$ej = mysql_query($sql);
	if($dt = mysql_fetch_array($ej)){
	return $dt;
	}
}

//buscar compras (movimientos) por codigo de transaccion 'administra'
function selCompra($idadministra){
	$sql = "SELECT * FROM movimientos WHERE administra_idadministra = $idadministra";
	$ej = mysql_query($sql);
	if($dt = mysql_fetch_array($ej)){
	return $dt;
	}
}

//llenado de select de productos

function comboProductos(){
	$sql = "SELECT * FROM productos ORDER BY nombre DESC";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		$var .="<option value=\"".$dt['idproductos']."\">".$dt['nombre']."</option>";
	}
	return $var;
}
//Lista de productos
function lista_productos(){
	$sql= "SELECT * FROM productos ORDER BY nombre ASC";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		$existencia = 0;
		$sql2 = "SELECT * FROM inventario WHERE productos_idproductos = ".$dt['idproductos']." ORDER BY idinventario DESC LIMIT 1";
		$ej2 = mysql_query($sql2);
		if($dt2 = mysql_fetch_array($ej2)){
			$existencia = $dt2['existencia'];
			if($existencia > 0){
			}else {$existencia = 0; }
		}

		$var .="<tr>
			<td>".$dt['nombre']."</td>
			<td>".$dt['descripcion']."</td>
			<td>".$dt['precio_compra']."</td>
			<td>".$dt['precio_venta']."</td>
			<td>".$existencia."</td>
			<td>".$dt['estatus']."</td>
			<td><a href=\"?e=7&cod=".$dt['idproductos']."\" class=\"btn btn-primary\" >Modificar</a> </td>
			</tr>";
	}
	return $var;
	
}


//Buscar producto por codigo
function producto($cod){
	$sql= "SELECT * FROM productos where idproductos = '$cod'";
	$ej = mysql_query($sql);
	if($dt = mysql_fetch_array($ej)){
	return $dt;

	}
}

function persona_creditos($cedula, $lima){
	$lima = $lima*10;
	$limb = $lima + 10;
	//AND(SELECT estatus FROM credito WHERE administra_idadministra = a.idadministra ) = 'ABIERTO'
	$sql = "SELECT *   FROM administra a, credito c WHERE personas_cedula = $cedula AND  egresos = 'CREDITOS' AND c.administra_idadministra = a.idadministra 
	 ORDER BY c.idcredito DESC LIMIT $lima,$limb";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		$var .="<tr>
				<td>".$dt['idcredito']."</td>
				<td>".$dt['fecha']."</td>
				<td>".$dt['monto_egreso']."</td>
				<td>".$dt['estatus']."</td>
				<td><a href=\"?e=9&ida=".$dt['idadministra']."\" class=\"btn btn-primary\" >Consultar</a></td>
			</tr>			
			";	
	}
	return $var;
}

function persona_cargas($cedula, $lima){
	$lima = $lima*10;
	$limb = $lima + 10;
	$sql = "SELECT *   FROM administra a, seguros s WHERE personas_cedula = $cedula AND  ingresos = 'SEGUROS' AND s.administra_idadministra = a.idadministra 
	 ORDER BY s.idseguros DESC LIMIT $lima,$limb";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		$var .="<tr>
				<td>".$dt['numero_seguro']."</td>
				<td>".$dt['fecha']."</td>
				<td>".$dt['monto_ingreso']."</td>
				<td>".$dt['monto_asegura']."</td>
				<td>".$dt['salida']."</td>
				<td>".$dt['destino']."</td>
				<td><a href=\"?e=12&ida=".$dt['idadministra']."\" class=\"btn btn-primary\" >Consultar</a></td>
			</tr>			
			";	
	}
	return $var;
}

function persona_guias($cedula, $lima){
	$lima = $lima*10;
	$limb = $lima + 10;
	$sql = "SELECT *   FROM administra a, guias g WHERE personas_cedula = $cedula AND  ingresos = 'GUIAS' AND g.administra_idadministra = a.idadministra 
	 ORDER BY g.idguias DESC LIMIT $lima,$limb";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		$var .="<tr>
				<td>".$dt['idguias']."</td>
				<td>".$dt['fecha']."</td>
				<td>".$dt['monto_ingreso']."</td>
				<td>".$dt['placa']."</td>
				<td>".$dt['salida']."</td>
				<td>".$dt['destino']."</td>
				<td><a href=\"?e=11&ida=".$dt['idadministra']."\" class=\"btn btn-primary\" >Consultar</a></td>
			</tr>			
			";	
	}
	return $var;
}

function Bcred($numero) {
	//AND(SELECT estatus FROM credito WHERE administra_idadministra = a.idadministra ) = 'ABIERTO'
	$sql = "SELECT *   FROM administra a, credito c WHERE idcredito = $numero AND  egresos = 'CREDITOS' AND c.administra_idadministra = a.idadministra 
	";
			if($ej=mysql_query($sql)) {
				$datos = mysql_fetch_array($ej);
			}
		return $datos;
}

//lista de cuotas por nro de credito
function lista_cuotas($id, $ida, $nivel){

	$sql = "SELECT * FROM cuotas WHERE credito_idcredito = $id ORDER BY idcuotas ASC";
	$ej = mysql_query($sql);
	$cont = 0;
	while($dt = mysql_fetch_array($ej)){
	$cont++;

	if($dt['estatus'] == 'PENDIENTE'){
	$boton="<a href=\"?e=9&ida=".$ida."&idc=".$dt['idcuotas']."\" class=\"btn btn-primary btn-small\"  >Procesar pago</a>";
	}else{
	$boton="<a href=\"?e=9&ida=".$ida."&idcr=".$dt['idcuotas']."\" class=\"btn btn-danger btn-small\"  >Reversar pago</a>";
	}
	if($nivel == 'USUARIO'){
	$celda = "";
	}else{
	$celda = "<td>".$boton."</td>";
	}
	$var .="
		<tr>
		<td>".$cont."</td>	
		<td>".round($dt['amortizacion'], 2)."</td>
		<td>".round($dt['interes'], 2)."</td>
		<td>".round($dt['capital'], 2)."</td>
		<td>".$dt['fecha_vence']."</td>
		<td>".$dt['fecha_pago']."</td>
		<td>".$dt['estatus']."</td>
		".$celda."
		</tr>
		";
	}
	return $var;

}

function selCuota($idc){
	$sql = "SELECT * FROM cuotas WHERE idcuotas = $idc";
	$ej = mysql_query($sql);
	if($dt = mysql_fetch_array($ej)){
	return $dt;
	}
}

function lista_movimientos($filtro, $desde, $hasta, $cedula, $comprobante, $banco){

if($filtro){
$cond1 = " (ingresos = '".$filtro."' OR egresos = '".$filtro."' OR tipo_operacion = '".$filtro."')";
}
if($cedula){
	$cond3 =" AND personas_cedula ='".$cedula."'";
}
if($banco){
	$cond5 =" AND banco = '".$banco."' ";
}
if($hasta){
	if($desde){
		$cond2 = "AND fecha BETWEEN '".$desde."'  AND '".$hasta."'";
	}else{
	$desde = date("Y-m-d");
	$cond2 = "AND fecha BETWEEN '".$desde."'  AND '".$hasta."'";
	}
}else{
$hasta = date("Y-m-d");
$cond2 = "AND fecha BETWEEN '".$desde."' AND '".$hasta."'";
}
if($comprobante){
	$cond4 = "AND comprobante = '".$comprobante."'";
} 

	$sql = "SELECT * FROM administra WHERE $cond1 $cond2 $cond3 $cond4 $cond5";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){

		$var .="<tr>
			
			<td>".$dt['fecha']."</td>
			<td>".$dt['comprobante']."</td>";
			if($concepto=='REVERSOS'){
				$var.="<td>AJUSTE</td>";
			}else{
			$var.="<td>".$dt['concepto']."</td>";
			}
			$var .="<td>".$dt['personas_cedula']."</td>
			<td>".round($dt['monto_ingreso'], 2)."</td>
			<td>".round($dt['monto_egreso'], 2)."</td>
			</tr>";
			

	}
	return $var;
}

function totales_movimientos($filtro, $desde, $hasta, $cedula){

if($filtro){
$cond1 = " (ingresos = '".$filtro."' OR egresos = '".$filtro."' OR tipo_operacion = '".$filtro."')";
}
if($cedula){
	$cond3 =" AND personas_cedula ='".$cedula."'";
}
if($hasta){
	if($desde){
		$cond2 = "AND fecha BETWEEN '".$desde."'  AND '".$hasta."'";
	}else{
	$desde = date("Y-m-d");
	$cond2 = "AND fecha BETWEEN '".$desde."'  AND '".$hasta."'";
	}
}else{
$hasta = date("Y-m-d");
$cond2 = "AND fecha BETWEEN '".$desde."' AND '".$hasta."'";
}

	$sql = "SELECT SUM(monto_ingreso) AS ingresos, SUM(monto_egreso) AS egresos FROM administra WHERE $cond1 $cond2 $cond3";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		return $dt;
	}
	
}

function selGuias($id){
	$sql = "SELECT * FROM guias WHERE administra_idadministra  = $id";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		return $dt;
	}
}

function selSeguros($id){
	$sql = "SELECT * FROM seguros WHERE administra_idadministra  = $id";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		return $dt;
	}
}

function selAdministra($id){
	$sql = "SELECT * FROM administra WHERE idadministra  = $id";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		return $dt;
	}
}
?>
