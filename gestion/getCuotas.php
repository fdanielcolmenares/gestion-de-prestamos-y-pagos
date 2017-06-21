<?php
	include('configuracion/conex.php');
	//include('configuracion/insert.php'); 	
	include('configuracion/select.php'); 
	//include('configuracion/update.php'); 
	//include('site/header.php'); 

	$str = '';

	$str .= '<div class="control-group">'.
			'<label class="control-label" for="cuota_credito">Cuota:</label>'.
			'<div class="controls">'.
			'<select id="cuota_credito" name="cuota_credito" class="span4" onchange="mostrarMontoCuota(this.options[this.selectedIndex].text);">'.
			'<option>--Seleccione--</option>';

	$str .= select_cuotas($_POST['id']);
			
	$str .=	'</select>'.
			'</div>'.
			'</div>';
	echo $str;
?>