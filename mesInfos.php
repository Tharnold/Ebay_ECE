<?php

	$database = "utilisateurs";

	$db_handle = mysqli_connect('localhost','root', '');
	$db_found = mysqli_select_db($db_handle,$database);

	if($db_found)
	{
		$sql = "SELECT * FROM acheteuracompte";
		$response = mysqli_query($db_handle,$sql);

		while($data = mysqli_fetch_assoc($response))
		{
			echo "Nom : " . $data['nom'] . '<br>';
			echo "Prénom : " . $data['prenom'] . '<br>';
			echo "email : " . $data['email'] . '<br>';
		}
	}
	else
	{
		echo "Database not found !";
	}

	mysqli_close($db_handle);

?>