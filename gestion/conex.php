<?php

$server="localhost"; //"localhost";
$user="asohor_admsite"; //"UsuarioBD";
$pwd="+oN0V6Um!RKH"; //"ClaveUsuarioBD";
$DataBase="asohor_site"; //"NombreDeLaBD";
$link=mysql_connect($server, $user, $pwd);
mysql_select_db($DataBase)or die("Fallo de Conexion");


function ValTexto($texto){
	// Elimina Acentos de todo Tipo
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
		echo "window.location.reload()";
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
	}
	return $contenido;

}


?>
