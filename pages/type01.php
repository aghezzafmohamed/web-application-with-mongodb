<?php
		if( !empty($_POST["titre"]) && !empty($_POST["auteur"]) && !empty($_POST["nom"]) && !empty($_POST["volume"]) && !empty($_POST["if"])){
$auteur=explode(",",$_POST['auteur']);
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre'],"type"=>"Les publications parues dans des revues internationales indexées","auteurs"=>$auteur,"Nom_complet"=>$_POST['nom'],"Volume_issue_pages_et_annee"=>$_POST['volume'],"If"=>$_POST['if'],"LienURL"=>$_POST['lien']]);
//var_dump($docs);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type1.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type1.php");
</script>';
}
?>