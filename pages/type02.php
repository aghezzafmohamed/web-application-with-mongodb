<?php
		if( !empty($_POST["titre2"]) && !empty($_POST["auteur2"]) && !empty($_POST["nom2"]) && !empty($_POST["volume2"])){
$auteur=explode(",",$_POST['auteur2']);
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre2'],"type"=>"Les publications parues dans des revues internationales à comité de lecture","auteurs"=>$auteur,"Nom_complet"=>$_POST['nom2'],"Volume_issue_pages_et_annee"=>$_POST['volume2'],"LienURL"=>$_POST['lien2']]);
//var_dump($docs);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type2.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type2.php");
</script>';
}
?>