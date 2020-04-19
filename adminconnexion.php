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

			
			<li><a href='vendeurcreercompte.php'>Vendre</a></li>  </br>
   
			<li><a href='Adminconnexion.php'>Admin</a></li>  </br>
			
		<li><a href="connexioncompte.php">Me connecter</a></li>  </br>
			
		<li><a href="creercompte.php">Créer un compte</a></li>  </br>

	<li><a href="#";><img src="panier1.png" id="imgpanier"/></a></li>
	</ul>
 </div>

 <div id="section">
 <h1>Mon compte admin</h1>
 </br>
 </br>
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
<td>prenom :</td>
<td><input type="text" name="prenom"></td>
</tr>

<tr>

<td colspan="2" align="center">
</br>
</br>
<input type="submit" name="button0"  onclick=window.location.href="admincompte.html"; value="Se connecter en tant qu'admin"></td>
</tr>
</table>
<?php

//identifier le nom de base de données
$database = "utilisateurs";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";


 $erreur = "";
if (isset($_POST['button0'])) {
 if ($email == "") {
 $erreur .= "email est vide. <br>"; }
  if ($prenom == "") {
 $erreur .= "prenom est vide. <br>"; }

if ($db_found) {
 if ($erreur == "") {
	   ///récuperer les info et les mettre dans la bdd
   

$sql = "SELECT * FROM admin";
if ($prenom != "") {
$sql .= " WHERE prenom LIKE '%$prenom%'";
if ($email != "") {
$sql .= " AND email LIKE '%$email%'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
///vérifier qu'il est bien ds la bdd
  header('Location: http://localhost/projet/admincompte.html');
  exit();
 }else{echo " créer vous un compte avant de vous connecter";}
	 
 }else {echo "Erreur :<br>". $erreur. '<br>';

}}else {
echo "Database not found";
}
}
 

?>
 </form>

 </div>
 <div id="footer">
 Copyright &copy; 2020 SEGRETINAT-ARNOLD-BONNET | ECE Paris

 </div>
</body>
</html>