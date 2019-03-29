<?php
		if( !empty($_POST["titre6"]) && !empty($_POST["auteur6"]) && !empty($_POST["nom6"]) && !empty($_POST["lieu6"]) && !empty($_POST["date6"])){
$auteur=explode(",",$_POST['auteur6']);
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre6'],"type"=>"Publications dans des actes de congrès scientifiques","auteurs"=>$auteur,"Nom_complet"=>$_POST['nom6'],"Lieu_dorganisation"=>$_POST['lieu6'],"Date"=>$_POST['date6'],"LienURL"=>$_POST['lien6']]);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type6.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type6.php");
</script>';
}
?>