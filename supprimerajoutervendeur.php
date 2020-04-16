<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$email = isset($_POST["email2"])? $_POST["email2"] : "";


 $erreur = "";

 if ($pseudo == "") { 
 $erreur .= "pseudo est vide. <br>"; }
 if ($nom == "") {
 $erreur .= "nom est vide. <br>"; }
 if ($email == "") {
 $erreur .= "email est vide. <br>"; }


 if ($erreur == "") {
 ///ajouter l'objet dans la BDD
 }
 else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de supprimer ou ajouter un vendeur.";
 }
?>