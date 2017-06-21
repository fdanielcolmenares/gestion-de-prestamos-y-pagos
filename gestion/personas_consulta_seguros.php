<?php
 
$id = $_GET['ida'];
$seguro = selSeguros($id);
$administra = selAdministra($id);
$persona = Bper($administra['personas_cedula']);

?>
    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">



		<!-- Form Name -->
		<legend class="">Detalle del Seguro</legend>

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
		  <label class="control-label"><strong>Codigo de seguro : </strong> <?php echo $seguro['kilos_carga']; ?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Monto que asegura : </strong> <?php echo $seguro['monto_asegura']; ?> </label> 
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label" ><strong>Salida : </strong> <?php echo $seguro['salida'];?> </label>
		</p>

		<!-- Text input-->
		<p>
		  <label class="control-label"><strong>Destino : </strong> <?php echo $seguro['destino'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Marca del veh&iacute;culo : </strong> <?php echo $seguro['marca'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Modelo del veh&iacute;culo : </strong> <?php echo $seguro['modelo'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Placa del veh&iacute;culo : </strong> <?php echo $seguro['placa'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>C&eacute;dula de chofer : </strong> <?php echo $seguro['cedula_chofer'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Nombre del chofer : </strong> <?php echo $seguro['chofer'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Tipo del transporte : </strong> <?php echo $seguro['tipo'];?></label>
		</p>

		  <label class="control-label"><strong>C&eacute;dula de asegurador : </strong> <?php echo $seguro['cedula_asegurador'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Nombre del asegurador : </strong> <?php echo $seguro['asegurador'];?></label>
		</p>

		<p>
		  <label class="control-label"><strong>Precio del seguro : </strong> <?php echo $administra['monto_ingreso'];?></label>
		</p>




		</div>
	</div>
</div>

