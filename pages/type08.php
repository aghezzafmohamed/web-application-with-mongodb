<?php
if( !empty($_POST["titre8"]) && !empty($_POST["auteurs"]) && !empty($_POST["references"]) && !empty($_POST["anneeEtPaysDeDepot"]) ){
	$auteur=explode(",",$_POST["auteurs"]);
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre8'],"type"=>"Brevets d’invention déposés","auteurs"=>$auteur,"References"=>$_POST['references'],"Annee_et_pays_de_depot"=>$_POST['anneeEtPaysDeDepot']]);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type8.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type8.php");
</script>';
}
?>