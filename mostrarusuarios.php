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
	<title>Control Usuarios</title>
</head>
<body>
	<center>
		<h1>Control de Usuarios </h1>
		<a href="registrarusuario.php"><input type="button" name="registraru" id="registraru" value="Registrar Usuario"></a>
		<a href="actualizarusuarios.php"><input type="button" name="Actualizar" id="Actualizar" value="Actualizar"></a>
		<a href="eliminarusuarios.php"><input type="button" name="Eliminar" id="Eliminar" value="Eliminar"></a>
		<a href="principaladmin.php"><input type="button" name="volver" id="volver" value="Volver"></a>
	<br><br><br>
	<table style="width:80% ">
		<tr>
			<th>Codigo Usuario</th>
			<th>Nombre</th>
			<th>Contraseña</th>
			<th>Rol</th>
			<th>Estado</th>
		</tr>

		<?php
		$sql="SELECT * FROM usuarios WHERE estado='A'";
		$resul=mysqli_query($conn,$sql);

		while ($mostrar=mysqli_fetch_array($resul)) {
		?>
		<tr>
			<td><?php echo $mostrar['idusuario'] ?></td>
			<td><?php echo $mostrar['nombreusuario'] ?></td>
			<td><?php echo $mostrar['contrasena'] ?></td>
			<td><?php echo $mostrar['rolusuario'] ?></td>
			<td><?php echo $mostrar['estado'] ?></td>
		</tr>
</center>
	<?php 
	} 
	?>
	</table>

<style type="text/css">
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}

	td{
		padding: 10px;
		background: #FF915F;
	}

	th{
		padding: 6px;
		text-align: left;
		background: #86FF94;
	}
</style>
</body>
</html>