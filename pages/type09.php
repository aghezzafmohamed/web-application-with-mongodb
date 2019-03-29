<?php
if( !empty($_POST["titre9"]) && !empty($_POST["auteur"]) && !empty($_POST["directeurDeThese"]) && !empty($_POST["membresDuJury"]) && !empty($_POST["dateDeSoutenance"]) ){
$auteurs=explode(",",$_POST['auteur']);
require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
$docs=$collectionProjet->insertOne(["Titre_complet"=>$_POST['titre9'],"type"=>"Thèses de doctorat soutenues et encadrées par un membre de la structure","auteurs"=>$auteurs,"Directeur_de_These"=>$_POST['directeurDeThese'],"Membres_du_jury"=>$_POST['membresDuJury'],"Date_de_soutenance"=>$_POST['dateDeSoutenance']]);
echo '<script language="JavaScript">
	alert("Vous avez bien remplie");
	window.location.replace("type9.php");
</script>';
}
else{
echo '<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("type9.php");
</script>';
}
?>