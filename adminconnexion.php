<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$email = isset($_POST["email3"])? $_POST["email3"] : "";


 $erreur = "";

 if ($email == "") {
 $erreur .= "email est vide. <br>"; }
  if ($pseudo == "") {
 $erreur .= "pseudo est vide. <br>"; }

 if ($erreur == "") {
   header('Location: http://localhost/projet%20page%20web/admincompte.html');
  exit();
 }
 else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de vous connecter.";
 }
?>
