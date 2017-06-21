<?php

$id = $_GET['ida'];
$credito = selCredito($id);
$idcredito = $credito['idcredito'];
$admin_credito = Bcred($idcredito);
$monto = $admin_credito['monto'];
$admin_credito['personas_cedula'];
$persona = Bper($admin_credito['personas_cedula']);
$idc= $_GET['idc'];
$idcr= $_GET['idcr'];
$dtcuota = selCuota($idc);

if($idc){
$tipo = "INGRESO";
$concepto = "pago de cuota";
$detalle = "pago de cuota";
$mingreso = $dtcuota['capital'];
$megreso = 0;
$cedula = $admin_credito['personas_cedula'];
$ingreso = "ABONOS";
$egreso = "";
$fecha = date("Y-m-d");
insAdministracion2($tipo,$concepto,$detalle,$mingreso,$megreso,$cedula,$ingreso,$egreso, $fecha);
modCuota($idc, $fecha, $idcredito);
}

if($idcr){
$tipo = "EGRESO";
$concepto = "pago de cuota";
$detalle = "pago de cuota";
$mingreso = $dtcuota['capital'];
$megreso = 0;
$cedula = $admin_credito['personas_cedula'];
$ingreso = "ABONOS";
$egreso = "";
$fecha = date("Y-m-d");
insAdministracion2($tipo,$concepto,$detalle,$mingreso,$megreso,$cedula,$ingreso,$egreso, $fecha);
modCuota2($idcr, $id, $idcredito);
}
?>
    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">



		<!-- Form Name -->
		<legend class="text-center">Cuotas de Créditos</legend>

		<!-- Text input-->
		<p>
		  <label class="control-label" for="cuotas_codigo del credito"><strong>Código del crédito : </strong> <?php echo $credito['idcredito']; ?></label>
		</p>

		<p>
		  <label class="control-label" for="cuotas_codigo del credito"><strong>Monto del crédito(Bs.) : </strong> <?php echo $credito['monto']; ?></label>
		</p>

		<p>
		  <label class="control-label" for="cuotas_codigo del credito"><strong>Interes : </strong> <?php echo $credito['interes']; ?></label>
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label"><strong>Nombre : </strong> <?php echo $persona['nombre'];?> <?php echo $persona['apellido'];?></label>
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label" ><strong>Cédula : </strong> <?php echo $persona['cedula'];?> </label>
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label"><strong>Crédito desde : </strong> <?php echo $credito['fecha']; ?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Garantía : </strong> <?php echo $credito['garantias']; ?> </label> 
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label" ><strong>Fiador : </strong> <?php echo $credito['fiador'];?> </label>
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label"><strong>Cédula de fiador : </strong> <?php echo $credito['cedula_fiador'];?></label>
		</p>





		<table class="table table-striped table-bordered">
		  <thead>
		    <tr>
		      <th>Nro.</th>
		      <th>Capital</th>
		      <th>Intereses</th>
		      <th>Total</th>
		      <th>vencimiento</th>
		      <th>fecha de pago</th>
		      <th>Estatus</th>
		      <!--
		<?php //if($nivel =='ADMINISTRADOR' || $nivel=='ASISTENTE'){ ?>
		      <th>Acci&oacute;n</th>
		<?php //} ?>-->
		    </tr>
		  </thead>
		  <tbody>
			<?php echo lista_cuotas($idcredito, $credito['administra_idadministra'], $nivel); ?>
		  </tbody>

		</table>



		</div>
	</div>
</div>

