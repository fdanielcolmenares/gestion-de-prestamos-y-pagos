<?php
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$filtro =$_POST['filtro'];
$cedula = $_POST['cedula'];
$banco = $_POST['banco'];
$comprobante = $_POST['comprobante'];
$totales = totales_movimientos($filtro, $desde, $hasta, $cedula, $comprobante);
$personas = Bper($cedula);
?>
<?php

session_start();
$usuario=$_SESSION['usu'];
$nivel=$_SESSION['niv'];
$cedusu = $_SESSION['cedUsuario'];

?>
    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">
						
			<form class="form-inline print" method="post">
				<select class="span2" id="banco" name="banco">
					<option value="">Banco</option>
					<option value="SOFITASA">Sofitasa</option>
					<option value="PROVINCIAL">Provincial</option>
					<option value="VENEZUELA">Venezuela</option>
					<option value="EFECTIVO">Efectivo</option>
				</select>
				<select class="span2" id="filtro" name="filtro">
					<option>Seleccione</option>
					<option value="INGRESO">Todos los ingresos</option>
					<option value="EGRESO">Todos los egresos</option>
					<option value="HISTORICO">Historico</option>
					<option value="VENTAS">Ventas</option>
					<option value="SEGUROS">Seguros</option>
					<option value="APORTES">Aportes</option>
					<option value="ABONOS">Abonos</option>
					<option value="GUIAS">Guias</option>
					<option value="COMPRAS">Compras</option>
					<option value="GASTOS">Gastos</option>
					<option value="CREDITOS">Creditos</option>

				</select>
			  <input type="date" class="input-small span2" placeholder="Fecha desde" name="desde">
			  <input type="date" class="input-small span2" placeholder="Fecha hasta" name="hasta">


		<?php if($nivel == 'USUARIO'){ ?> 
			  <input type="text" class="span2" name="cedula" placeholder="cedula" value="<?php echo $cedusu; ?>" readonly='readonly'>
		<?php }else{ ?>
			<input type="text" class="span2" name="cedula" placeholder="cedula">
		<?php } ?>
			  <input type="text" class="span2" name="comprobante" placeholder="comprobante">

			  <button type="submit" class="btn btn-success" >Buscar</button>
			</form>

<?php if($personas['cedula']){ ?>
			</br>
			<fieldset>
				<legend>Datos de la persona</legend>
				<label><strong>Nombre : </strong><?php echo $personas['nombre']; ?></label>
				<label><strong>Apellido : </strong><?php echo $personas['apellido']; ?></label>
				<label><strong>C&eacute;dula : </strong><?php echo $personas['cedula']; ?></label>
				<label><strong>Rif : </strong><?php echo $personas['rif']; ?></label>
				<label><strong>Telf : </strong><?php echo $personas['telefono1']; ?></label>
				<label><strong>Telf : </strong><?php echo $personas['telefono2']; ?></label>
				<label><strong>Direcci&oacute;n de la feria : </strong><?php echo $personas['telefono3']; ?></label>
				<label><strong>Tipo : </strong><?php echo $personas['tipo']; ?></label>
				<label><strong>Estatus : </strong><?php echo $personas['estatus']; ?></label>
			<fieldset>
<?php } ?>
<?php		if($totales['ingresos']){ ?>
			</br>
			<fieldset>
				<legend>Total de movimientos</legend>
				<label><strong>Total ingresos : </strong><?php echo round($totales['ingresos'], 2); ?></label>
				<label><strong>Total Egresos : </strong><?php echo round($totales['egresos'], 2); ?></label>
			<fieldset>
<?php } ?>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Comprobante</th>
					<th>Concepto</th>
					<th>C&eacute;dula</th>
					<th>Ingreso</th>
					<th>Egreso</th>
				</tr>
			</thead>
			<tbody>
				<?php echo lista_movimientos($filtro, $desde, $hasta, $cedula, $comprobante, $banco); ?>
			</tbody>
		<table>


		</div>
	</div>
</div>
