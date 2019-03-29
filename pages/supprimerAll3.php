<?php
	require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$collectionProjet=$dbProjet->collectionProjet;
	
	unset($_POST["envoi"]);
foreach($_POST as $cle=>$val){
	if(empty($_POST[$cle])){
	unset($_POST[$cle]);
			}
}
$docs=$collectionProjet->deleteMany($_POST);
echo'<script>
alert("La suppression est bien effectuée!");
window.location.replace("index.php")</script>';
?>