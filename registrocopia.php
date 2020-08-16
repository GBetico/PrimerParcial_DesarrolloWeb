<?php
$servername = "localhost";
$user = "root";
$password = "";
$db ="parcial_i";
$conn = mysqli_connect($servername, $user, $password, $db);
  if(isset($_POST["Registrar"])){

$username = $_POST["nombreusuario"];
$password = $_POST["contrasenia"];
$rol = $_POST["rol"];
$estado='A';




if (!$conn) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}

$sql = "INSERT INTO usuarioss (nombre,password,privilegio)
VALUES ('$username', '$password', '$rol')";

if ($conn->query($sql) === TRUE) {
    echo "Se registro exitosamente";
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
  	  <option value="1">Administrador</option>
  	  <option value="2">Operario</option>
	  </select><br>
      <br><input type="submit" name="Registrar" id="Registrar" value="Registrar">
    </form>
</div>
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