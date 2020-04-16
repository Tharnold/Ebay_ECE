<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$paiement = isset($_POST["paiement"])? $_POST["paiement"] : "";
$doc = isset($_POST["doc"])? $_POST["doc"] : "";

 $erreur = "";

 if ($prenom == "") { 
 $erreur .= "prenom est vide. <br>"; }
 if ($nom == "") {
 $erreur .= "nom est vide. <br>"; }
 if ($adresse == "") {
 $erreur .= "adresse est vide. <br>"; }
 if ($email == "") {
 $erreur .= "email est vide. <br>"; }
  if ($mdp == "") {
 $erreur .= "mdp est vide. <br>"; }
 if ($paiement == "") {
 $erreur .= "paiement est vide. <br>"; }
if ($doc == "") { 
    $erreur .= "le doc n'est pas coché. <br>"; }

 if ($erreur == "") {
 header('Location: http://localhost/projet%20page%20web/postconnexion.html');
  exit();
 }
 else {
 echo "Erreur :". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de vous créer un compte.";
 }
?>