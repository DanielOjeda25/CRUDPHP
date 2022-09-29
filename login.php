<?php
session_start();

if ($_POST) {
	if (($_POST['user'] == "danistry") && ($_POST['password'] == "danistry")) {
		//esta es una variable de sesion
		$_SESSION['user'] = "danistry";

		// la funcion header redirecciona si se ha logeado correctamente
		header("location:index.php");
	} else {
		echo "<script> alert('Usuario o contraseña invalida'); </script>";
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Login</title>
</head>

<body>
	<div class="container">
		<div class="row d-flex ">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card text-center">
					<div class="card-header">
						Iniciar Sesión
					</div>
					<div class="card-body">
						<form action="login.php" method="POST">
							<label for="user" class="form-label">Username</label>
							<input class="form-control" id="user" type="text" name="user" value="" placeholder="ingress your username">
							<label for="pass" class="form-label">Password</label>
							<input class="form-control" type="password" name="password" id="pass" value="" placeholder="ingress your password">
							<button class="btn btn-success my-3" type="submit">Acceso</button>
						</form>
					</div>
					<div class="card-footer text-muted">
						Bienvenido
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</body>
</html>
