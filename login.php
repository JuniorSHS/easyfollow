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
	<title>Connexion</title>
</head>
<body>


<!-- formulaire de connexion au milieu de la page -->
	<div class="container-fluid pt-4 px-4">
		<div class="row g-4">
			<div class="col-md-4 offset-md-4 form-div login">
			<div class="bg-secondary rounded h-100 p-4">
				<form action="login.php" method="POST">
					<h3 class="text-center">CONNEXION</h3>

					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Identifiant (email)</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
                        <center><button type="submit" name="login" class="btn btn-primary">Se connecter</button></center>
						<p class="text-center">Pas encore inscrit ? <a href="register.php">S'inscrire</a></p>
                    </form>
				</div>
			</div>
		</div>
	</div>


<script src="js/main.js"></script>
</body>
</html>