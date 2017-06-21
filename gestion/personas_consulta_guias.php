<?php
 
$id = $_GET['ida'];
$guia = selGuias($id);
$administra = selAdministra($id);
$persona = Bper($administra['personas_cedula']);

?>
    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">



		<!-- Form Name -->
		<legend class="">Detalle de la gu&iacute;a</legend>

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
		  <label class="control-label"><strong>Kilos de carga : </strong> <?php echo $guia['kilos_carga']; ?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Monto de la carga : </strong> <?php echo $guia['monto_carga']; ?> </label> 
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label" ><strong>Salida : </strong> <?php echo $guia['salida'];?> </label>
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label"><strong>Destino : </strong> <?php echo $guia['destino'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Marca del veh&iacute;culo : </strong> <?php echo $guia['marca'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Modelo del veh&iacute;culo : </strong> <?php echo $guia['modelo'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Placa del veh&iacute;culo : </strong> <?php echo $guia['placa'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Precio de la guia : </strong> <?php echo $administra['monto_ingreso'];?></label>
		</p>




		</div>
	</div>
</div>

