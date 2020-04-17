<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost:3307', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";

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

 if ($paiement == "") {
 $erreur .= "paiement est vide. <br>"; }
if ($doc == "") { 
    $erreur .= "le doc n'est pas coché. <br>"; }

 if ($erreur == "") {
	    if (isset($_POST['button0'])) {
if ($db_found) {
$sql = "SELECT * FROM acheteurs";
if ($nom != "") {
$sql .= " WHERE nom LIKE '%$nom%'";
if ($email != "") {
$sql .= " AND Email LIKE '%$email%'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
echo "compte already exists. Duplicate not allowed.";
} else {
$sql = "INSERT INTO acheteurs(Prenom, Nom, Email, Adresse )
 VALUES('$prenom', '$nom', '$email', '$adresse')";
$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";
$sql = "SELECT * FROM vendeurs";
if ($nom != "") {
$sql .= " WHERE Pseudo LIKE '%$nom%'";
if ($email != "") {
$sql .= " AND Email LIKE '%$email%'";
}
}
$result = mysqli_query($db_handle, $sql);

echo "ID: " . $prenom . "<br>";
echo "Titre: " . $email . "<br>";
echo "Titre: " . $nom . "<br>";
echo "Auteur: " . $email . "<br>";

}
} else {
echo "Database not found";
}
///header('Location: http://localhost/projet%20page%20web/postconnexion.html');
 // exit();
}
 
 }
 else {
 echo "Erreur :". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de vous créer un compte.";
 }
?>