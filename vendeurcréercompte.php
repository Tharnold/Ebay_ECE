<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$nom = isset($_POST["nom2"])? $_POST["nom2"] : "";
$prenom = isset($_POST["prenom2"])? $_POST["prenom2"] : "";
$email = isset($_POST["email2"])? $_POST["email2"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";


 $erreur = "";

 if ($pseudo == "") { 
 $erreur .= "pseudo est vide. <br>"; }
 if ($nom == "") {
 $erreur .= "nom est vide. <br>"; }
 if ($email == "") {
 $erreur .= "email est vide. <br>"; }


 if ($erreur == "") {
 
  ///récuperer les info et les mettre dans la bdd
   if (isset($_POST['button0'])) {
if ($db_found) {
$sql = "SELECT * FROM vendeurs";
if ($pseudo != "") {
$sql .= " WHERE Pseudo LIKE '%$pseudo%'";
if ($email != "") {
$sql .= " AND Email LIKE '%$email%'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
echo "account already exists. Duplicate not allowed.";
} else {
    $sql = "INSERT INTO `vendeurs`(`Pseudo`, `Nom`, `Prenom`, `Email`, `Photo`) 
    VALUES ('$pseudo','$nom','$prenom','$email','')";
$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";


}
} else {
echo "Database not found";
}
}
 }
 ///header('Location: http://localhost/projet%20page%20web/vendeurcompte.html');
 // exit();
 
 else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de vous créer un compte.";
 }
     
?>