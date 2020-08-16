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

if (!$conn) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}
$precio = $_POST["preciocompra"];
$peso = $_POST["pesolechon"];
$descripcion = $_POST["descripcion"];
$edad = $_POST["edad"];
$estado = 'A';
date_default_timezone_set('America/Guatemala');
$fecha = date("Y-m-d H:i:s");

$sql = "INSERT INTO registrolechon (preciocompra,peso,descripcion,edadmeses,estado,fechacompra)
VALUES ('$precio', '$peso', '$descripcion', '$edad', '$estado','$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "Se registro exitosamente";
    header("location: mostrarlechon.php");
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
		<h1>Registrar Lechon</h1>
	<div class="contenedor">	
	<form method="POST" ><br>
      <input type="text" name="preciocompra" id="preciocompra" placeholder="Precio del Lechon"><br>
      <input type="text" name="pesolechon" id="pesolechon" placeholder="Peso en libras"><br>
      <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion"><br>
      <input type="text" name="edad" id="edad" placeholder="Edad en Meses"><br>
     
      <br><br><input type="submit" name="Registrar" id="Registrar" value="Registrar">
    </form>
</div>
<br>
<a href="mostrarlechon.php"><input type="button" name="Volver" id="Volver"  value="Volver"></a>
</center>
<style type="text/css">
	.contenedor{
		background-color:pink;
		width:250px;
		height:200px;
	}
</style>
</body>
</html>