<?php
		if( !empty($_POST["titre5"]) && !empty($_POST["titre55"]) && !empty($_POST["auteur5"]) && !empty($_POST["maison5"]) && !empty($_POST["annee5"])){
		$auteur=explode(",",$_POST['auteur5']);
		
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre5'],"type"=>"Chapitres d’ouvrage indexés dans des bases de données internationales","Titre_de_louvrage"=>$_POST['titre55'],"auteurs"=>$auteur,"Maison_Edition"=>$_POST['maison5'],"Annee"=>$_POST['annee5'],"LienURL"=>$_POST['lien5']]);
//var_dump($docs);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type5.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type5.php");
</script>';
}
?>