<?php
		if( !empty($_POST["titre4"]) && !empty($_POST["auteur4"]) && !empty($_POST["maison4"]) && !empty($_POST["lieu4"]) && !empty($_POST["annee4"]) && !empty($_POST["isbn4"]) && !empty($_POST["depot4"])){
$auteur=explode(",",$_POST['auteur4']);
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre4'],"type"=>"Ouvrages de recherche avec ISBN","auteurs"=>$auteur,"Maison_Edition"=>$_POST['maison4'],"Lieu_Edition"=>$_POST['lieu4'],"Annee"=>$_POST['annee4'],"ISBN/ISSN"=>$_POST['isbn4'],"Depot_legal"=>$_POST['depot4']]);
//var_dump($docs);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type4.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type4.php");
</script>';
}
?>