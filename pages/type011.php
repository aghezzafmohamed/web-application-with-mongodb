<?php
if( !empty($_POST["titre11"]) && !empty($_POST["type11"]) && !empty($_POST["institutionsImpliquees"]) && !empty($_POST["coordonnateur"]) && !empty($_POST["duree"]) ){
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre11'],"type"=>"Conventions signées","Type_de_la convention"=>$_POST['type11'],"Institutions_impliquées"=>$_POST['institutionsImpliquees'],"Coordonnateur"=>$_POST['coordonnateur'],"Duree"=>$_POST['duree'],"Financement"=>$_POST['financement']]);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type11.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type11.php");
</script>';
}
?>