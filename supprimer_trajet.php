<?php
session_start();
echo "</html>";

$num=$_GET['num_trajet'];
$id_session=$_SESSION['id'];

if ($_SESSION['loginOK'] == true) {

	include('connexion_SQL.php');
	
	$reponse = mysql_query("SELECT * FROM trajets WHERE num_trajet='$num'") or die(mysql_error());

	//on verifie l'identit�e du cr�ateur de la fiche :
	while ($donnees = mysql_fetch_array($reponse) ) {
		$id_trajet=$donnees['ID'];
	}

	if ($id_trajet == $id_session) {
		mysql_query("DELETE FROM trajets WHERE num_trajet='$num'");
	}
	
	// si le numero de trajet ne correspond pas � un trajet de l'utilisateur connect�:
	else {
		echo "Une erreur est survenue";
		echo "</BR></bR>";
		echo "<a href=\"index2.php\">Retour � l'accueil</a>";
	}

}

else {
	echo "merci de vous indentifier pour acc�der � cette page";
	}

mysql_close();
include('trajets_conducteur.php');

?>
</html>




	