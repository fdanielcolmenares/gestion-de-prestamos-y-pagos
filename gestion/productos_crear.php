<?php

$guardar = $_POST['guardar'];
if($guardar =="guardar"){
$nomb = $_POST['productos_nombre'];
$desc = $_POST['productos_descripcion'];
$pcomp = $_POST['productos_preciocompra'];
$pvent = $_POST['productos_precioventa'];
insProductos($nomb, $desc, $pcomp, $pvent);

}
$cod = $_GET['cod'];
if($guardar =="modificar"){
$nomb = $_POST['productos_nombre'];
$desc = $_POST['productos_descripcion'];
$pcomp = $_POST['productos_preciocompra'];
$pvent = $_POST['productos_precioventa'];
$estatus = $_POST['productos_estatus'];
$id  = $cod;
ModProd($nomb, $desc, $pcomp, $pvent, $estatus, $id);

}


if($cod){
$producto = producto($cod);
$estatus = $producto['estatus'];
if($estatus =="ACTIVO"){
	$opt1 = "selected=\"selected\"";
}
if($estatus =="INACTIVO"){
	$opt2 = "selected=\"selected\"";
}
}


$productos = lista_productos();
?>

    <!--CONTENEDOR-->
     <div class="container">
         <div class="row-fluid">
              <div class="">

                <legend class="text-center">Cargar Productos</legend>

<?php
if($cod){
?>

                <form class="form-horizontal" method="POST">
			<fieldset>


			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="productos_nombre">Nombre del producto:</label>
			  <div class="controls">
			    <input id="productos_nombre" name="productos_nombre" type="text" placeholder="" class="span4" required="" value="<?php echo $producto['nombre']; ?>">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="productos_descripcion">Descripcion :</label>
			  <div class="controls">
			    <input id="productos_descripcion" name="productos_descripcion" type="text" placeholder="" class="span4" required="" value="<?php echo $producto['descripcion']; ?>" >
			    
			  </div>
			</div>



			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="productos_preciocompra">Precio de compra :</label>
			  <div class="controls">
			    <input id="productos_preciocompra" name="productos_preciocompra" type="text" placeholder="" class="span4"required="" value="<?php echo $producto['precio_compra']; ?>">
			    
			  </div>
			</div>


			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="productos_precioventa">Precio de venta :</label>
			  <div class="controls">
			    <input id="productos_precioventa" name="productos_precioventa" type="text" placeholder="" class="span4" required="" value="<?php echo $producto['precio_venta']; ?>">
			    
			  </div>
			</div>



			<div class="control-group">
			<label class="control-label" for="personas_estatus">Estatus:</label>
				<div class="controls">
					<select id="productos_estatus" name="productos_estatus" class="span4">
					<option value="ACTIVO" <?php echo $opt1; ?> >Activo</option>
					<option value="INACTIVO" <?php echo $opt2; ?> >Inactivo</option>
					</select>
				</div>
			</div>


			<!-- Button (Double) -->
			<div class="control-group">
			  <label class="control-label" for="productos_guardarproductos"></label>
			  <div class="controls">
			    <button id="productos_guardarproductos" type="submit" name="guardar" value="modificar" class="btn btn-success">Modificar</button>
			    <a href="?e=7" id="productos_cancelar" name="productos_cancelar" class="btn btn-danger">Cancelar</a>
			  </div>
			</div>



			</fieldset>
		</form>
<?php }else{ ?>
                <form class="form-horizontal" method="POST">
			<fieldset>


			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="productos_nombre">Nombre del producto:</label>
			  <div class="controls">
			    <input id="productos_nombre" name="productos_nombre" type="text" placeholder="" class="span4" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="productos_descripcion">Descripcion :</label>
			  <div class="controls">
			    <input id="productos_descripcion" name="productos_descripcion" type="text" placeholder="" class="span4"required="">
			    
			  </div>
			</div>



			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="productos_preciocompra">Precio de compra :</label>
			  <div class="controls">
			    <input id="productos_preciocompra" name="productos_preciocompra" type="text" placeholder="" class="span4"required="">
			    
			  </div>
			</div>


			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="productos_precioventa">Precio de venta :</label>
			  <div class="controls">
			    <input id="productos_precioventa" name="productos_precioventa" type="text" placeholder="" class="span4" required="">
			    
			  </div>
			</div>



			<!-- Button (Double) -->
			<div class="control-group">
			  <label class="control-label" for="productos_guardarproductos"></label>
			  <div class="controls">
			    <button id="productos_guardarproductos" type="submit" name="guardar" value="guardar" class="btn btn-success">Guardar</button>
			    <button id="productos_cancelar" name="productos_cancelar" class="btn btn-danger">Cancelar</button>
			  </div>
			</div>

			</fieldset>
		</form>
<?php } ?>
		<legend class="text-center">Inventario</legend>


		<table class="table table-striped table-bordered">
		  <thead>
		    <tr>
		      <th>Producto</th>
		      <th>Descripcion</th>
		      <th>Precio compra</th>
		      <th>Precio venta</th>
		      <th>Existencia</th>
        	      <th>Estatus</th>
		      <th>Acci&oacute;n</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php echo $productos; ?>
		  </tbody>
		</table>

   

		</div>
  	</div>
    </div>

<script>
$(document).ready(function(){
  //$('#administracion_monto').mask('000.000.000.000.000,00', {reverse: true});
  $('#productos_precioventa').mask('000000000000000.00', {reverse: true});
  $('#productos_preciocompra').mask('000000000000000.00', {reverse: true});
});
</script>