<?php
	require "Conexion.php";
	
	$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST["campo"];
		if(!empty($valor)){
			$where = "where nombre LIKE '%$valor%'";
		}
	}
	$SQL = "select*from personas $where limit 1000";
  $resultado = $mysqlConexion->query($SQL);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script>
      $(document).ready(function(){
        $("#miTabla").DataTable({
          "order":[[1, "asc"]], 
          "language":{
            "lengthMenu": "Mostrar  _MENU_ registros por pagina",
            "info":"Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Nno hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "loandingRecords": "cargando...",
            "procesing": "procesando...",
            "search": "buscar:",
            "zeroRecords": "no se encontraron registros",
            "paginate": {
              "next": "siguiente",
              "previous": "anterior"
            },

          }

        });
      });
    </script>
  
  </head>
  <body>

    <h1 class="text-center">CRUD con PHP y MySQL</h1><br>

    <div class="container">
        <div class="row">
            <h2 class="text-center">tabla de registros</h2>
        </div>
        <div class="row">
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-primary" href="nuevo.php" role="button"><i class="bi bi-person-circle"></i> nuevo registro</a><br><br>
            </div>
        </div>
        <br>
        <div class="row table-responsive">
          <table class="display" id="miTabla">
            <thead>
              <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>correo</th>
                <th>telefono</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["correo"]; ?></td>
                <td><?php echo $row["telefono"]; ?></td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <a class="btn btn-success" role="button" href="modifcar.php?id=<?php echo $row["id"]; ?>"><i class="bi bi-pencil"></i>  Modificar</a></td>
                  </div>
                </td>
								<td>
                  <div class="d-grid gap-2 d-md-block">
                  <a class="btn btn-danger" href="#" data-id="<?php echo $row["id"]; ?>" data-bs-toggle="modal" data-bs-target="#confirm-delete" role="button"><i class="bi bi-trash3"></i> Eliminar</a>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>        
      </div>
    </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar este registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a id="confirm-delete-btn" class="btn btn-danger" href="#">Eliminar</a>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
    <script>
    $('#confirm-delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recordId = button.data('id');
        var modal = $(this);
        modal.find('#confirm-delete-btn').attr('href', 'eliminar.php?id=' + recordId);
    });
</script>
  </body>
</html>

