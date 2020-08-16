<?php
$servername = "localhost";
$user = "root";
$password = "";
$db ="parcial_i";
$conn = mysqli_connect($servername, $user, $password, $db);
session_start();
    if (!isset($_SESSION["username"])) {
        header("location: index.php");
    }	


  if(isset($_POST["Registrar"])){

$username = $_POST["nombreusuario"];
$password = $_POST["contrasenia"];
$rol = $_POST["rol"];
$estado='A';




if (!$conn) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}

$sql = "INSERT INTO usuarios (nombreusuario,contrasena,rolusuario, estado)
VALUES ('$username', '$password', '$rol', '$estado')";

if ($conn->query($sql) === TRUE) {
    echo "Se registro exitosamente";
    header("location: mostrarusuarios.php");
    exit; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
	<br>
	<center>
		<h1>Registro de Usuarios</h1>
	<div class="contenedor">	
	<form method="POST"><br>
      <input type="text" name="nombreusuario" id="nombreusuario" placeholder="Nombre de usuario"><br>
      <input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña del usuario"><br>
      <select name="rol" id="rol">
  	  <option value="Administrador">Administrador</option>
  	  <option value="Operario">Operario</option>
	  </select><br>
      <br><input type="submit" name="Registrar" id="Registrar" value="Registrar">
    </form>
</div>
<br><a href="mostrarusuarios.php"><input type="button" name="volver"	id="volver" value="Volver"></a>
</center>
<style type="text/css">
	button{
		background-color:blue;
		color:white;
	}
	.contenedor{
		background-color:lightgreen;
		width:250px;
		height:140px;
		border-color:red;
	}
</style>
</body>
</html>