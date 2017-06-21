<?php 
session_start();
 include('configuracion/conex.php');
 include('site/header.php'); 



$va=$_POST['enviar'];
if($va){
	$us=$_POST['usuario'];
	$cl=md5($_POST['password']);
	$sql=mysql_query("SELECT * FROM usuarios WHERE log = '$us' AND pass ='$cl' AND estatus ='ACTIVO'");

	if($daval=mysql_fetch_array($sql)){
		$_SESSION['usu']=$daval['log'];
		$_SESSION['niv']=$daval['tipo_usuario'];
		$_SESSION['idE']=$daval['idusuarios'];
		$_SESSION['cedUsuario']=$daval['personas_cedula'];
			echo "<script>";
				echo "location.replace('index.php');";
			echo "</script>";
	}else {
		echo "<script>";
			echo "alert(".$sql.");";
		echo "</script>";
	}
}
?>

    <!--CONTENEDOR-->
     <div class="container">
	
         <div class="row-fluid">
              <div class="">
	
		<form method="POST">
		  <fieldset>
		    <legend>Acceso</legend>
		    <label>Usuario</label>
		    <input type="text" name ="usuario" class="span3">

		    <label>Password</label>
		    <input type="password" name ="password" class="span3">
			</br>
		    <button class="btn btn-success" name="enviar" value="enviar" type="submit" >Enviar</button>
		  </fieldset>
		</form>
  	  
              </div>
	</div>
	
    </div>

<?php include('site/footer.php'); ?>

