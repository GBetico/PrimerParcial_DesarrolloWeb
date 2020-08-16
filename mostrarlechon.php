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
	<title>mostrar datos lechon</title>
</head>
<body>
	<center>
		<h1>Reporte de Animales </h1>
		<a href="registrarlechon.php"><input type="button" name="Registrarlechon" id="Registrarlechon" value="Registrar Lechon"></a>
		<a href="principaladmin.php"><input type="button" name="volver" id="volver" value="Volver"></a>
	<br><br><br>
	<table style="width:80% ">
		<tr>
			<th>Codigo Lechon</th>
			<th>Precio Compra</th>
			<th>Peso</th>
			<th>Descripcion</th>
			<th>Edad</th>
			<th>Estado</th>
			<th>Fecha Compra</th>
		</tr>

		<?php
		$sql="SELECT * FROM registrolechon WHERE estado='A'";
		$resul=mysqli_query($conn,$sql);

		while ($mostrar=mysqli_fetch_array($resul)) {
		?>
		<tr>
			<td><?php echo $mostrar['idlechon'] ?></td>
			<td><?php echo $mostrar['preciocompra'] ?></td>
			<td><?php echo $mostrar['peso'] ?></td>
			<td><?php echo $mostrar['descripcion'] ?></td>
			<td><?php echo $mostrar['edadmeses'] ?></td>
			<td><?php echo $mostrar['estado'] ?></td>
			<td><?php echo $mostrar['fechacompra'] ?></td>
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
		background: #6DFFEC;
	}

	th{
		padding: 6px;
		text-align: left;
		background: #FFC043;
	}
</style>

</body>
</html>