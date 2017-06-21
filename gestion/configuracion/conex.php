<?php

$server="127.0.0.1"; //"localhost";
$user="root"; //"UsuarioBD";asohor_admsite
$pwd=""; //"ClaveUsuarioBD";+oN0V6Um!RKH
$DataBase="asohor_site2"; //"NombreDeLaBD";
$link=mysql_connect($server, $user, $pwd);
mysql_select_db($DataBase)or die("Fallo de Conexion");


function ValTexto($texto){
	// Elimina Acentos de todo Tipo
	$acento = "No";
	if($acento=="No"){
		$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿ";
		$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuy";
		$texto = strtr($texto,$tofind,$replac);
	}
	// Elimina Acentos de todo Tipo
	$texto = strtolower(trim($texto));
	$texto = ucwords($texto);
	return $texto;	
}

function mensajes($texto){
	$texto = valtexto($texto);
	echo "<script>";
		echo "alert('$texto');";
	echo "</script>";
}

function mensajes_nr($texto){
	$texto = valtexto($texto);
	echo "<script>";
		echo "alert('$texto');";
		
	echo "</script>";
}
function menu($enlace){
	if($enlace == '1'){
		$contenido ="personas.php";
	}elseif($enlace == '2'){
		$contenido ="personas_consulta.php";
	}elseif($enlace == '3'){
		$contenido ="personas_modificar.php";
	}elseif($enlace == '4'){
		$contenido ="usuario_crear.php";
	}elseif($enlace == '5'){
		$contenido ="usuario_buscar.php";
	}elseif($enlace == '6'){
		$contenido ="usuario_modificar.php";
	}elseif($enlace == '7'){
		$contenido ="productos_crear.php";
	}elseif($enlace == '8'){
		$contenido ="caja.php";
	}elseif($enlace == '9'){
		$contenido ="personas_consulta_credito.php";
	}elseif($enlace == '10'){
		$contenido ="reportes_movimientos.php";
	}elseif($enlace == '11'){
		$contenido ="personas_consulta_guias.php";
	}elseif($enlace == '12'){
		$contenido ="personas_consulta_seguros.php";
	}elseif($enlace == '13'){
		$contenido ="asociados_consulta.php";
	}elseif($enlace == '14'){
		$contenido ="reportes_cargas.php";
	}elseif($enlace == '15'){
		$contenido ="reportes_seguros.php";
	}elseif($enlace == '16'){
		$contenido ="reportes_creditos.php";
	}elseif($enlace == '17'){
		$contenido ="reportes_cuotas.php";
	}elseif($enlace == '18'){
		$contenido ="editar_comprobante.php";
	}
	return $contenido;

}


?>
