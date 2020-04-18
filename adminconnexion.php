<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost:3308', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$id = isset($_POST["ID"])? $_POST["ID"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email = isset($_POST["email3"])? $_POST["email3"] : "";


 $erreur = "";

 if ($email == "") {
 $erreur .= "email est vide. <br>"; }
  if ($prenom == "") {
 $erreur .= "pseudo est vide. <br>"; }

 if ($erreur == "") {
	   ///récuperer les info et les mettre dans la bdd
   if (isset($_POST['button0'])) {
if ($db_found) {
$sql = "SELECT * FROM admin";
if ($prenom != "") {
$sql .= " WHERE Pseudo LIKE '%$prenom%'";
if ($email != "") {
$sql .= " AND Email LIKE '%$email%'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
echo "Book already exists. Duplicate not allowed.";
} else {
$sql = "INSERT INTO admin(Nom, ID , Prenom, Email ) VALUES('$nom', '$id', '$email', '$prenom')";
$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";
$sql = "SELECT * FROM admin";
if ($prenom != "") {
$sql .= " WHERE Pseudo LIKE '%$prenom%'";
if ($email != "") {
$sql .= " AND Email LIKE '%$email%'";
}
}
$result = mysqli_query($db_handle, $sql);

echo "ID: " . $nom . "<br>";
echo "Titre: " . $prenom . "<br>";
echo "Auteur: " . $email . "<br>";
echo "Auteur: " . $id . "<br>";

}
}
} else {
echo "Database not found";
}
   ///header('Location: http://localhost/projet%20page%20web/admincompte.html');
 /// exit();
 }
 else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de vous connecter.";
 }
?>
