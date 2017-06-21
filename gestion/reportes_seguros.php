<?php
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

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
			<center>		
				<form class="form-inline print" method="post">
				  <label>Desde : </label>
				  <input type="date" class="input-small span2" placeholder="Fecha desde" name="desde">
				  <label>Hasta : </label>
				  <input type="date" class="input-small span2" placeholder="Fecha hasta" name="hasta">

				  <button type="submit" class="btn btn-success" >Buscar</button>
				</form>
			</center>


				<div class="media">
				  <a class="pull-left" href="#">
				    <img class="media-object" src="img/logofinal3.png">
				  </a>
				  <div class="media-body">
				    <center>
				    <h3 class="media-heading">
					Acumulado en el reporte de Fondo de Contingencia
					del <?php echo $desde; ?> al <?php echo $hasta; ?>
					</h3>
					</center>
				  </div>
				</div>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>D&iacute;a</th>
					<th>Nro. de Cargas Aseguradas</th>
					<th>Monto depositado</th>
				</tr>
			</thead>
			<tbody>
				<?php echo lista_reporte_seguros($desde, $hasta); ?>
			</tbody>
		<table>


		</div>
	</div>
</div>
