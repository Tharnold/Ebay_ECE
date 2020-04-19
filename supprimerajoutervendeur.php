<!DOCTYPE html>
<html>
    <head>
        <title>Ebay ECE</title>
	   <link rel="stylesheet" type="text/css" href="page1.css">
	   <meta charset="utf-8">
    </head>
       <body>


 <div id="nav">
  <img src="logo.png" id="imgLogo"/>
  </br>
  </br>
  </br>

				<ul>
<li><a href='categories.html'>Catégories</a></li>  </br>

			<li><a href="methodeachat.html">Achats</a></li>  </br>
			
			<li><a href='vendeurcreercompte.php'>Vendre</a></li>  </br>
   
			<li><a href='Adminconnexion.php'>Admin</a></li>  </br>
			
		<li><a href="connexioncompte.php">Me connecter</a></li>  </br>
			
			<li><a href="creercompte.php">Créer un compte</a></li>  </br>

	<li><a href="#";><img src="panier1.png" id="imgpanier"/></a></li>
	</ul>
 </div>

 <div id="section">
 <h1>Mon compte Admin</h1>
 </br>
 </br>
 </br>

 </br>
<form method="post">
<table class="tabcenter">
<tr>
<td>Adresse email:</td>
<td><input type="text" name="email"></td></br>
</tr>

<tr>
<td>Pseudo :</td>
<td><input type="text" name="pseudo"></td>
</tr>
<tr>
<td>Nom:</td>
<td><input type="text" name="nom"></td>
</tr>
<tr>
<td>prenom:</td>
<td><input type="text" name="prenom"></td>
</tr>
<tr>
<td>Numero de téléphone:</td>
<td><input type="text" name="numeroTel"></td>
</tr>
<tr>
<td>photo:</td>
<td><input type="text" name="photo"></td>
</tr>
</table>
</br>
</br>
<table class="tabcenter">
<tr>
<td colspan="2" align="center">

<input type="submit" name="button0"  ; value="Créer son compte"></td>
<td>
<p>          </p>
</td>
<td colspan="2" align="center">

<input type="submit" name="button1"  ; value="Supprimer son compte"></td>
</tr>
</table>
<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$numeroTel = isset($_POST["numeroTel"])? $_POST["numeroTel"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";



 $erreur = "";

if (isset($_POST['button0'])) {



 if ($email == "") {
 $erreur .= "email est vide. <br>"; }
  if ($pseudo == "") {
 $erreur .= "pseudo est vide. <br>"; }
   if ($nom == "") {
 $erreur .= "nom est vide. <br>"; }
   if ($prenom == "") {
 $erreur .= "prenom est vide. <br>"; }
    if ($numeroTel	== "") {
 $erreur .= "numero de téléphone est vide. <br>"; }

 if ($erreur == "") {
if ($db_found) {
$sql = "SELECT * FROM vendeur";
if ($nom != "") {
$sql .= " WHERE nom LIKE '%$nom%'";
if ($pseudo != "") {
$sql .= " AND pseudo LIKE '%$pseudo%'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
echo " already exists. Duplicate not allowed.";
} else {
$sql = "INSERT INTO vendeur(pseudo,nom,prenom, email, numeroTel, photo)
 VALUES('$pseudo', '$nom', '$prenom', '$email','$numeroTel' , '$photo')";
$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";
}
} else {
echo "Database not found";
}
 }	

 
 else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de vous connecter.";
 }
}

$erreur = "";
if (isset($_POST['button1'])) {	  
if ($email == "") {
 $erreur .= "email est vide. <br>"; }
  if ($pseudo == "") {
 $erreur .= "pseudo est vide. <br>"; }
   if ($nom == "") {
 $erreur .= "nom est vide. <br>"; }
   if ($prenom == "") {
 $erreur .= "prenom est vide. <br>"; }
    if ($numeroTel	== "") {
 $erreur .= "numero de téléphone est vide. <br>"; }

 
if ($db_found) {
 if ($erreur == "") {

$sql = "SELECT * FROM vendeur";
if ($nom != "") {
$sql .= " WHERE nom LIKE '%$nom%'";
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {

		  $sql = "delete FROM vendeur WHERE nom=$nom";
$result = mysqli_query($db_handle, $sql);
echo "delete successful. <br>";
} 
else {
	  echo " It doestn't exists. You can't delete it.";
	  }

}
 else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de supprimer l'objet en vente.";
}
}
 else {
	 echo "Database not found";
 }}
?>
 </form>

 </div>
 <div id="footer">
 Copyright &copy; 2020 SEGRETINAT-ARNOLD-BONNET | ECE Paris
 
 </div>
</body>
</html>