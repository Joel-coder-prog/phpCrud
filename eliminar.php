<?php
require "Conexion.php";

$id = $_GET["id"];

$SQL = "delete from personas where id= $id";
$resultado = $mysqlConexion->query($SQL);
$carpeta = 'files/' . $id;

if (is_dir($carpeta)) {
	$archivos = glob($carpeta . '/*'); // Obtener lista de archivos
	foreach ($archivos as $archivo) {
		unlink($archivo); // Eliminar cada archivo
	}
	rmdir($carpeta);
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
                    <h3>registro eliminado</h3>
                    <?php } else { ?>
                    <h3>error al eliminar el registro</h3>
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