<?php include("header.php"); ?>
<?php include 'connection.php'; ?>
<?php
if ($_POST) {
	//para que no se sobrescriban las imagenes , trabaremos con el tiempo
	$fecha = new DateTime();

	//recepcionamos los datos
	$nombre = $_POST['nombre'];
	$image = $fecha->getTimestamp() . "_" . $_FILES['archivo']['name'];
	$descripcion = $_POST['descripcion'];


	//guardaremos la imagen
	$imagen_temporal = $_FILES['archivo']['tmp_name'];
	move_uploaded_file($imagen_temporal, "img/" . $image);

	$connection = new conexion();
	$sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$image', '$descripcion');";
	$connection->ejecutar($sql);
	header("location:portfolio.php");
}
// Aqui hacemos una consulta de todas la tabla.
$connection = new conexion();
$proyectos = $connection->consultar("SELECT * FROM `proyectos`;");

// aqui haremos un delete
if ($_GET) {
	$id = $_GET['borrar'];
	$conexion = new conexion();

	//aqui borraremos la imagen
	$image = $conexion->consultar("SELECT `imagen` from `proyectos` WHERE `id`='$id'");

	//asi borramos totalmente, incluida desde la carpeta.
	unlink("img/" . $image[0]['imagen']);
	$sql = "DELETE FROM `proyectos` WHERE `proyectos`.`id` ='$id'";
	$conexion->ejecutar($sql);
	header("location:portfolio.php");
}

?>

<div class="container my-5">
	<div class="row ">
		<div class="col-md-6">
			<div class="card text-center">
				<div class="card-header">
					Suba un nuevo Proyecto
				</div>
				<div class="card-body">
					<form action="portfolio.php" method="POST" enctype="multipart/form-data">

						<label for="name" class="form-label">Nombre del proyecto</label>
						<input class="form-control" id="user" type="text" name="nombre" value="" placeholder="Ingresa tu nombre del proyecto" required>

						<label for="image" class="form-label">Imagen del proyecto</label>
						<input class="form-control" type="file" name="archivo" id="image" value="" placeholder="Ingresa tu archivo" required>

						<div class="my-3">
							<label for="">Ingresa una descripcion</label>
							<textarea class="form-control" name="descripcion" rows="3" required></textarea>
						</div>
						<input class="btn btn-success my-3" type="submit" name="" value="Enviar">
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Imagen</th>
						<th scope="col">Descripcion</th>
						<th scope="col">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($proyectos as $proyecto) { ?>
						<tr>
							<th><?php echo $proyecto['id']; ?></th>
							<td><?php echo $proyecto['nombre']; ?></td>
							<td>
								<img width="100" src="img/<?php echo $proyecto['imagen']; ?>" alt="">
							</td>
							<td><?php echo $proyecto['descripcion']; ?></td>
							<td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
