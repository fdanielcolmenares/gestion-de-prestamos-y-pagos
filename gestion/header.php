<DOCTYPE html>
  <html lang="es">
    <head>
      <Meta  charset= "utf-8">
      <title>ASOHORJAUREGUI</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/bootstrap-resposive.css">
      <link rel="stylesheet" href="css/estilo.css">
	<script src="js/jquery.js"></script> 
	<script src="js/jquery.mask.min.js"></script> 
   </head>
   <body>
<?php

session_start();
$usuario=$_SESSION['usu'];
$nivel=$_SESSION['niv'];

?>
    <!--BARRA-->
     <div class="container">
       <legend>Sistema ASOHORJAUREGUI</legend>


<?php if($usuario){ ?>
        <div class="navbar navbar-inverse">
         <div class="navbar-inner">
           <div class="container">
             <a href="#"class="btn btn-navbar" data-toggle="collapse" data target=".nav-collapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             </a>
             <div class="nav-collapse">
               <ul class ="nav">
		<li><a href="#" ><strong><small>Usuario : <?php echo $usuario; ?></small></strong></a></li>

<?php if( $nivel=='ASISTENTE' || $nivel=='ADMINISTRADOR' ){ ?>

                   <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Personas</a>
                   <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                   <li><a href="?e=1">Crear nuevo registro</a></li>
           <li><a href="?e=2">Consultar registros</a></li>
                   </ul>
                   </li>

          
<?php } ?>


	<?php if($nivel == 'ADMINISTRADOR' ){ ?>
              <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios</i></a>
               <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                 <li><a href="?e=5">Crear nuevo usuario</a></li>
		<li><a href="?e=6">Modificar usuario</a></li>
               </ul>
             </li>
	<?php } ?>
<!--
<?php if($nivel == 'ADMINISTRADOR' || $nivel=='ASISTENTE'){ ?>
                   <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Personas</a>
                   <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                   <li><a href="?e=2">Consultar</a></li>
                   </ul>
                   </li>
<?php } ?>
-->



<?php if($nivel == 'ADMINISTRADOR' || $nivel == 'ASISTENTE'){ ?>

             <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos</i></a>
               <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
               <li><a href="?e=7">Crear productos</a></li>
               </ul>
             </li>

              <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administración</i></a>
               <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                 <li><a href="?e=8">Caja</a></li>
               </ul>
             </li>

<?php } ?>
	<?php if($nivel == 'ADMINISTRADOR'  || $nivel == 'ASISTENTE'  || $nivel == 'USUARIO' ){ ?>
              <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes</a>
               <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><a href="?e=10">Ingresos/Egresos</a></li>

               </ul>
             </li>
	<?php } ?>
             <li><a href="?s=<?php echo rand(322,5342);?>">Cerrar Sesi&oacute;n</a></li>
        </div>



<?php }?>
          </div>
        </div>
      </div>
    </div>
