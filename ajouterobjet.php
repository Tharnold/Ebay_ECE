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
 <h1>Ajouter un objet a vendre</h1>
 </br>
 </br>
 </br>
 </br>
<form action="ajouterobjet.php" method="post">
<table class="tabcenter">
<tr>
<td>Numéro d'identification:</td>
<td><input type="text" name="identification"></td></br>

<td>Vidéo:</td>
<td><input type="text" name="video"></td>
</tr>
<tr>
<td>Nom:</td>
<td><input type="text" name="nom"></td>

<td>Catégorie:</td>
<td><input type="radio" name="doc1" value="1" >Ventes aux enchères</td>
<td><input type="radio" name="doc2"  value="2">Vente Direct</td>
<td><input type="radio" name="doc3"  value="3" >Vente par negociation</td>

</tr>
<tr>
<td>Photo:</td>
<td><input type="text" name="photo"></td>

<td>Prix:</td>
<td><input type="text" name="prix"></td>
</tr>
<tr>
<td>Description:</td>
<td><input type="text" name="description"></td>
</tr>
</table>
</br>
</br>
</br>
</br>
</br>
<table class="tabcenter">
<tr>
<td colspan="2" align="center">
<input type="submit" name="button38" ; value="Ajouter l'objet a vendre"></td>
</tr>
</table>
<?php

//identifier le nom de base de données
$database = "item";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


$identification = isset($_POST["identification"])? $_POST["identification"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$video = isset($_POST["video"])? $_POST["video"] : "";
$doc1 = isset($_POST["doc1"])? $_POST["doc1"] : "";
$doc2 = isset($_POST["doc2"])? $_POST["doc2"] : "";
$doc3 = isset($_POST["doc3"])? $_POST["doc3"] : "";



	  $erreur = "";


 if (isset($_POST['button38'])) {	  
  if ($identification == "") { 
 $erreur .= "identification est vide. <br>"; }
 if ($nom == "") {
 $erreur .= "nom est vide. <br>"; }
 if ($prix == "") {
 $erreur .= "prix est vide. <br>"; }
 if ($description == "") {
 $erreur .= "description est vide. <br>"; }
  if ($doc1 != "1" && $doc2 != "2" && $doc3 != "3" ) {
 $erreur .= "categorie est vide. <br>"; }

if ($db_found) {
 if ($erreur == "") {

$sql = "SELECT * FROM obj";
if ($nom != "") {
$sql .= " WHERE nom LIKE '%$nom%'";
if ($identification != "") {
$sql .= " AND ID LIKE '%$identification%'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
echo " already exists. Duplicate not allowed.";
} else {
	  if ($doc1 == "1")
	  {
		  $sql = "INSERT INTO obj(ID,nom,comment, prix, categorie)
 VALUES('$identification', '$nom', '$description', '$prix','$doc1')";
$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";
	  }
	    if ($doc2 == "2")
	  {
		  $sql = "INSERT INTO obj(ID,nom,comment, prix, categorie)
 VALUES('$identification', '$nom', '$description', '$prix','$doc2')";
$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";
	  }
	    if ($doc3 == "3")
	  {
		  $sql = "INSERT INTO obj(ID,nom,comment, prix, categorie)
 VALUES('$identification', '$nom', '$description', '$prix','$doc3')";
$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";
	  }

}
} else {
 echo "Erreur :<br>". $erreur. '<br>';
 echo "Vous devez remplir tous les champs afin d'ajouter l'objet en vente.";
}
 }
 else {
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