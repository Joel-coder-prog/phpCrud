<?php
require "Conexion.php";
$id = $_GET["id"];
$SQL = "select*from personas where id = '$id'";
$resultado = $mysqlConexion->query($SQL);
$row = $resultado->fetch_array(MYSQLI_ASSOC);


function esImagen($ruta)
{
	$extensionesImagen = ["jpg", "jpeg", "png", "gif"];
	$extension = strtolower(pathinfo($ruta, PATHINFO_EXTENSION));
	return in_array($extension, $extensionesImagen);
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
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="actualizar.php" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div><br>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="correo" name="correo" placeholder="correo" value="<?php echo $row['correo']; ?>"  required>
					</div>
				</div><br>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" >
					</div>
				</div><br>
				
				<div class="form-group">
					<label for="estado_civil" class="col-sm-2 control-label">Estado Civil</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado_civil" name="estado_civil">
							<option value="SOLTERO" <?php if($row['estado_civil']=='SOLTERO') echo 'selected'; ?>>SOLTERO/A</option>
							<option value="CASADO" <?php if($row['estado_civil']=='CASADO') echo 'selected'; ?>>CASADO/A</option>
							<option value="OTRO" <?php if($row['estado_civil']=='OTRO') echo 'selected'; ?>>OTRO</option>
						</select>
					</div>
				</div><br>
				
				<div class="form-group">
					<label for="hijos" class="col-sm-2 control-label">¿Tiene Hijos?</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="1" <?php if($row['hijos']=='1') echo 'checked'; ?>> SI
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="0" <?php if($row['hijos']=='0') echo 'checked'; ?>> NO
						</label>
					</div>
				</div><br>
				
				<div class="form-group">
					<label for="intereses" class="col-sm-2 control-label">INTERESES</label>
					
					<div class="col-sm-10">
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Libros" <?php if(strpos($row['intereses'], "Libros")!== false) echo 'checked'; ?>> Libros
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Musica" <?php if(strpos($row['intereses'], "Musica")!== false) echo 'checked'; ?>> Musica
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Deportes" <?php if(strpos($row['intereses'], "Deportes")!== false) echo 'checked'; ?>> Deportes
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Otros" <?php if(strpos($row['intereses'], "Otros")!== false) echo 'checked'; ?>> Otros
						</label>
					</div>
				</div><br>

				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">archivo</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="archivo" name="archivo">
					</div>
					<div class="row mt-4">
						<?php 
							$path = 'files/' . $id;
							if (file_exists($path)) {
								$directorio = opendir($path);
								while ($archivo = readdir($directorio)) {
									if (!is_dir($archivo)) {
										echo '<div class="col-md-3">';
										echo '<div>';
			
										$archivoPath = $path . "/" . $archivo;
										echo "<a href='$archivoPath' target='_blank' title='Ver Archivo'><i class='fa-solid fa-eye'></i> Ver Archivo </a>";
										echo "<a href='#' data='$archivoPath' class='delete ms-2' title='Elimiar Archivo'><i class='fa-solid fa-trash'></i> Eliminar Archivo</a>";
			
										if (esImagen($archivoPath)) {
											echo "<img src='$archivoPath' class='img-thumbnail'>";
										}
			
										echo '</div>';
										echo '</div>';
									}
								}
							}
						?>
					</div>
				</div><br>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>

    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	
		<script type="text/javascript">
		let deleteButtons = document.querySelectorAll('.delete');

		for (let i = 0; i < deleteButtons.length; i++) {
			deleteButtons[i].addEventListener('click', function() {
				var file = this.getAttribute('data');
				var dataString = 'file=' + file;

				fetch('del_file.php', {
						method: 'POST',
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded'
						},
						body: dataString
					})
					.then(function(response) {
						if (response.ok) {
							location.reload();
						}
					})
					.catch(function(error) {
						console.error('Error:', error);
					});
			});
		}
	</script>
	
	</body>
</html>