<?php


	$database = "utilisateurs";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$email = isset($_POST["email"])? $_POST["email"] : "";
	$NP = isset($_POST["NP"])? $_POST["NP"] : "";
	$adressel1 = isset($_POST["adressel1"])? $_POST["adressel1"] : "";
	$adressel2 = isset($_POST["adressel2"])? $_POST["adressel2"] : "";
	$ville = isset($_POST["ville"])? $_POST["ville"] : "";
	$codeP = isset($_POST["codeP"])? $_POST["codeP"] : "";
	$pays = isset($_POST["pays"])? $_POST["pays"] : "";
	$numTel = isset($_POST["numTel"])? $_POST["numTel"] : "";
	$tyeCarte = isset($_POST["tpyeCarte"])? $_POST["typeCarte"] : "";
	$numeroCarte = isset($_POST["numeroCarte"])? $_POST["numeroCarte"] : "";
	$nomCarte = isset($_POST["nomCarte"])? $_POST["nomCarte"] : "";
	$dateExpi = isset($_POST["dateExpi"])? $_POST["dateExpi"] : "";
	$codeSecu = isset($_POST["codeSecu"])? $_POST["codeSecu"] : "";
	$password = isset($_POST["password"])? $_POST["password"] : "";
	




	if (isset($_POST['button0'])) {
		if ($db_found) {
			$sql = "SELECT * FROM acheteuracompte";
			if ($nom != "") {
				$sql .= " WHERE nom LIKE '%$nom%'";
				if ($prenom != "") {
					$sql .= " AND prenom LIKE '%$prenom%'";
					if ($email != "") {
						$sql .= " AND email LIKE '%$email%'";
						if ($NP != "") {
							$sql .= " AND NP LIKE '%$NP%'";
							if ($adressel1 != "") {
								$sql .= " AND adressel1 LIKE '%$adressel1%'";
								if ($adressel2 != "") {
									$sql .= " AND adressel2 LIKE '%$adressel2%'";
									if ($ville != "") {
										$sql .= " AND ville LIKE '%$ville%'";
										if ($codeP != "") {
											$sql .= " AND codeP LIKE '%$codeP%'";
											if ($pays != "") {
												$sql .= " AND pays LIKE '%$pays%'";
												if ($numTel != "") {
													$sql .= " AND numTel LIKE '%$numTel%'";
													if ($typeCarte != "") {
														$sql .= " AND typeCarte LIKE '%$typeCarte%'";
														if ($numeroCarte != "") {
															$sql .= " AND numeroCarte LIKE '%$numeroCarte%'";
															if ($nomCarte != "") {
																$sql .= " AND nomCarte LIKE '%$nomCarte%'";
																if ($dateExpi != "") {
																	$sql .= " AND dateExpi LIKE '%$dateExpi%'";
																	if ($codeSecu != "") {
																		$sql .= " AND codeSecu LIKE '%$codeSecu%'";
																		if ($password != "") {
																			$sql .= " AND password LIKE '%$password%'";
																		}
																	}
																}		
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}	
			}

		$result = mysqli_query($db_handle, $sql);
		
		if (mysqli_num_rows($result) != 0) {
				echo "Compte already exists. Duplicate not allowed.";
		} else {
			$sql = "INSERT INTO acheteuracompte(nom,prenom,email,NP,adressel1,adressel2,ville,codeP,pays,numTel,typeCarte,numeroCarte,nomCarte,dateExpi,codeSecu,password) VALUES('$nom', '$prenom', '$email','$NP', '$adressel1', '$adressel2', '$ville', '$codeP', '$pays', '$numTel', '$typeCarte', '$numeroCarte', '$nomCarte', '$dateExpi', '$codeSecu', '$password')";

			$result = mysqli_query($db_handle, $sql);
			echo "Add successful. <br>";
			
			$sql = "SELECT * FROM acheteuracompte";
			if ($nom != "") {
				$sql .= " WHERE nom LIKE '%$nom%'";
				if ($prenom != "") {
					$sql .= " AND prenom LIKE '%$prenom%'";
					if ($email != "") {
						$sql .= " AND email LIKE '%$email%'";
						if ($NP != "") {
							$sql .= " AND NP LIKE '%$NP%'";
							if ($adressel1 != "") {
								$sql .= " AND adressel1 LIKE '%$adressel1%'";
								if ($adressel2 != "") {
									$sql .= " AND adressel2 LIKE '%$adressel2%'";
									if ($ville != "") {
										$sql .= " AND ville LIKE '%$ville%'";
										if ($codeP != "") {
											$sql .= " AND codeP LIKE '%$codeP%'";
											if ($pays != "") {
												$sql .= " AND pays LIKE '%$pays%'";
												if ($numTel != "") {
													$sql .= " AND numTel LIKE '%$numTel%'";
													if ($typeCarte != "") {
														$sql .= " AND typeCarte LIKE '%$typeCarte%'";
														if ($numeroCarte != "") {
															$sql .= " AND numeroCarte LIKE '%$numeroCarte%'";
															if ($nomCarte != "") {
																$sql .= " AND nomCarte LIKE '%$nomCarte%'";
																if ($dateExpi != "") {
																	$sql .= " AND dateExpi LIKE '%$dateExpi%'";
																	if ($codeSecu != "") {
																		$sql .= " AND codeSecu LIKE '%$codeSecu%'";
																		if ($password != "") {
																			$sql .= " AND password LIKE '%$password%'";
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}	
			}
		}
	}else {
		echo "Database not found";
		}
	}

	mysqli_close($db_handle);
 

?>