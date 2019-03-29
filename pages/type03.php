<?php
		if( !empty($_POST["titre3"]) && !empty($_POST["auteur3"]) && !empty($_POST["nom3"]) && !empty($_POST["volume3"])){
$auteur=explode(",",$_POST['auteur3']);
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre3'],"type"=>"Les publications parues dans des revues nationales à comité de lecture","auteurs"=>$auteur,"Nom_complet"=>$_POST['nom3'],"Volume_issue_pages_et_annee"=>$_POST['volume3'],"LienURL"=>$_POST['lien3']]);
//var_dump($docs);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type3.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type3.php");
</script>';
}
?>