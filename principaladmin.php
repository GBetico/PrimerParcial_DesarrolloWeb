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
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<br>
			<h1>Bienvenido <?php echo $_SESSION['username']; ?></h1>

	<br><br>
	<a href="mostrarlechon.php"><input type="button" name="RegistrarLechon" id="Reporte Animales" value="Reporte Animales"></a>
	<a href="registroventa.php"><input type="button" name="Venta" id="Venta" value="Venta"></a>
	<a href="mostrarusuarios.php"><input type="button" name="controlusuario" id="controlusuario" value="ControlUsuarios"></a>
	<a href="salir.php"><input type="button" name="salir" id="salir" value="Salir"></a>
	</center>
</body>
</html>