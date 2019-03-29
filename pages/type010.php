<?php
if( !empty($_POST["titre10"]) && !empty($_POST["responsable"]) && !empty($_POST["domiciliationDuProjet"]) && !empty($_POST["organismeQuiFinance"]) && !empty($_POST["duree"]) && !empty($_POST["dotation"]) ){
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre10'],"type"=>"Projets financés","Responsable"=>$_POST['responsable'],"Domiciliation_du_projet"=>$_POST['domiciliationDuProjet'],"Organisme_qui_finance"=>$_POST['organismeQuiFinance'],"Duree"=>$_POST['duree'],"Dotation"=>$_POST['dotation']]);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type10.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type10.php");
</script>';
}
?>