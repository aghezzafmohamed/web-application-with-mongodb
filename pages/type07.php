<?php
if( !empty($_POST["titre7"]) && !empty($_POST["auteurs"]) && !empty($_POST["nomCompletDeLaRencontreScientifique"]) && !empty($_POST["typeDeLaCommunication"])&& !empty($_POST["lieuDorganisationEtDate"]) ){
$auteur=explode(",",$_POST["auteurs"]);
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre7'],"type"=>"Communications orales et posters dans des congrès scientifiques","auteurs"=>$auteur,"Nom_complet"=>$_POST['nomCompletDeLaRencontreScientifique'],"Type_de_la_communication"=>$_POST['typeDeLaCommunication'],"Lieu_dorganisation_et_date"=>$_POST['lieuDorganisationEtDate'],"LienURL"=>$_POST['LienURL']]);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type7.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type7.php");
</script>';
}
?>