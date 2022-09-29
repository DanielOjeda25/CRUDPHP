<?php include("header.php"); ?>
<?php include("connection.php"); ?>
<?php
$conexion = new conexion();
$proyectos = $conexion->consultar("SELECT * FROM `proyectos`");
?>
<div class="row row-cols-1 row-cols-md-3 g-4">
	<?php foreach ($proyectos as $proyecto) { ?>
		<div class="col">
			<div class="card h-100">
				<img src="img/<?php echo $proyecto['imagen']; ?>" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?php echo $proyecto['nombre']; ?></h5>
					<p class="card-text"><?php echo $proyecto['descripcion']; ?>.</p>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php include 'footer.php'; ?>
