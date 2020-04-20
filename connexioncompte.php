
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
 <h1>Mon compte</h1>
 </br>
  </br>
 </br>
 </br>
 </br>
</br>
</br>

<form action="connexioncompte.php" method="post">
<table class="tabcenter">

<tr>
<td>Email:</td>
<td><input type="text" name="email"></td>
</tr>
<tr>
<td >Mot de passe :</td>
<td><input type="text" name="mdp"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input  type="submit" name="button1" onclick=window.location.href="postconnexion.html"; value="Se connecter"></td>
</tr>
</table>
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
if (isset($_POST['button1'])) {
	
 if ($email == "") {
 $erreur .= "email est vide. <br>"; }
  if ($mdp == "") {
 $erreur .= "mot de passe est vide. <br>"; }
if ($db_found) {
 if ($erreur == "") {
  
     

$sql = "SELECT * FROM acheteuracompte";
if ($mdp != "") {
$sql .= " WHERE password LIKE '%$mdp%'";
if ($email != "") {
$sql .= " AND email LIKE '%$email%'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
echo "You are now logged in";
 header('Location: http://localhost/projet/postconnexion.html');
  exit();
}else {  echo "Vous devez dabord créer un compte";}
}else {
 echo "Erreur :". $erreur. '<br>';
echo "Vous devez remplir tous les champs afin de vous connecter.";}
 }else {echo "Database not found"; }
}
 

?>
 </form>

 </div>
 <div id="footer">
 Copyright &copy; 2020 SEGRETINAT-ARNOLD-BONNET | ECE Paris
 
 </div>
</body>
</html>
