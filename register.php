<?php
	// signaler et afficher toute erreur PHP ou syntaxique sur la page
	error_reporting(-1);
	ini_set('display_errors',1);
?>
<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="shortcut icon" href="img/ninja.png" type="image/x-icon">
	<title>S'inscrire</title>
</head>
<body>


<!-- formulaire d'inscription au milieu de la page -->
	<div class="container-fluid pt-4 px-4">
		<div class="row g-4">
			<div class="col-md-4 offset-md-4 form-div login">
			<div class="bg-secondary rounded h-100 p-4">
				<form action="register.php" method="POST">
					<h3 class="text-center">INSCRIPTION</h3>

					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Nom</label>
						<input type="text" class="form-control" name="nom" id="exampleInputPassword1">
						</div>
						<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Prénom</label>
						<input type="text" class="form-control" name="prenom" id="exampleInputPassword1">
						</div>
						<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Email</label>
						<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
						<div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec qui que ce soit.</div>
						</div>
						<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Genre</label>
						<select class="form-select" aria-label="Default select example">
						<option selected>- -</option>
						<option value="1">Homme</option>
						<option value="2">Femme</option>
						</select>
						</div>
						<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Mot de passe</label>
						<input type="password" class="form-control" name="password_1" id="exampleInputPassword1">
						</div>
						<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Confirmer le mot de passe</label>
						<input type="password" class="form-control" name="password_2" id="exampleInputPassword1">
						</div>
						<center><br><button type="submit" name="register" class="btn btn-primary">S'inscrire</button></center>
						<br>
						<p class="text-center">Déjà inscrit? <a href="login.php">Se connecter</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>








<script src="js/main.js"></script>
</body>
</html>