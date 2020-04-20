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
<form method="post">
<table class="tabcenter">
<tr>
<td>Numéro d'identification:</td>
<td><input type="text" name="identification"></td></br>
</tr>
<tr>
<td>Nom:</td>
<td><input type="text" name="nom"></td>
<tr>
<td>Catégorie de vente:</td>
<td><input type="radio" name="doc1" value="1" >Ventes aux enchères</td>
<td><input type="radio" name="doc1"  value="2">Vente Direct</td>
<td><input type="radio" name="doc1"  value="3" >Vente par negociation</td>

</tr>
<tr>
<td>Catégorie d'objet:</td>
<td><input type="radio" name="doc2" value="1" >Férailles ou trésors</td>
<td><input type="radio" name="doc2"  value="3">Bon pour le musée</td>
<td><input type="radio" name="doc2"  value="2" >Accessoires VIP</td>

</tr>
<tr>
<td>Photo:</td>
<td><input type="file" name="photo"></td>

<td>Prix:</td>
<td><input type="text" name="prix"></td>
</tr>
<tr>
<td>Description:</td>
<td><input type="text" name="description"></td>
</tr>
<td>Vendeur:</td>
<td><input type="text" name="vendeur"></td>
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
$database = "utilisateurs";
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
$IDpossesseur = isset($_POST["vendeur"])? $_POST["vendeur"] : "";



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
  if ($doc1 == "" ) {
 $erreur .= "categorie est vide. <br>"; }
   if ($doc2 == "" ) {
 $erreur .= "style de l'objet est vide. <br>"; }

 
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
 echo " already exists";

} 
else {
$sql = "INSERT INTO obj(ID, nom,comment, prix, categorie, photo, IDpossesseur, methodeVente)
 VALUES('$identification', '$nom', '$description', '$prix','$doc1','$photo', '$IDpossesseur','$doc2')";
	  $result = mysqli_query($db_handle, $sql);
echo "add successful. <br>";
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