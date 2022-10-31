<?php
	// report & display any PHP or syntax errors on page, if any
	error_reporting(-1);
	ini_set('display_errors', 1);

	// initializing variables
	$username = "";
	$email = "";
	$password = "";

	$errors = array(); // will append the below errors to this array variable if applicable
	// CONNECT TO DATABASE; update w/ your db info, username & password
	$db = new PDO('mysql:host=localhost; dbname=easyfollow', 'root', '');

	/**** MYSQLCONNECT VERSION:
	 * 		$conn = mysql_connect('localhost', 'root', '');
	 * 		$db = mysql_select_db(registration, $conn);
	 * ****/




	
	// ****************************S'ENREGISTER****************************
	// Une fois que l'utilisateur clique sur le bouton "S'ENREGISTER"
	if (isset($_POST['register']))
	{

		// Recevoir toutes les valeurs du formulaire d'enregistrement
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$genre = $_POST['genre'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];


		// si l'un des champs est vide, ajouter une erreur
		if (empty($nom)) { array_push($errors, "Vous devez entrer votre nom"); }
		if (empty($prenom)) { array_push($errors, "Vous devez entrer votre prénom"); }
		if (empty($email)) { array_push($errors, "Veuillez entrer votre email"); }
		if (empty($genre)) { array_push($errors, "Veuillez entrer votre genre"); }
		if (empty($password_1)) { array_push($errors, "Un mot de passe est requis"); }
		if ($password_1 != $password_2) { array_push($errors, "Vos mots de passe ne correspondent pas"); }


		// Déclaration de SQL préparée pour éviter les injections SQL 
		// check si l'utilisateur existe déjà dans la base de données
		$user_check_query = "SELECT * FROM users WHERE email = :email LIMIT 0, 1"; // declarer le query en string
		$result = $db->prepare($user_check_query);
		$result->execute(['email' => $email]); // executer avec ses parametres
		$user = $result->fetch(PDO::FETCH_ASSOC); // obtenir le resultat sous forme de tableau associatif



		// si l'utilisateur entrer une adresse email déjà existant dans la base de données
		// on ajoute une erreur à l'array $errors
		if ($user)
		{
			if ($user['email'] === $email) { array_push($errors, "Cette adresse email est déjà utilisé"); }
		}


		// seulement si il n'y a pas d'erreur, on enregistre l'utilisateur dans la base de données:
		if (count($errors) == 0) // si le nombre d'erreur est égal à 0
		
		{
			// encrypter/hash le mot de passe avant de le stocker dans la base de données
			$password = password_hash($password_1, PASSWORD_DEFAULT);
			$insert_query = "INSERT INTO users (nom, prenom, email, genre, password) VALUES(:nom, :prenom, :email, :genre, :password)";
			$stmt = $db->prepare($insert_query);
			$stmt->execute([
				'nom' => $nom,
				'prenom' => $prenom,
				'email' => $email,
				'genre' => $genre,
				'password' => $password
			]); // executer avec ses parametres


			// créer une session pour l'utilisateur
			$_SESSION['email'] = $email;
			header('Location: index.php'); // Rediriger vers la page d'accueil index.php
			
		}
	}



	// ****************************LOGIN****************************
	// Quand l'utilisateur clique sur le bouton "se connecter"
	if (isset($_POST['login']))
	{

		// recevoir toutes les valeurs du formulaire de connexion
		$email = $_POST['email'];
		$password = $_POST['password'];


		// si un des champs est vide, ajouter une erreur
		if (empty($email)) { array_push($errors, "Le nom d'utilisateur doit être entré"); }
		if (empty($password)) { array_push($errors, "Le mot de passe doit être entré"); }


		// si il n'y a pas d'erreur, on vérifie si l'utilisateur existe dans la base de données
		else if (count($errors) == 0)
		{

			// Déclaration de SQL préparée pour éviter les injections SQL 
			// check si l'utilisateur existe déjà dans la base de données
			$query = "SELECT * FROM users WHERE email = :email LIMIT 0, 1"; // 
			$stmt = $db->prepare($query);  
			$stmt->execute(['email' => $email]); // ecxecuter avec ses parametres
			$row_count = $stmt->rowCount(); // 


			// si l'utilisateur existe
			if ($row_count > 0)
			{
				$row = $stmt->fetch(PDO::FETCH_ASSOC); // obtenir le resultat sous forme de tableau associatif
				$password_user_hash = $row['password'];
				$password_user_verify = password_verify($password, $password_user_hash); // retourne true si le mot de passe est correct
				
				// si le mot de passe hashé est correct 
				if ($password_user_verify)
				{
					$_SESSION['email'] = $email;
					header('Location: index.php');
				}


				// si le mot de passe est incorrect
				else
				{
					array_push($errors, "Nom d'utilisateur ou mot de passe incorrect");
				}
			}


			// utilisateur n'existe pas
			else
			{
				array_push($errors, "Si vous n'avez pas de compte, veuillez vous inscrire");
			}
		}
	}


	// **************************** PAGE INDEX ****************************
	// Quand l'utilisateur est connecté on recupere les informations de l'utilisateur dans la base de données : nom, prenom, genre, email
	if (isset($_SESSION['email']))
	{
		$email = $_SESSION['email'];
		$query = "SELECT * FROM users WHERE email = :email"; // 
		$stmt = $db->prepare($query); 
		$stmt->execute(['email' => $email]); // executer avec ses parametres
		$row_count = $stmt->rowCount();
		$row = $stmt->fetch(PDO::FETCH_ASSOC); // obtenir le resultat sous forme de tableau associatif
		$nom = $row['nom'];
		$prenom = $row['prenom'];
		$genre = $row['genre'];
		$email = $row['email'];
	}

	// **************************** PAGE MISSION ****************************
	// Quand l'utilisateur clique sur le bouton ajouter on ajoute la mission dans la base de données
	if (isset($_POST['add_mission']))
	{
		$email = $_SESSION['email'];
		$query = "SELECT * FROM users WHERE email = :email"; 
		$stmt = $db->prepare($query); 
		$stmt->execute(['email' => $email]); // ecxecuter avec ses parametres
		$row_count = $stmt->rowCount();
		$row = $stmt->fetch(PDO::FETCH_ASSOC); // obtenir le resultat sous forme de tableau associatif
		$nom = $row['email'];
		$id = $row['id'];
		$nom = $row['nom'];
		$prenom = $row['prenom'];


		// recevoir toutes les valeurs du formulaire d'ajout de mission
		$nom_mission = $_POST['nom_mission'];
		$date_debut = $_POST['date_debut'];
		$date_fin = $_POST['date_fin'];
		$entreprise = $_POST['entreprise'];
		$ville = $_POST['ville'];
		$desc_mission = $_POST['desc_mission'];
		$heure_debut = $_POST['heure_debut'];
		$heure_fin = $_POST['heure_fin'];
		$type = $_POST['type'];
		$montant = $_POST['montant'];
		if (empty($montant))
		{
			$montant = 0;
		}
		$statut = $_POST['statut'];
		$date_creation = date("Y-m-d");
		$users_id = $id; // id de l'utilisateur connecté

		// si un des champs est vide, ajouter une erreur
		if (empty($nom_mission)) { array_push($errors, "Le nom de la mission doit être entré"); }
		if (empty($date_debut)) { array_push($errors, "La date de début doit être entrée"); }
		if (empty($date_fin)) { array_push($errors, "La date de fin doit être entrée"); }
		if (empty($entreprise)) { array_push($errors, "L'entreprise doit être entrée"); }
		if (empty($ville)) { array_push($errors, "La ville doit être entrée"); }
		if (empty($desc_mission)) { array_push($errors, "La description de la mission doit être entrée"); }
		if (empty($heure_debut)) { array_push($errors, "L'heure de début doit être entrée"); }
		if (empty($heure_fin)) { array_push($errors, "L'heure de fin doit être entrée"); }
		if (empty($type)) { array_push($errors, "Le type doit être entré"); }
		if (empty($statut)) { array_push($errors, "Le statut doit être entré"); }

		// si il n'y a pas d'erreur, ajouter la mission dans la base de données

		if (count($errors) == 0)
		{
			$query = "INSERT INTO missions (nom_mission, date_debut, date_fin, entreprise, ville, desc_mission, heure_debut, heure_fin, type, montant, statut, date_creation, users_id) 
					  VALUES(:nom_mission, :date_debut, :date_fin, :entreprise, :ville, :desc_mission, :heure_debut, :heure_fin, :type, :montant, :statut, :date_creation, :id)";
			$stmt = $db->prepare($query);
			$stmt->execute([
				'nom_mission' => $nom_mission, 
				'date_debut' => $date_debut, 
				'date_fin' => $date_fin, 
				'entreprise' => $entreprise, 
				'ville' => $ville, 
				'desc_mission' => $desc_mission, 
				'heure_debut' => $heure_debut, 
				'heure_fin' => $heure_fin, 
				'type' => $type, 
				'montant' => $montant, 
				'statut' => $statut, 
				'date_creation' => $date_creation, 
				'id' => $users_id
			]);

			$_SESSION['success']  = "Mission ajoutée";
			header('location: index.php');
		}

		$pdo = new PDO('mysql:host=localhost;dbname=easyfollow', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM missions INNER JOIN users ON missions.users_id = users.id";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			$nom_mission = $row['nom_mission'];
			$date_debut = $row['date_debut'];
			$date_fin = $row['date_fin'];
			$entreprise = $row['entreprise'];
			$ville = $row['ville'];
			$desc_mission = $row['desc_mission'];
			$heure_debut = $row['heure_debut'];
			$heure_fin = $row['heure_fin'];
			$type = $row['type'];
			$montant = $row['montant'];
			$statut = $row['statut'];
			$date_creation = $row['date_creation'];
			$nom = $row['nom'];
			$prenom = $row['prenom'];
			$genre = $row['genre'];
			$email = $row['email'];
		}

	}

?>

