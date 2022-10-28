<?php 
/************** SI TOUT VA BIEN **************/ 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// si le nom d'utilisateur de la session en cours n'est pas défini pour une raison quelconque, une fois la session démarrée
if (!isset($_SESSION['email'])) 
{
    $_SESSION['msg'] = "Vous devez vous connecter pour accéder à cette page";
    header('Location: login.php'); // Raw HTTP header; redirige vers la page de connexion
}

// fermer la session si l'utilisateur clique sur le bouton "logout"
if (isset($_GET['logout'])) 
{
    session_destroy();
    unset($_SESSION['email']); // relance la session pour l'utilisateur courant et détruit toutes les données associées à cette session
    header("Location: login.php"); // Raw HTTP header; redirige vers la page de connexion
}
?>