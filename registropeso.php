<?php
$servername = "localhost";
$user = "root";
$password = "";
$db ="parcial_i";
$conn = mysqli_connect($servername, $user, $password, $db);
session_start();
    if (!isset($_SESSION["operario"])) {
        header("location: index.php");
    }	


if (!$conn) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}
$query = mysqli_query($conn,"SELECT * FROM registrolechon WHERE estado='A'");

if(isset($_POST["Registrar"])){
$codigo = $_POST["codigolechon"];
$peso = $_POST["pesolechon"];
date_default_timezone_set('America/Guatemala');
                $fecha = date("Y-m-d H:i:s");

$sql = "INSERT INTO registropeso (codigolechon,peso,fecha)
VALUES ('$codigo', '$peso', '$fecha')";

$actu="UPDATE registrolechon SET peso='$peso' WHERE idlechon='$codigo'";

if ($conn->query($sql) AND $conn->query($actu) === TRUE) {
    echo "Se registro exitosamente";
    header("location: registropeso.php");
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
		<h1>Registro de Peso</h1>
	<div class="contenedor">	
	<form method="POST" ><br>
		<input type="text" name="codigolechon" id="codigolechon" value="Codigo de Lechon:" disabled>
		<select name="codigolechon" id="codigolechon">
      	<option>---</option>
      	<?php while($row = mysqli_fetch_array($query)){?>
  	  <option value="<?php echo $row['idlechon']?>"><?php echo $row['idlechon']?></option>
  	  	<?php } ?>
	  </select><br>
      <input type="text" name="pesolechon" id="pesolechon" placeholder="Peso en libras"><br>
      <br><br><input type="submit" name="Registrar" id="Registrar" value="Registrar">
    </form>
</div>
<br><a href="salir.php"><input type="submit" name="Salir" id="Salir" value="Salir"></a>
</center>
<style type="text/css">
	.contenedor{
		background-color:gold;
		width:250px;
		height:140px;
	}
</style>
</body>
</html>