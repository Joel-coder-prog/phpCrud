<?php
require "Conexion.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$estado_civil = $_POST["estado_civil"];
$hijos = isset($_POST["hijos"]) ? $_POST["hijos"] : 0;
$intereses = isset($_POST["intereses"]) ? $_POST["intereses"]:null;

$arregloIntereses = null;
$numeroArreglo = count($intereses);
$contador = 0;
if($numeroArreglo > 0){
    foreach($intereses as $key => $value){
        if($contador != $numeroArreglo-1){
            $arregloIntereses .= $value. ' ';
        }else{
            $arregloIntereses .= $value;
            $contador++;
        }
    }
}

$SQL = "update personas set nombre='$nombre', correo='$correo', telefono='$telefono', estado_civil='$estado_civil', hijos='$hijos', intereses='$arregloIntereses' where id = '$id'";
$resultado = $mysqlConexion->query($SQL); 

if ($_FILES["archivo"]["error"] === 0) {

	$permitidos = array("image/png", "image/jpg", "image/jpeg", "application/pdf");
	$limite_kb = 1024; //1 MB

	if (in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024) {

		$ruta = 'files/' . $id . '/';
		$archivoNombre = $_FILES["archivo"]["name"];
		$extension = pathinfo($archivoNombre, PATHINFO_EXTENSION);
		$archivo = $ruta . uniqid() . '.' . $extension;

		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}

		if (!file_exists($archivo)) {

			$resultado = move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);

			if ($resultado) {
				echo "Archivo Guardado";
			} else {
				echo "Error al guardar archivo";
			}
		} else {
			echo "Archivo ya existe";
		}
	} else {
		echo "Archivo no permitido o excede el tamaño";
	}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="js/jquery-3.1.1.min.js"></script>
</head>
  <body>
    <div class="container">
        <div class="row">
            <div class="row text-center">
                <?php if($resultado){ ?>
                    <h3>registro modificado</h3>
                    <?php } else { ?>
                    <h3>error al modificar</h3>
                    <?php } ?>
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-primary" href="index.php" role="button">regresar</a>
                    </div>
            </div> 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>