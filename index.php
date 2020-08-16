<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db ="parcial_i";

$conn = mysqli_connect($servername, $username, $password, $db);

session_start();

	if(isset($_POST["Iniciar"])){
	$usu = $_POST["nombreusuario"];
	$contra = $_POST["contrasenia"];

	$admin = "Administrador";
	$opera = "Operario";

	$query2 = mysqli_query($conn,"SELECT rolusuario from usuarios WHERE nombreusuario='$usu' AND contrasena='$contra'");
	$row = mysqli_fetch_array($query2);

	if($row['rolusuario']== $admin){
		$_SESSION["username"]=$usu;
		header("location: principaladmin.php");
	}elseif ($row['rolusuario']==$opera) {
		$_SESSION["operario"]=$usu;
		header("location: registropeso.php");
	}



	/*$query = "SELECT count(*) as contar FROM usuarios WHERE nombreusuario ='$usu' AND contrasena='$contra'";  
	$resul=mysqli_query($conn,$query);
	$array = mysqli_fetch_array($resul);

	if($array['contar']>0){
		$_SESSION["username"]=$usu;
		header("location: principaladmin.php");
	}else{
		echo "error papu";
	}*/
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>	Inicio de Sesion</title>
</head>
<body>
	<br>
	<br>
	<center>
		<h1>Inicio de Sesión</h1>
	<div class="contenedor">	
	<form method="POST">
      <br><input type="text" name="nombreusuario" id="nombreusuario" placeholder="Nombre de usuario"><br>
      <input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña del usuario"><br>
      <br><input type="submit" name="Iniciar" id="Iniciar" value="Iniciar Sesión">
    </form>
</div>
</center>
<style type="text/css">
	button{
		background-color:blue;
		color:white;
	}
	.contenedor{
		background-color:#40c4ff;
		width:250px;
		height:130px;
		border-color:red;
	}
</style>
</body>
</html>