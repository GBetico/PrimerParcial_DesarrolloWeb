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

if (!$conn) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE estado='A'");

  if(isset($_POST["Eliminar"])){
$codi=$_POST["codigo"];
$usu = $_POST["Usuario"];
$contra = $_POST["Contrasena"];
$rol = $_POST["rol"];

$actu="UPDATE usuarios SET estado='I' WHERE idusuario='$codi'";

if ($conn->query($actu) === TRUE) {
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
		<h1>Eliminar Usuarios</h1>
	<div class="contenedor">	
	<form method="POST" ><br>
		<input type="text" name="Id de Usuario" id="IdUsuario" value="Id de Usuario:" disabled>
      <select name="codigo" id="codigo">
      	<option>---</option>
      	<?php while($row = mysqli_fetch_array($query)){?>
  	  <option value="<?php echo $row['idusuario']?>"><?php echo $row['idusuario']?></option>
  	  	<?php } ?>
	  </select><br>
      
      <br><input type="submit" name="Eliminar" id="Eliminar" value="Eliminar">
    </form>

</div>
<br><a href="mostrarusuarios.php"><input type="button" name="volver" id="volver" value="Volver"></a>
</center>

<style type="text/css">
	button{
		background-color:blue;
		color:white;
	}
	.contenedor{
		background-color:orange;
		width:250px;
		height:115px;
		border-color:red;
	}
</style>
</body>
</html>