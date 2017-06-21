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

function selAdministr($id){
	$sql ="SELECT * FROM administra WHERE idadministra = $id";
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

function busCredito($idadministra){
	$sql = "SELECT * FROM credito WHERE idcredito = $idadministra";
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
	$monto = $dt['monto_egreso'];
	while($dt = mysql_fetch_array($ej)){
		$var .="<tr>
				<td>".$dt['idcredito']."</td>
				<td>".$dt['fecha']."</td>
				<td><center>".round($monto ,2)."</center></td>
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
		$ingreso = $dt['monto_ingreso'];
		$egreso = $dt['monto_asegura'];
		$var .="<tr>
				<td>".$dt['numero_seguro']."</td>
				<td>".$dt['fecha']."</td>
				<td><center>".round($ingreso, 2)."<center></td>
				<td><center>".round($egreso,2)."<center></td>
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
		$ingreso = $dt['monto_ingreso'];
		$var .="<tr>
				<td>".$dt['idguias']."</td>
				<td>".$dt['fecha']."</td>
				<td><center>".round($ingreso,2)."</center></td>
				<td>".$dt['placa']."</td>
				<td>".$dt['salida']."</td>
				<td>".$dt['destino']."</td>
				<td><a href=\"?e=11&ida=".$dt['idadministra']."\" class=\"btn btn-primary\" >Consultar</a></td>
			</tr>			
			";	
	}
	return $var;
}

function persona_aportes($cedula, $lima){
	$lima = $lima*10;
	$limb = $lima + 10;
	$sql = "SELECT ap.fecha as apfecha, a.fecha as fecha, 
		a.monto_ingreso as monto, a.concepto as concepto, 
		a.detalle as detalle, a.comprobante as comprobante, 
		a.banco as banco   FROM administra a, aportes ap 
		WHERE personas_cedula = $cedula AND  ingresos = 'APORTES' AND ap.administra_idadministra = a.idadministra 
	 ORDER BY ap.fecha DESC LIMIT $lima,$limb";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		$monto = $dt['monto'];
		$var .="<tr>
				<td>".$dt['fecha']."</td>
				<td>".$dt['apfecha']."</td>
				<td>".$dt['concepto']."</td>
				<td><center>".round($monto,2)."</center></td>
				<td>".$dt['comprobante']."</td>
				<td>".$dt['banco']."</td>
				
			</tr>			
			";	
	}
	return $var;
}

function persona_ajustes($cedula, $lima){
	$lima = $lima*10;
	$limb = $lima + 10;
	$sql = "SELECT * FROM administra
		WHERE personas_cedula = $cedula AND  (ingresos = 'REVERSOS' OR egresos = 'REVERSOS')
	 ORDER BY fecha DESC LIMIT $lima,$limb";
	$ej = mysql_query($sql);
	while($dt = mysql_fetch_array($ej)){
		$ingreso = $dt['monto_ingreso'];
		$egreso = $dt['monto_egreso'];
		$var .="<tr>
				<td>".$dt['fecha']."</td>
				<td>".$dt['detalle']."</td>
				<td><center>".round($ingreso,2)."</center></td>
				<td><center>".round($egreso,2)."</center></td>
				<td>".$dt['comprobante']."</td>
				<td>".$dt['banco']."</td>
				
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
	$amort = $dt['amortizacion'];
	$inter = $dt['interes'];
	$capi = $dt['capital'];
	$var .="
		<tr>
		<td>".$cont."</td>	
		<td>".round($amort, 2)."</td>
		<td>".round($inter, 2)."</td>
		<td>".round($capi, 2)."</td>
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
}else{
	$cond1 = " (tipo_operacion = 'INGRESO' OR tipo_operacion='EGRESO')";
}
if($cedula){
	$cond3 =" AND personas_cedula ='".$cedula."'";
}
if($banco){
	$cond5 =" AND banco = '".$banco."' ";
}else{
	$cond5 = "";
}
if($hasta){
	if($desde ){
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

		$nomb = Bper($dt['personas_cedula']);
		$nombp = $nomb['nombre']." ".$nomb['apellido'];
		$var .="<tr>
			
			<td>".$dt['fecha']."</td>
			<td class=\"span2\"><a href=?e=18&idt=".$dt['idadministra'].">".$dt['comprobante']." <i class=\"icon-pencil\"></i></a></td>";
			if($concepto=='REVERSOS'){
				$var.="<td class=\"span2\">AJUSTE</td>";
			}else{
			$var.="<td class=\"span3\">".$dt['concepto']."</td>";
			}
			$ming = $dt['monto_ingreso'];
			$megr = $dt['monto_egreso'];
			$var .="<td class=\"span2\">".$dt['personas_cedula']."</td>
			<td class=\"span2\">".$nombp."</td>
			<td><center>".round($ming , 2)."</center></td>
			<td><center>".round($megr, 2)."</center></td>
			</tr>";
			

	}
	return $var;
}
function lista_movimientos_normal($filtro, $desde, $hasta, $cedula, $comprobante, $banco){

if($filtro){
$cond1 = " (ingresos = '".$filtro."' OR egresos = '".$filtro."' OR tipo_operacion = '".$filtro."')";
}else{
	$cond1 = " (tipo_operacion = 'INGRESO' OR tipo_operacion='EGRESO')";
}
if($cedula){
	$cond3 =" AND personas_cedula ='".$cedula."'";
}
if($banco){
	$cond5 =" AND banco = '".$banco."' ";
}else{
	$cond5 = "";
}
if($hasta){
	if($desde ){
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

		$nomb = Bper($dt['personas_cedula']);
		$nombp = $nomb['nombre']." ".$nomb['apellido'];
		$var .="<tr>
			
			<td>".$dt['fecha']."</td>
			<td class=\"span2\">".$dt['comprobante']."</td>";
			if($concepto=='REVERSOS'){
				$var.="<td class=\"span2\">AJUSTE</td>";
			}else{
			$var.="<td class=\"span3\">".$dt['concepto']."</td>";
			}
			$mingre = $dt['monto_ingreso'];
			$megre = $dt['monto_egreso'];
			$var .="<td class=\"span2\">".$dt['personas_cedula']."</td>
			<td class=\"span2\">".$nombp."</td>
			<td><center>".round($mingre, 2)."</center></td>
			<td><center>".round($megre, 2)."</center></td>
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

	$sql = "SELECT COUNT(idadministra) AS transacciones, SUM(monto_ingreso) AS ingresos, SUM(monto_egreso) AS egresos FROM administra WHERE $cond1 $cond2 $cond3";
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

function lista_reporte_cargas($desde, $hasta){
	$sql = "SELECT SUM(monto_ingreso) as monto, 
					COUNT(idadministra) as contador, 
					fecha as fecha FROM administra 
					WHERE ingresos = 'GUIAS' AND 
						fecha BETWEEN '$desde' AND 
						'$hasta'  GROUP BY fecha";
	 
	$ej = mysql_query($sql);
	$tot = 0;
	$cant = 0;

	while($dt = mysql_fetch_array($ej)){
		$mon = $dt['monto'];
		$var .="<tr>
				<td>".$dt['fecha']."</td>
				<td>".$dt['contador']."</td>
				<td><center>".round($mon,2)."</center></td>
			</tr>			
			";	
		$cant = $cant + $dt['monto'];
		$tot++;
	}
	$var .="<tr class=\"info\">
				<td>Total</td>
				<td>".$tot."</td>
				<td><center>".round($cant,2)."</center></td>
			</tr>			
			";	
	return $var;
}

function lista_reporte_seguros($desde, $hasta){
	$sql = "SELECT SUM(monto_ingreso) as monto, 
					COUNT(idadministra) as contador, 
					fecha as fecha FROM administra 
					WHERE ingresos = 'SEGUROS' AND 
						fecha BETWEEN '$desde' AND 
						'$hasta'  GROUP BY fecha";
	 
	$ej = mysql_query($sql);
	$tot = 0;
	$cant = 0;

	while($dt = mysql_fetch_array($ej)){
		$montox = $dt['monto'];
		$var .="<tr>
				<td>".$dt['fecha']."</td>
				<td>".$dt['contador']."</td>
				<td>".round($montox,2)."</td>
			</tr>			
			";	
		$cant = $cant + $dt['monto'];
		$tot++;
	}
	$var .="<tr class=\"info\">
				<td>Total</td>
				<td>".$tot."</td>
				<td><center>".round($cant,2)."</center></td>
			</tr>			
			";	
	return $var;
}


function lista_cuotas_pagadas($desde, $hasta){

	$sql = "SELECT * FROM cuotas WHERE fecha_pago BETWEEN '$desde' AND '$hasta'";
	
	$ej = mysql_query($sql);
	$cont = 0;
	while($dt = mysql_fetch_array($ej)){
	$cont++;
	$credito = busCredito($dt['credito_idcredito']);
	$movimiento = selAdministr($credito['administra_idadministra']);
	$nomb = Bper($movimiento['personas_cedula']);
	$nombp = $nomb['nombre']." ".$nomb['apellido'];
	$amort = $dt['amortizacion'];
	$capi = $dt['capital'];
	$inter = $dt['interes'];
	$var .="
		<tr>
		<td>".$nombp."</td>
		<td>".round($amort, 2)."</td>
		<td>".round($inter, 2)."</td>
		<td>".round($capi, 2)."</td>
		<td>".$dt['fecha_vence']."</td>
		<td>".$dt['fecha_pago']."</td>
		</tr>
		";
	}
	return $var;

}

function lista_reporte_cuotas($desde, $hasta){
	$sql = "SELECT * FROM administra 
					WHERE fecha BETWEEN '$desde' AND 
						'$hasta' 
					AND ingresos = 'APORTES' 
					ORDER BY fecha DESC";
	 
	$ej = mysql_query($sql);
$cant = 0;
$tot = 0;
	while($dt = mysql_fetch_array($ej)){
			$nomb = Bper($dt['personas_cedula']);
			$nombp = $nomb['nombre']." ".$nomb['apellido'];
			$ing = $dt['monto_ingreso'];

		$var .="<tr>
				<td>".$dt['fecha']."</td>
				<td>".$dt['comprobante']."</td>
				<td>".$nombp."</td>
				<td>".round($ing,2)."</td>
			</tr>			
			";	
		$cant = $cant + $dt['monto_ingreso'];
		$tot++;
	}
	$var .="<tr class=\"info\">
				<td colspan=\"2\">Total</td>
				<td>".$tot."</td>
				<td><center>".round($cant,2)."</center></td>
			</tr>			
			";	
	return $var;
}
?>
