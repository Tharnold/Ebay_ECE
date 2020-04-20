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
			
		<li><a href="reinitialisation.php">Se déconnecter</a></li>  </br>

	<li><a href="#";><img src="panier1.png" id="imgpanier"/></a></li>
	</ul>
 </div>

 <div id="section">
 <h1>Mon compte vendeur</h1>
 </br>
 </br>
 </br>
</br>
</br>
 </br>
<form action="vendeurcompte.php" method="post">
<table class="tabcenter">
<tr>
<td>Adresse email:</td>
<td><input type="text" name="email2"></td></br>
</tr>

<tr>
<td>Pseudo :</td>
<td><input type="text" name="pseudo"></td>
</tr>

<tr>

<td colspan="2" align="center">
</br>
</br>
<input type="submit" name="button0"  onclick=window.location.href="vendeurcompte.html"; value="Se connecter"></td>
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
$email = isset($_POST["email2"])? $_POST["email2"] : "";

 $erreur = "";
if (isset($_POST['button0'])) {
 if ($email == "") {
 $erreur .= "email est vide. <br>"; }
  if ($pseudo == "") {
 $erreur .= "pseudo est vide. <br>"; }

 if ($erreur == "") {
	 $sql = "SELECT * FROM vendeur";
if ($pseudo != "") {
$sql .= " WHERE pseudo LIKE '%$pseudo%'";
if ($email != "") {
$sql .= " AND email LIKE '%$email%'";
}
}
 $result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
  ///vérifier qu'il est bien ds la bdd
  while($donnee = mysqli_fetch_assoc($result)) {

   $result = mysqli_query($db_handle, $sql);
  header('Location: http://localhost/projet/vendeurcompte1.php');
  exit();
}}else {echo " créer vous un compte avant de vous connecter";
 }
 }else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin de vous connecter.";
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
