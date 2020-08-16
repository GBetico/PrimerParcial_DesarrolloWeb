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

$query = mysqli_query($conn,"SELECT * FROM registrolechon WHERE estado='A'");

  if(isset($_POST["Registrar"])){

$codigo = $_POST["codigo"];
$preciolbl = $_POST["preciolibra"];
$precioventa = $_POST["precioventa"];
$edad = $_POST["edad"];
date_default_timezone_set('America/Guatemala');
$fecha = date("Y-m-d H:i:s");

$sql = "INSERT INTO ventas (codigoanimal, precioenlibras, precioventa, edadmeses, fechaventa)
VALUES ('$codigo', '$preciolbl', '$precioventa', '$edad', '$fecha')";

$actu="UPDATE registrolechon SET estado='I' WHERE idlechon='$codigo'";

if ($conn->query($sql) AND $conn->query($actu) === TRUE) {
    echo "Se registro exitosamente";
    header("location: principaladmin.php");
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
		<h1>Registro Venta</h1>
	<div class="contenedor">	
	<form method="POST" ><br>
		<input type="text" name="codigolechon" id="codigolechon" value="Codigo de Lechon:" disabled>
      <select name="codigo" id="codigo">
      	<option>---</option>
      	<?php while($row = mysqli_fetch_array($query)){?>
  	  <option value="<?php echo $row['idlechon']?>"><?php echo $row['idlechon']?></option>
  	  	<?php } ?>
	  </select><br>
      <input type="text" name="preciolibra" id="preciolibra" placeholder="Precio Libra"><br>
      <input type="text" name="precioventa" id="precioventa" placeholder="Precio de Venta"><br>
      <input type="text" name="edad" id="edad" placeholder="Edad del Lechon"><br>
      
      <br><input type="submit" name="Registrar" id="Registrar" value="Registrar">
    </form>

</div>
<br><a href="principaladmin.php"><input type="button" name="volver" id="volver" value="Volver"></a>
</center>

<style type="text/css">
	button{
		background-color:blue;
		color:white;
	}
	.contenedor{
		background-color:orange;
		width:250px;
		height:170px;
		border-color:red;
	}
</style>
</body>
</html>