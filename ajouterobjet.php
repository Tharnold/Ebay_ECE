<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$identification = isset($_POST["identification"])? $_POST["identification"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";


 $erreur = "";

 if ($identification == "") { 
 $erreur .= "identification est vide. <br>"; }
 if ($nom == "") {
 $erreur .= "nom est vide. <br>"; }
 if ($prix == "") {
 $erreur .= "prix est vide. <br>"; }
 if ($description == "") {
 $erreur .= "description est vide. <br>"; }


 if ($erreur == "") {
 ///ajouter l'objet dans la BDD
 }
 else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin d'ajouter l'objet en vente.";
 }
?>