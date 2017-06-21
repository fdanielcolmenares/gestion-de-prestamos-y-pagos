<?php 

 include('configuracion/conex.php');
 include('configuracion/insert.php'); 	
 include('configuracion/select.php'); 
 include('configuracion/update.php'); 
 include('site/header.php'); 


session_start();
$usuario=$_SESSION['usu'];
$nivel=$_SESSION['niv'];
$ced_usuario = $_SESSION['cedUsuario'];
if(!$usuario){
	echo "<script>";
		echo "location.replace('acceso.php');";
	echo "</script>";
}

$cerrar=$_GET['s'];
if(is_numeric($cerrar)){
	$_SESSION = array();
	session_destroy();
	session_unset();
	echo "<script>";
		echo "location.replace('acceso.php');";
	echo "</script>";
}

?>

    <!--CONTENEDOR-->
     <div class="container">
	<!--
         <div class="row-fluid">
              <div class="hero-unit">
	-->
	<?php
	$enlace = $_GET['e'];
	$pagina = menu($enlace);
	include($pagina);
	?>

  	<!--  
              </div>
	</div>
	-->
    </div>

<?php include('site/footer.php'); ?>

