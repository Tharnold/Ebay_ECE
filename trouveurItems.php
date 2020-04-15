< ?php

	$ID = isset($_POST[ "ID"])? $_POST[ "ID"] : "";
	$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";

	$database = "items";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["button1"]) 
	{
		if ($db_found) 
		{
			$sql = "SELECT * FROM objet";
			if ($ID != "") 
			{
				$sql .= " WHERE ID LIKE '%$ID%'";
				if ($Nom != "") 
				{
					$sql .= " AND Nom LIKE '%$Nom%'";
				}
	}

	$result = mysqli_query($db_handle, $sql);

	if (mysqli_num_rows($result) == 0) 
	{
		echo "Not found";
	} else {
		while ($data = mysqli_fetch_assoc($result)) 
		{
			echo "ID: " . $data['ID'] . "<br>";
			echo "Nom: " . $data['Nom'] . "<br>";
			echo "<br>";
		}
	}
} else {
	echo "Database not found";
}
}

	mysqli_close($db_handle);

? >