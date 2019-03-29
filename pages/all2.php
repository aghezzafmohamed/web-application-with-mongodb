<!DOCTYPE html>
<?php
session_start();

$upload_dir='uploads/';
require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$authentification=$dbProjet->authentification;
$admin=$authentification->findOne(["codeActivate"=>$_SESSION['auto']]);
if(!isset($_SESSION['auto']) || $admin["type"]=="utilisateur"){
echo'<script>
window.location.replace("../login.php");
</script>';
}
?>
<html >
  <head>
    <meta charset="utf-8">
    <title>FS-Eljadida Plateforme</title>
    <link rel="shortcut icon" href="outils/images/fs.png">
    <link href="outils/css/bootstrap.css" rel="stylesheet">
    <link href="outils/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="outils/css/style.css" rel="stylesheet">
    <style>
    
    #footer {
    background: #424a5d !important;
    }
    #footer h5{
    padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
    }
    #footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
    }
    #footer ul.social li{
    padding: 3px 0;
    }
    #footer ul.social li a i {
    margin-right: 5px;
    font-size:25px;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
    }
    #footer ul.social li:hover a i {
    font-size:30px;
    margin-top:-10px;
    }
    #footer ul.social li a,
    #footer ul.quick-links li a{
    color:#ffffff;
    }
    #footer ul.social li a:hover{
    color:#eeeeee;
    }
    #footer ul.quick-links li{
    padding: 3px 0;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
    }
    #footer ul.quick-links li:hover{
    padding: 3px 0;
    margin-left:5px;
    font-weight:700;
    }
    #footer ul.quick-links li a i{
    margin-right: 5px;
    }
    #footer ul.quick-links li:hover a i {
    font-weight: 700;
    }
    @media (max-width:767px){
    #footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
    }
    }
    </style>
  </head>
  <body>
    <section id="container" >
      
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div style="color: #ffff;" class="fa fa-bars tooltips" data-placement="right" data-original-title="Basculer la navigation"></div>
        </div>
        <a href="index.php" class="logo"><b>FS ELJADIDA</b></a>
        <div class="nav notify-row" id="top_menu">
        </div>
        <div class="nav pull-right top-menu" style="margin-top: 17px; margin-right: 15px;">
          <div class="btn-group"  >
            <i style="color: #ffff; font-size:2.3rem;" type="button" class="fa fa-chevron-down fa-2x" data-toggle="dropdown">
            <span ></span>
            </i>
            <ul class="dropdown-menu pull-right">
              <div class="notify-arrow notify-arrow-green"  style="margin-left: 132px;"></div>
              <li><a href="profile.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp;Profile</a></li>
              <li><a href="parametre.php"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;Paramètre</a></li>
              <li><a href="table.php"><i class="fa fa-users"></i>&nbsp;Utilisateurs</a></li>
              <li class="divider"></li>
              <li><a href="deconnecter.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Déconnexion</a></li>
            </ul>
          </div>
        </div>
      </header>
      <aside>
        <div id="sidebar"  class="nav-collapse " >
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><img src="<?php echo $upload_dir.$admin['pathImage'] ?>" class="img-circle" width="100"></p>
            <h5 class="centered"><?php echo $admin['nom'] ?></h5>
            <li  class="mt">
              <a href="index.php" >
                <i class="fa fa-home fa-fw"  ></i>
                <span>Accueil</span>
              </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="active">
                <i class="fa fa-desktop"></i>
                <span>Afficher/Modifier</span>
              </a>
              <ul class="sub">
                <li class="active" ><a title="Tous les types" href="all.php">Tous les types</a></li>
                <li><a title="Les publications parues dans des revues internationales indexées"   href="affiche0.php">Publications parues dans des revues internationales indexées</a></li>
                <li><a title="Les publications parues dans des revues internationales à comité de lecture" href="affiche1.php">Publications parues dans des revues internationales à comité de lecture</a></li>
                <li><a title="Les publications parues dans des revues nationales à comité de lecture" href="affiche2.php">Publications parues dans des revues nationales à comité de lecture</a></li>
                <li><a title="Ouvrages de recherche avec ISBN" href="affiche3.php">Ouvrages de recherche avec ISBN</a></li>
                <li><a title="Chapitres d’ouvrage indexés dans des bases de données internationales" href="affiche4.php">Chapitres d’ouvrage indexés dans des bases de données internationales</a></li>
                <li><a title="Publications dans des actes de congrès scientifiques" href="affiche5.php">Publications dans des actes de congrès scientifiques</a></li>
                <li><a title="Communications orales et posters dans des congrès scientifiques" href="affiche6.php">Communications orales et posters dans des congrès scientifiques</a></li>
                <li><a title="Brevets d’invention déposés" href="affiche7.php">Brevets d’invention déposés</a></li>
                <li><a title="Thèses de doctorat soutenues et encadrées par un membre de la structure"  href="affiche8.php">Thèses de doctorat soutenues et encadrées par un membre de la structure</a></li>
                <li><a title="Projets financés" href="affiche9.php">Projets financés</a></li>
                <li><a title="Conventions signées" href="affiche10.php">Conventions signées</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" >
                <i class="fa fa-pencil fa-fw"></i>
                <span>Ajouter</span>
              </a>
              <ul class="sub">
                <li><a title="Les publications parues dans des revues internationales indexées" href="type1.php">Publications parues dans des revues internationales indexées</a></li>
                <li><a title="Les publications parues dans des revues internationales à comité de lecture" href="type2.php">Publications parues dans des revues internationales à comité de lecture</a></li>
                <li><a title="Les publications parues dans des revues nationales à comité de lecture" href="type3.php">Publications parues dans des revues nationales à comité de lecture</a></li>
                <li><a title="Ouvrages de recherche avec ISBN" href="type4.php">Ouvrages de recherche avec ISBN</a></li>
                <li><a title="Chapitres d’ouvrage indexés dans des bases de données internationales" href="type5.php">Chapitres d’ouvrage indexés dans des bases de données internationales</a></li>
                <li><a title="Publications dans des actes de congrès scientifiques" href="type6.php">Publications dans des actes de congrès scientifiques</a></li>
                <li><a title="Communications orales et posters dans des congrès scientifiques" href="type7.php">Communications orales et posters dans des congrès scientifiques</a></li>
                <li><a title="Brevets d’invention déposés" href="type8.php">Brevets d’invention déposés</a></li>
                <li><a title="Thèses de doctorat soutenues et encadrées par un membre de la structure" href="type9.php">Thèses de doctorat soutenues et encadrées par un membre de la structure</a></li>
                <li><a title="Projets financés" href="type10.php">Projets financés</a></li>
                <li><a title="Conventions signées" href="type11.php">Conventions signées</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" >
                <i class="fa fa-trash-o"  ></i>
                <span>Supprimer</span>
              </a>
              <ul class="sub">
                <li><a  title="Supprimer la collection/base de données" href="vide.php">Supprimer la collection/base de données</a></li>
                <li><a href="supprimerAll1.php" title="Supprimer élement">Supprimer élement</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" >
                <i class="fa fa-database"  ></i>
                <span>Import/Export</span>
              </a>
              <ul class="sub">
                <li ><a   href="import.php" title="Import">Import</a> </li>
                
                <li>  <a href="export.php" title="Export">Export</a> </li>
              </ul>
            </li>
          </ul>
        </div>
      </aside>
      <section id="main-content">
        <section class="wrapper">
          <h3><i class="fa fa-desktop"></i> Affichage</h3>
          <hr/>
          
          <style>
          p{
          text-align:right;
          
          }
          </style>
          
          
          <?php
          require "outils/vendor/autoload.php";
          $client=new MongoDB\Client;
          $dbProjet=$client->dbProjet;
          $collectionProjet=$dbProjet->collectionProjet;
          $limit=intval($_POST["lim"]);
          if(!empty($_POST['sort'])){
          $sort=$_POST['sort'];
          if($sort=="a-z")
          $sort=1;
          else if($sort=="z-a")
          $sort=-1;
          }
          if(!empty($_POST['choix']))
          $choix=$_POST['choix'];
          unset($_POST["sort"]);
          unset($_POST["choix"]);
          unset($_POST["envoi"]);
          unset($_POST["lim"]);
          foreach($_POST as $cle=>$val){
          if(empty($_POST[$cle])){
          unset($_POST[$cle]);
          }
          }
          
          $i=0;
          if(isset($limit)){
          if(isset($choix) && isset($sort)){
          if(!empty($_POST["auteurs"]) && empty($_POST["Titre_complet"]) && empty($_POST["type"])){
          $re=$collectionProjet->dropIndexes();
          $ee=$collectionProjet->createIndex(["auteurs"=>"text"]);
          $docs=$collectionProjet->find(['$text'=>['$search'=>$_POST['auteurs']]],['limit'=>$limit,'sort' => [$choix =>$sort]]);
          foreach($docs as $valk){
          $i=$i+1;
          }
          echo "<h5><p align='left' color='blue'><font color='orange'><b>&nbsp&nbsp &nbsp &nbsp ".$i."</b>&nbsp Element(s)</font></p></h5>" ;
          $docs=$collectionProjet->find(['$text'=>['$search'=>$_POST['auteurs']]],['limit'=>$limit,'sort' => [$choix =>$sort]]);
          foreach($docs as $valk){
          
          
          if($valk['type']=="Les publications parues dans des revues internationales indexées"){
          
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
              <br> ";
              echo '<table width="100%">';
                if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify1.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                echo'<br>';
                if(empty($valk['Titre_complet']))
                echo "-----<br>";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                if(empty($valk['auteurs']))
                echo "-----<br>";
                else{
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                foreach($valk['auteurs'] as $aut){
                echo $aut.",";
                }
              echo "</b></td></tr>";}
              if(empty($valk['Nom_complet']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
              if(empty($valk['Volume_issue_pages_et_annee']))
              echo "-----<br>";
              else
              echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
              if(empty($valk['If']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp IF (SNIP) </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['If']."</b></td></tr>";
              if(empty($valk['LienURL']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank'  title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          if($valk['type']=="Les publications parues dans des revues internationales à comité de lecture"){
          
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
              <br> ";
              echo '<table width="100%">';
                if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify2.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                echo"<br>";
                if(empty($valk['Titre_complet']))
                echo "-----<br>";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                if(empty($valk['auteurs']))
                echo "-----<br>";
                else{
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                foreach($valk['auteurs'] as $aut){
                echo $aut.",";
                }
              echo "</b></td></tr>";}
              if(empty($valk['Nom_complet']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
              if(empty($valk['Volume_issue_pages_et_annee']))
              echo "-----<br>";
              else
              echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
              if(empty($valk['LienURL']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          //------------------------------------------------------------------------------
          if($valk['type']=="Les publications parues dans des revues nationales à comité de lecture"){
          
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
              <br> ";
              echo '<table width="100%">';
                if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify3.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                echo"    <br>";
                if(empty($valk['Titre_complet']))
                echo "-----<br>";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                if(empty($valk['auteurs']))
                echo "-----<br>";
                else{
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                foreach($valk['auteurs'] as $aut){
                echo $aut.",";
                }
              echo "</b></td></tr>";}
              if(empty($valk['Nom_complet']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
              if(empty($valk['Volume_issue_pages_et_annee']))
              echo "-----<br>";
              else
              echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
              if(empty($valk['LienURL']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          
          //---------------------------------------------------------------------------
          if($valk['type']=="Ouvrages de recherche avec ISBN"){
          
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
              <br> ";
              echo '<table width="100%">';
                if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify4.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                if(empty($valk['Titre_complet']))
                echo "-----</br>";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbspTitre de l’ouvrage  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                if(empty($valk['auteurs']))
                echo "-----</br>";
                else{
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                foreach($valk['auteurs'] as $aut){
                echo $aut.",";
                }
              echo "</b></td></tr>";
              }
              if(empty($valk['Maison_Edition']))
              echo "-----</br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Maison d’édition </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Maison_Edition']."</b></td></tr>";
              if(empty($valk['Lieu_Edition']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’édition  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Lieu_Edition']."</b></td></tr>";
              if(empty($valk['Annee']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année de publication  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Annee']."</b></td></tr>";
              if(empty($valk['ISBN/ISSN']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp ISBN/ISSN </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['ISBN/ISSN']."</b></td></tr>";
              if(empty($valk['Depot_legal']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Dépôt légal </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Depot_legal']."</b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          //---------------------------------------------------------------------
          if($valk['type']=="Chapitres d’ouvrage indexés dans des bases de données internationales"){
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
              <br> ";
              echo '<table width="100%">';
                if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify5.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                if(empty($valk['Titre_complet']))
                echo "-----<br>";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet du chapitre </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                if(empty($valk['Titre_de_louvrage']))
                echo "-----<br>";
                else
                echo " <tr><td><font size='3.5px'><b>&nbsp&nbsp Titre de l’ouvrage </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_de_louvrage']."</b></td></tr>";
                if(empty($valk['auteurs']))
                echo "-----<br>";
                else{
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                foreach($valk['auteurs'] as $aut){
                echo $aut.",";
                }
              echo "</b></td></tr>";}
              if(empty($valk['Maison_Edition']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Maison d’édition </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Maison_Edition']."</b></td></tr>";
              if(empty($valk['Annee']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Annee']."</b></td></tr>";
              if(empty($valk['LienURL']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b><a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          //--------------------------------------------------------------------
          if($valk['type']=="Communications orales et posters dans des congrès scientifiques"){
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
              <br> ";
              echo '<table width="100%">';
                if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify7.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                if(empty($valk['Titre_complet']))
                echo " ";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                if(empty($valk['auteurs']))
                echo " ";
                else{
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                foreach($valk['auteurs'] as $aut){
                echo $aut.",";
                }
              echo "</b></td></tr>";
              }
              
              if(empty($valk['Nom_complet']))
              echo " ";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet de la rencontre scientifique </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Nom_complet']."</b></td></tr>";
              
              if(empty($valk['Type_de_la_communication']))
              echo " ";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Type de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Type_de_la_communication']."</b></td></tr>";
              
              if(empty($valk['Lieu_dorganisation_et_date']))
              echo " ";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’organisation et date </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Lieu_dorganisation_et_date']."</b></td></tr>";
              
              if(empty($valk['LienURL']))
              echo "";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b><a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          //-------------------------------------------------------------------------
          if($valk['type']=="Publications dans des actes de congrès scientifiques"){
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
              echo '<table height="130" width="100%">';
                            if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify6.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                if(empty($valk['Titre_complet']))
                echo "-----<br>";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                if(empty($valk['auteurs']))
                echo "-----<br>";
                else{
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                foreach($valk['auteurs'] as $aut){
                echo $aut.",";
                }
              echo "</b></td></tr>";}
              if(empty($valk['Nom_complet']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet de la rencontre scientifique </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Nom_complet']."</b></td></tr>";
              
              if(empty($valk['Lieu_dorganisation']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’organisation  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Lieu_dorganisation']."</b></td></tr>";
              if(empty($valk['Date']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Date </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Date']."</b></td></tr>";
              if(empty($valk['LienURL']))
              echo "-----<br>";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp<a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          
          //----------------------------------------------------------------------------
          if($valk['type']=="Brevets d’invention déposés"){
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>";
              echo '<table height="100" width="100%">';
                            if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify8.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="170" width="100%">';
                if(empty($valk['Titre_complet']))
                echo "";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre du brevet </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                
                if(empty($valk['auteurs']))
                echo "";
                else{
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                foreach($valk['auteurs'] as $aut){
                echo $aut.",";
                }
              echo "</b></td></tr>";
              }
              
              if(empty($valk['References']))
              echo "";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Références </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['References']."</b></td></tr>";
              
              if(empty($valk['Annee_et_pays_de_depot']))
              echo "";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année et pays de dépôt </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Annee_et_pays_de_depot']."</b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          //------------------------------------------------------------------------
          if($valk['type']=="Thèses de doctorat soutenues et encadrées par un membre de la structure"){
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
              echo '<table height="90" width="100%">';
                            if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify9.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="150" width="100%">';
                if(empty($valk['Titre_complet']))
                echo "";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre de la thèse </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                
                if(empty($valk['auteurs']))
                echo "";
                
                else{
                echo " <tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                foreach($valk['auteurs'] as $aut)
                echo $aut.",";
                }
              echo  "</b></td></tr>";
              
              if(empty($valk['Directeur_de_These']))
              echo "";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Directeur de Thèse </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Directeur_de_These']."</b></td></tr>";
              
              if(empty($valk['Membres_du_jury']))
              echo "";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Membres du jury </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Membres_du_jury']."</b></td></tr>";
              
              if(empty($valk['Date_de_soutenance']))
              echo "";
              else
              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Date de soutenance </b></font></td><td style='word-spacing: 0.6px;'><b>".$valk['Date_de_soutenance']."</b></td></tr>";
            echo '</table><br>';
          echo "   </div></div><br> <br>";
          }
          //-----------------------------------------------------------------------------
          if($valk['type']=="Projets financés"){
          echo "<div class='col-lg-12' >
            <div class='form-panel'>
              
              <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
              echo '<table height="90" width="100%">';
                            if(empty($valk['type']))
                echo "-----<br>";
                else
                echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify10.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="150" width="100%">';
                if(empty($valk['Titre_complet']))
                echo "";
                else
                echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre du projet  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                
                if(empty($valk['Responsable']))
                echo ">";
                else
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Responsable </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Responsable']."</b></td></tr>";
                
                if(empty($valk['Domiciliation_du_projet']))
                echo "";
                else
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Domiciliation du projet </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Domiciliation_du_projet']."</b></td></tr>";
                
                if(empty($valk['Organisme_qui_finance']))
                echo "";
                else
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Organisme qui finance </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Organisme_qui_finance']."</b></td></tr>";
                
                if(empty($valk['Duree']))
                echo "";
                else
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Durée </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Duree']."</b></td></tr>";
                
                if(empty($valk['Dotation']))
                echo "";
                else
                echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Dotation </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Dotation']."</b></td></tr>";
              echo '</table><br>';
            echo "   </div></div><br> <br>";
            }
            //---------------------------------------------------------------------------
            if($valk['type']=="Conventions signées"){
                            $ffa="Voulez-vous vraiment Supprimer ?";
            echo "<div class='col-lg-12' >
              <div class='form-panel'>
                
                <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                ";
                echo '<table width="100%">';
                  if(empty($valk['type']))
                  echo "-----<br>";
                  else
                  echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify11.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="80%">';
                  if(empty($valk['Titre_complet']))
                  echo "";
                  else
                  echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre de la convention  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                  
                  if(empty($valk['Type_de_la convention']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Type de la convention  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Type_de_la convention']."</b></td></tr>";
                  
                  if(empty($valk['Institutions_impliquées']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Institutions impliquées  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Institutions_impliquées']."</b></td></tr>";
                  
                  if(empty($valk['Coordonnateur']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Coordonnateur  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Coordonnateur']."</b></td></tr>";
                  
                  if(empty($valk['Duree']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Durée  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Duree']."</b></td></tr>";
                  
                  if(empty($valk['Financement']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Financement  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Financement']."</b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              }}
              else{
              
              $docs=$collectionProjet->find($_POST,['limit'=>$limit,'sort' => [$choix =>$sort]]);
              foreach($docs as $valk){
              $i=$i+1;
              }
              echo "<h5><p align='left' color='blue'><font color='orange'><b>&nbsp&nbsp &nbsp &nbsp ".$i."</b>&nbsp Element(s)</font></p></h5>" ;
              $docs=$collectionProjet->find($_POST,['limit'=>$limit,'sort' => [$choix =>$sort]]);
              foreach($docs as $valk){
              
              
              if($valk['type']=="Les publications parues dans des revues internationales indexées"){
              
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                  <br> ";
                  echo '<table width="100%">';
                    if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify1.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                    echo'<br>';
                    if(empty($valk['Titre_complet']))
                    echo "-----<br>";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                    if(empty($valk['auteurs']))
                    echo "-----<br>";
                    else{
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                    foreach($valk['auteurs'] as $aut){
                    echo $aut.",";
                    }
                  echo "</b></td></tr>";}
                  if(empty($valk['Nom_complet']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                  if(empty($valk['Volume_issue_pages_et_annee']))
                  echo "-----<br>";
                  else
                  echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                  if(empty($valk['If']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp IF (SNIP) </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['If']."</b></td></tr>";
                  if(empty($valk['LienURL']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              if($valk['type']=="Les publications parues dans des revues internationales à comité de lecture"){
              
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                  <br> ";
                  echo '<table width="100%">';
                    if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify2.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                    echo"<br>";
                    if(empty($valk['Titre_complet']))
                    echo "-----<br>";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                    if(empty($valk['auteurs']))
                    echo "-----<br>";
                    else{
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                    foreach($valk['auteurs'] as $aut){
                    echo $aut.",";
                    }
                  echo "</b></td></tr>";}
                  if(empty($valk['Nom_complet']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                  if(empty($valk['Volume_issue_pages_et_annee']))
                  echo "-----<br>";
                  else
                  echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                  if(empty($valk['LienURL']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              //------------------------------------------------------------------------------
              if($valk['type']=="Les publications parues dans des revues nationales à comité de lecture"){
              
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                  <br> ";
                  echo '<table width="100%">';
                    if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify3.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                    echo"    <br>";
                    if(empty($valk['Titre_complet']))
                    echo "-----<br>";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                    if(empty($valk['auteurs']))
                    echo "-----<br>";
                    else{
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                    foreach($valk['auteurs'] as $aut){
                    echo $aut.",";
                    }
                  echo "</b></td></tr>";}
                  if(empty($valk['Nom_complet']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                  if(empty($valk['Volume_issue_pages_et_annee']))
                  echo "-----<br>";
                  else
                  echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                  if(empty($valk['LienURL']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              
              //---------------------------------------------------------------------------
              if($valk['type']=="Ouvrages de recherche avec ISBN"){
              
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                  <br> ";
                  echo '<table width="100%">';
                    if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify4.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                    if(empty($valk['Titre_complet']))
                    echo "-----</br>";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbspTitre de l’ouvrage  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                    if(empty($valk['auteurs']))
                    echo "-----</br>";
                    else{
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                    foreach($valk['auteurs'] as $aut){
                    echo $aut.",";
                    }
                  echo "</b></td></tr>";
                  }
                  if(empty($valk['Maison_Edition']))
                  echo "-----</br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Maison d’édition </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Maison_Edition']."</b></td></tr>";
                  if(empty($valk['Lieu_Edition']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’édition  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Lieu_Edition']."</b></td></tr>";
                  if(empty($valk['Annee']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année de publication  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Annee']."</b></td></tr>";
                  if(empty($valk['ISBN/ISSN']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp ISBN/ISSN </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['ISBN/ISSN']."</b></td></tr>";
                  if(empty($valk['Depot_legal']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Dépôt légal </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Depot_legal']."</b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              //---------------------------------------------------------------------
              if($valk['type']=="Chapitres d’ouvrage indexés dans des bases de données internationales"){
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                  <br> ";
                  echo '<table width="100%">';
                    if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify5.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                    if(empty($valk['Titre_complet']))
                    echo "-----<br>";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet du chapitre </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                    if(empty($valk['Titre_de_louvrage']))
                    echo "-----<br>";
                    else
                    echo " <tr><td><font size='3.5px'><b>&nbsp&nbsp Titre de l’ouvrage </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_de_louvrage']."</b></td></tr>";
                    if(empty($valk['auteurs']))
                    echo "-----<br>";
                    else{
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                    foreach($valk['auteurs'] as $aut){
                    echo $aut.",";
                    }
                  echo "</b></td></tr>";}
                  if(empty($valk['Maison_Edition']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Maison d’édition </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Maison_Edition']."</b></td></tr>";
                  if(empty($valk['Annee']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Annee']."</b></td></tr>";
                  if(empty($valk['LienURL']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b><a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              //--------------------------------------------------------------------
              if($valk['type']=="Communications orales et posters dans des congrès scientifiques"){
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                  <br> ";
                  echo '<table width="100%">';
                    if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify7.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                    if(empty($valk['Titre_complet']))
                    echo " ";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                    if(empty($valk['auteurs']))
                    echo " ";
                    else{
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                    foreach($valk['auteurs'] as $aut){
                    echo $aut.",";
                    }
                  echo "</b></td></tr>";
                  }
                  
                  if(empty($valk['Nom_complet']))
                  echo " ";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet de la rencontre scientifique </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Nom_complet']."</b></td></tr>";
                  
                  if(empty($valk['Type_de_la_communication']))
                  echo " ";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Type de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Type_de_la_communication']."</b></td></tr>";
                  
                  if(empty($valk['Lieu_dorganisation_et_date']))
                  echo " ";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’organisation et date </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Lieu_dorganisation_et_date']."</b></td></tr>";
                  
                  if(empty($valk['LienURL']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b><a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              //-------------------------------------------------------------------------
              if($valk['type']=="Publications dans des actes de congrès scientifiques"){
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                  echo '<table height="130" width="100%">';
                                if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify6.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                    if(empty($valk['Titre_complet']))
                    echo "-----<br>";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                    if(empty($valk['auteurs']))
                    echo "-----<br>";
                    else{
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                    foreach($valk['auteurs'] as $aut){
                    echo $aut.",";
                    }
                  echo "</b></td></tr>";}
                  if(empty($valk['Nom_complet']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet de la rencontre scientifique </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Nom_complet']."</b></td></tr>";
                  
                  if(empty($valk['Lieu_dorganisation']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’organisation  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Lieu_dorganisation']."</b></td></tr>";
                  if(empty($valk['Date']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Date </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Date']."</b></td></tr>";
                  if(empty($valk['LienURL']))
                  echo "-----<br>";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp<a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              
              //----------------------------------------------------------------------------
              if($valk['type']=="Brevets d’invention déposés"){
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>";
                  echo '<table height="100" width="100%">';
                                if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify8.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="170" width="100%">';
                    if(empty($valk['Titre_complet']))
                    echo "";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre du brevet </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                    
                    if(empty($valk['auteurs']))
                    echo "";
                    else{
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                    foreach($valk['auteurs'] as $aut){
                    echo $aut.",";
                    }
                  echo "</b></td></tr>";
                  }
                  
                  if(empty($valk['References']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Références </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['References']."</b></td></tr>";
                  
                  if(empty($valk['Annee_et_pays_de_depot']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année et pays de dépôt </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Annee_et_pays_de_depot']."</b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              //------------------------------------------------------------------------
              if($valk['type']=="Thèses de doctorat soutenues et encadrées par un membre de la structure"){
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                  echo '<table height="90" width="100%">';
                                if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify9.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="150" width="100%">';
                    if(empty($valk['Titre_complet']))
                    echo "";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre de la thèse </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                    
                    if(empty($valk['auteurs']))
                    echo "";
                    
                    else{
                    echo " <tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                    foreach($valk['auteurs'] as $aut)
                    echo $aut.",";
                    }
                  echo  "</b></td></tr>";
                  
                  if(empty($valk['Directeur_de_These']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Directeur de Thèse </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Directeur_de_These']."</b></td></tr>";
                  
                  if(empty($valk['Membres_du_jury']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Membres du jury </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Membres_du_jury']."</b></td></tr>";
                  
                  if(empty($valk['Date_de_soutenance']))
                  echo "";
                  else
                  echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Date de soutenance </b></font></td><td style='word-spacing: 0.6px;'><b>".$valk['Date_de_soutenance']."</b></td></tr>";
                echo '</table><br>';
              echo "   </div></div><br> <br>";
              }
              //-----------------------------------------------------------------------------
              if($valk['type']=="Projets financés"){
              echo "<div class='col-lg-12' >
                <div class='form-panel'>
                  
                  <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                  echo '<table height="90" width="100%">';
                                if(empty($valk['type']))
                    echo "-----<br>";
                    else
                    echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify10.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="150" width="100%">';
                    if(empty($valk['Titre_complet']))
                    echo "";
                    else
                    echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre du projet  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                    
                    if(empty($valk['Responsable']))
                    echo ">";
                    else
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Responsable </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Responsable']."</b></td></tr>";
                    
                    if(empty($valk['Domiciliation_du_projet']))
                    echo "";
                    else
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Domiciliation du projet </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Domiciliation_du_projet']."</b></td></tr>";
                    
                    if(empty($valk['Organisme_qui_finance']))
                    echo "";
                    else
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Organisme qui finance </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Organisme_qui_finance']."</b></td></tr>";
                    
                    if(empty($valk['Duree']))
                    echo "";
                    else
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Durée </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Duree']."</b></td></tr>";
                    
                    if(empty($valk['Dotation']))
                    echo "";
                    else
                    echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Dotation </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Dotation']."</b></td></tr>";
                  echo '</table><br>';
                echo "   </div></div><br> <br>";
                }
                //---------------------------------------------------------------------------
                if($valk['type']=="Conventions signées"){
                                $ffa="Voulez-vous vraiment Supprimer ?";
                echo "<div class='col-lg-12' >
                  <div class='form-panel'>
                    
                    <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                    ";
                    echo '<table width="100%">';
                      if(empty($valk['type']))
                      echo "-----<br>";
                      else
                      echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify11.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="80%">';
                      if(empty($valk['Titre_complet']))
                      echo "";
                      else
                      echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre de la convention  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                      
                      if(empty($valk['Type_de_la convention']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Type de la convention  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Type_de_la convention']."</b></td></tr>";
                      
                      if(empty($valk['Institutions_impliquées']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Institutions impliquées  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Institutions_impliquées']."</b></td></tr>";
                      
                      if(empty($valk['Coordonnateur']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Coordonnateur  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Coordonnateur']."</b></td></tr>";
                      
                      if(empty($valk['Duree']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Durée  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Duree']."</b></td></tr>";
                      
                      if(empty($valk['Financement']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Financement  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Financement']."</b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }  }  }
                  }
                  else{
                  if(!empty($_POST["auteurs"]) && empty($_POST["Titre_complet"]) && empty($_POST["type"])){
                  $re=$collectionProjet->dropIndexes();
                  $ee=$collectionProjet->createIndex(["auteurs"=>"text"]);
                  $docs=$collectionProjet->find(['$text'=>['$search'=>$_POST['auteurs']]],['limit'=>$limit]);
                  foreach($docs as $valk){
                  $i=$i+1;
                  }
                  echo "<h5><p align='left' color='blue'><font color='orange'><b>&nbsp&nbsp &nbsp &nbsp ".$i."</b>&nbsp Element(s)</font></p></h5>" ;
                  $docs=$collectionProjet->find(['$text'=>['$search'=>$_POST['auteurs']]],['limit'=>$limit]);
                  foreach($docs as $valk){
                  
                  
                  if($valk['type']=="Les publications parues dans des revues internationales indexées"){
                  
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                      <br> ";
                      echo '<table width="100%">';
                        if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify1.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                        echo'<br>';
                        if(empty($valk['Titre_complet']))
                        echo "-----<br>";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                        if(empty($valk['auteurs']))
                        echo "-----<br>";
                        else{
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                        foreach($valk['auteurs'] as $aut){
                        echo $aut.",";
                        }
                      echo "</b></td></tr>";}
                      if(empty($valk['Nom_complet']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                      if(empty($valk['Volume_issue_pages_et_annee']))
                      echo "-----<br>";
                      else
                      echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                      if(empty($valk['If']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp IF (SNIP) </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['If']."</b></td></tr>";
                      if(empty($valk['LienURL']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  if($valk['type']=="Les publications parues dans des revues internationales à comité de lecture"){
                  
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                      <br> ";
                      echo '<table width="100%">';
                        if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify2.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                        echo"<br>";
                        if(empty($valk['Titre_complet']))
                        echo "-----<br>";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                        if(empty($valk['auteurs']))
                        echo "-----<br>";
                        else{
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                        foreach($valk['auteurs'] as $aut){
                        echo $aut.",";
                        }
                      echo "</b></td></tr>";}
                      if(empty($valk['Nom_complet']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                      if(empty($valk['Volume_issue_pages_et_annee']))
                      echo "-----<br>";
                      else
                      echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                      if(empty($valk['LienURL']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." title='cliquez ici pour accéder au lien associé' target='_blank'>Accéder au lien</a></b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  //------------------------------------------------------------------------------
                  if($valk['type']=="Les publications parues dans des revues nationales à comité de lecture"){
                  
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                      <br> ";
                      echo '<table width="100%">';
                        if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify3.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                        echo"    <br>";
                        if(empty($valk['Titre_complet']))
                        echo "-----<br>";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                        if(empty($valk['auteurs']))
                        echo "-----<br>";
                        else{
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                        foreach($valk['auteurs'] as $aut){
                        echo $aut.",";
                        }
                      echo "</b></td></tr>";}
                      if(empty($valk['Nom_complet']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                      if(empty($valk['Volume_issue_pages_et_annee']))
                      echo "-----<br>";
                      else
                      echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                      if(empty($valk['LienURL']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  
                  //---------------------------------------------------------------------------
                  if($valk['type']=="Ouvrages de recherche avec ISBN"){
                  
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                      <br> ";
                      echo '<table width="100%">';
                        if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify4.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                        if(empty($valk['Titre_complet']))
                        echo "-----</br>";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbspTitre de l’ouvrage  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                        if(empty($valk['auteurs']))
                        echo "-----</br>";
                        else{
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                        foreach($valk['auteurs'] as $aut){
                        echo $aut.",";
                        }
                      echo "</b></td></tr>";
                      }
                      if(empty($valk['Maison_Edition']))
                      echo "-----</br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Maison d’édition </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Maison_Edition']."</b></td></tr>";
                      if(empty($valk['Lieu_Edition']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’édition  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Lieu_Edition']."</b></td></tr>";
                      if(empty($valk['Annee']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année de publication  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Annee']."</b></td></tr>";
                      if(empty($valk['ISBN/ISSN']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp ISBN/ISSN </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['ISBN/ISSN']."</b></td></tr>";
                      if(empty($valk['Depot_legal']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Dépôt légal </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Depot_legal']."</b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  //---------------------------------------------------------------------
                  if($valk['type']=="Chapitres d’ouvrage indexés dans des bases de données internationales"){
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                      <br> ";
                      echo '<table width="100%">';
                        if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify5.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                        if(empty($valk['Titre_complet']))
                        echo "-----<br>";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet du chapitre </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                        if(empty($valk['Titre_de_louvrage']))
                        echo "-----<br>";
                        else
                        echo " <tr><td><font size='3.5px'><b>&nbsp&nbsp Titre de l’ouvrage </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_de_louvrage']."</b></td></tr>";
                        if(empty($valk['auteurs']))
                        echo "-----<br>";
                        else{
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                        foreach($valk['auteurs'] as $aut){
                        echo $aut.",";
                        }
                      echo "</b></td></tr>";}
                      if(empty($valk['Maison_Edition']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Maison d’édition </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Maison_Edition']."</b></td></tr>";
                      if(empty($valk['Annee']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Annee']."</b></td></tr>";
                      if(empty($valk['LienURL']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b><a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  //--------------------------------------------------------------------
                  if($valk['type']=="Communications orales et posters dans des congrès scientifiques"){
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                      <br> ";
                      echo '<table width="100%">';
                        if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify7.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                        if(empty($valk['Titre_complet']))
                        echo " ";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                        if(empty($valk['auteurs']))
                        echo " ";
                        else{
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                        foreach($valk['auteurs'] as $aut){
                        echo $aut.",";
                        }
                      echo "</b></td></tr>";
                      }
                      
                      if(empty($valk['Nom_complet']))
                      echo " ";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet de la rencontre scientifique </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Nom_complet']."</b></td></tr>";
                      
                      if(empty($valk['Type_de_la_communication']))
                      echo " ";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Type de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Type_de_la_communication']."</b></td></tr>";
                      
                      if(empty($valk['Lieu_dorganisation_et_date']))
                      echo " ";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’organisation et date </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Lieu_dorganisation_et_date']."</b></td></tr>";
                      
                      if(empty($valk['LienURL']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b><a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  //-------------------------------------------------------------------------
                  if($valk['type']=="Publications dans des actes de congrès scientifiques"){
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                      echo '<table height="130" width="100%">';
                                    if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify6.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                        if(empty($valk['Titre_complet']))
                        echo "-----<br>";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                        if(empty($valk['auteurs']))
                        echo "-----<br>";
                        else{
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                        foreach($valk['auteurs'] as $aut){
                        echo $aut.",";
                        }
                      echo "</b></td></tr>";}
                      if(empty($valk['Nom_complet']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet de la rencontre scientifique </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Nom_complet']."</b></td></tr>";
                      
                      if(empty($valk['Lieu_dorganisation']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’organisation  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Lieu_dorganisation']."</b></td></tr>";
                      if(empty($valk['Date']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Date </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Date']."</b></td></tr>";
                      if(empty($valk['LienURL']))
                      echo "-----<br>";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp<a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  
                  //----------------------------------------------------------------------------
                  if($valk['type']=="Brevets d’invention déposés"){
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>";
                      echo '<table height="100" width="100%">';
                                    if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify8.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="170" width="100%">';
                        if(empty($valk['Titre_complet']))
                        echo "";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre du brevet </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                        
                        if(empty($valk['auteurs']))
                        echo "";
                        else{
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                        foreach($valk['auteurs'] as $aut){
                        echo $aut.",";
                        }
                      echo "</b></td></tr>";
                      }
                      
                      if(empty($valk['References']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Références </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['References']."</b></td></tr>";
                      
                      if(empty($valk['Annee_et_pays_de_depot']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année et pays de dépôt </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Annee_et_pays_de_depot']."</b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  //------------------------------------------------------------------------
                  if($valk['type']=="Thèses de doctorat soutenues et encadrées par un membre de la structure"){
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                      echo '<table height="90" width="100%">';
                                    if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify9.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="150" width="100%">';
                        if(empty($valk['Titre_complet']))
                        echo "";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre de la thèse </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                        
                        if(empty($valk['auteurs']))
                        echo "";
                        
                        else{
                        echo " <tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                        foreach($valk['auteurs'] as $aut)
                        echo $aut.",";
                        }
                      echo  "</b></td></tr>";
                      
                      if(empty($valk['Directeur_de_These']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Directeur de Thèse </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Directeur_de_These']."</b></td></tr>";
                      
                      if(empty($valk['Membres_du_jury']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Membres du jury </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Membres_du_jury']."</b></td></tr>";
                      
                      if(empty($valk['Date_de_soutenance']))
                      echo "";
                      else
                      echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Date de soutenance </b></font></td><td style='word-spacing: 0.6px;'><b>".$valk['Date_de_soutenance']."</b></td></tr>";
                    echo '</table><br>';
                  echo "   </div></div><br> <br>";
                  }
                  //-----------------------------------------------------------------------------
                  if($valk['type']=="Projets financés"){
                  echo "<div class='col-lg-12' >
                    <div class='form-panel'>
                      
                      <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                      echo '<table height="90" width="100%">';
                                    if(empty($valk['type']))
                        echo "-----<br>";
                        else
                        echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify10.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="150" width="100%">';
                        if(empty($valk['Titre_complet']))
                        echo "";
                        else
                        echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre du projet  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                        
                        if(empty($valk['Responsable']))
                        echo ">";
                        else
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Responsable </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Responsable']."</b></td></tr>";
                        
                        if(empty($valk['Domiciliation_du_projet']))
                        echo "";
                        else
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Domiciliation du projet </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Domiciliation_du_projet']."</b></td></tr>";
                        
                        if(empty($valk['Organisme_qui_finance']))
                        echo "";
                        else
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Organisme qui finance </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Organisme_qui_finance']."</b></td></tr>";
                        
                        if(empty($valk['Duree']))
                        echo "";
                        else
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Durée </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Duree']."</b></td></tr>";
                        
                        if(empty($valk['Dotation']))
                        echo "";
                        else
                        echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Dotation </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Dotation']."</b></td></tr>";
                      echo '</table><br>';
                    echo "   </div></div><br> <br>";
                    }
                    //---------------------------------------------------------------------------
                    if($valk['type']=="Conventions signées"){
                                    $ffa="Voulez-vous vraiment Supprimer ?";
                    echo "<div class='col-lg-12' >
                      <div class='form-panel'>
                        
                        <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                        ";
                        echo '<table width="100%">';
                          if(empty($valk['type']))
                          echo "-----<br>";
                          else
                          echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify11.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="80%">';
                          if(empty($valk['Titre_complet']))
                          echo "";
                          else
                          echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre de la convention  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                          
                          if(empty($valk['Type_de_la convention']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Type de la convention  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Type_de_la convention']."</b></td></tr>";
                          
                          if(empty($valk['Institutions_impliquées']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Institutions impliquées  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Institutions_impliquées']."</b></td></tr>";
                          
                          if(empty($valk['Coordonnateur']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Coordonnateur  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Coordonnateur']."</b></td></tr>";
                          
                          if(empty($valk['Duree']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Durée  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Duree']."</b></td></tr>";
                          
                          if(empty($valk['Financement']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Financement  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Financement']."</b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      }}
                      
                      else{
                      
                      //mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm
                      
                      $docs=$collectionProjet->find($_POST,['limit'=>$limit]);
                      foreach($docs as $valk){
                      $i=$i+1;
                      }
                      echo "<h5><p align='left' color='blue'><font color='orange'><b>&nbsp&nbsp &nbsp &nbsp ".$i."</b>&nbsp Element(s)</font></p></h5>" ;
                      $docs=$collectionProjet->find($_POST,['limit'=>$limit]);
                      
                      foreach($docs as $valk){
                      
                      
                      if($valk['type']=="Les publications parues dans des revues internationales indexées"){
                      
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                          <br> ";
                          echo '<table width="100%">';
                            if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify1.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                            echo'<br>';
                            if(empty($valk['Titre_complet']))
                            echo "-----<br>";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                            if(empty($valk['auteurs']))
                            echo "-----<br>";
                            else{
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                            foreach($valk['auteurs'] as $aut){
                            echo $aut.",";
                            }
                          echo "</b></td></tr>";}
                          if(empty($valk['Nom_complet']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                          if(empty($valk['Volume_issue_pages_et_annee']))
                          echo "-----<br>";
                          else
                          echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                          if(empty($valk['If']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp IF (SNIP) </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['If']."</b></td></tr>";
                          if(empty($valk['LienURL']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']."   target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      if($valk['type']=="Les publications parues dans des revues internationales à comité de lecture"){
                      
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                          <br> ";
                          echo '<table width="100%">';
                            if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify2.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                            echo"<br>";
                            if(empty($valk['Titre_complet']))
                            echo "-----<br>";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                            if(empty($valk['auteurs']))
                            echo "-----<br>";
                            else{
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                            foreach($valk['auteurs'] as $aut){
                            echo $aut.",";
                            }
                          echo "</b></td></tr>";}
                          if(empty($valk['Nom_complet']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                          if(empty($valk['Volume_issue_pages_et_annee']))
                          echo "-----<br>";
                          else
                          echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                          if(empty($valk['LienURL']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      //------------------------------------------------------------------------------
                      if($valk['type']=="Les publications parues dans des revues nationales à comité de lecture"){
                      
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                          <br> ";
                          echo '<table width="100%">';
                            if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify3.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                            echo"    <br>";
                            if(empty($valk['Titre_complet']))
                            echo "-----<br>";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la publication  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                            if(empty($valk['auteurs']))
                            echo "-----<br>";
                            else{
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                            foreach($valk['auteurs'] as $aut){
                            echo $aut.",";
                            }
                          echo "</b></td></tr>";}
                          if(empty($valk['Nom_complet']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet du périodique scientifique </b></font></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b> ".$valk['Nom_complet']."</b></td></tr>";
                          if(empty($valk['Volume_issue_pages_et_annee']))
                          echo "-----<br>";
                          else
                          echo "<tr><th><font   size='3em'><b>&nbsp&nbsp Volume ,issue ,pages et annee</b> </font></th><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Volume_issue_pages_et_annee']."</b></td></tr>";
                          if(empty($valk['LienURL']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><b>&nbsp &nbsp<a href=".$valk['LienURL']." target='_blank' title='cliquez ici pour accéder au lien associé'>Accéder au lien</a></b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      
                      //---------------------------------------------------------------------------
                      if($valk['type']=="Ouvrages de recherche avec ISBN"){
                      
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                          <br> ";
                          echo '<table width="100%">';
                            if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify4.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                            if(empty($valk['Titre_complet']))
                            echo "-----</br>";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbspTitre de l’ouvrage  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                            if(empty($valk['auteurs']))
                            echo "-----</br>";
                            else{
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                            foreach($valk['auteurs'] as $aut){
                            echo $aut.",";
                            }
                          echo "</b></td></tr>";
                          }
                          if(empty($valk['Maison_Edition']))
                          echo "-----</br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Maison d’édition </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Maison_Edition']."</b></td></tr>";
                          if(empty($valk['Lieu_Edition']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’édition  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Lieu_Edition']."</b></td></tr>";
                          if(empty($valk['Annee']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année de publication  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Annee']."</b></td></tr>";
                          if(empty($valk['ISBN/ISSN']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp ISBN/ISSN </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['ISBN/ISSN']."</b></td></tr>";
                          if(empty($valk['Depot_legal']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Dépôt légal </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Depot_legal']."</b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      //---------------------------------------------------------------------
                      if($valk['type']=="Chapitres d’ouvrage indexés dans des bases de données internationales"){
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                          <br> ";
                          echo '<table width="100%">';
                            if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify5.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                            if(empty($valk['Titre_complet']))
                            echo "-----<br>";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet du chapitre </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                            if(empty($valk['Titre_de_louvrage']))
                            echo "-----<br>";
                            else
                            echo " <tr><td><font size='3.5px'><b>&nbsp&nbsp Titre de l’ouvrage </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_de_louvrage']."</b></td></tr>";
                            if(empty($valk['auteurs']))
                            echo "-----<br>";
                            else{
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                            foreach($valk['auteurs'] as $aut){
                            echo $aut.",";
                            }
                          echo "</b></td></tr>";}
                          if(empty($valk['Maison_Edition']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Maison d’édition </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Maison_Edition']."</b></td></tr>";
                          if(empty($valk['Annee']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Annee']."</b></td></tr>";
                          if(empty($valk['LienURL']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b><a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      //--------------------------------------------------------------------
                      if($valk['type']=="Communications orales et posters dans des congrès scientifiques"){
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                          <br> ";
                          echo '<table width="100%">';
                            if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify7.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                            if(empty($valk['Titre_complet']))
                            echo " ";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                            if(empty($valk['auteurs']))
                            echo " ";
                            else{
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                            foreach($valk['auteurs'] as $aut){
                            echo $aut.",";
                            }
                          echo "</b></td></tr>";
                          }
                          
                          if(empty($valk['Nom_complet']))
                          echo " ";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet de la rencontre scientifique </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Nom_complet']."</b></td></tr>";
                          
                          if(empty($valk['Type_de_la_communication']))
                          echo " ";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Type de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Type_de_la_communication']."</b></td></tr>";
                          
                          if(empty($valk['Lieu_dorganisation_et_date']))
                          echo " ";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’organisation et date </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Lieu_dorganisation_et_date']."</b></td></tr>";
                          
                          if(empty($valk['LienURL']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b><a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      //-------------------------------------------------------------------------
                      if($valk['type']=="Publications dans des actes de congrès scientifiques"){
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                          echo '<table height="130" width="100%">';
                                        if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify6.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="100%">';
                            if(empty($valk['Titre_complet']))
                            echo "-----<br>";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre complet de la communication </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                            if(empty($valk['auteurs']))
                            echo "-----<br>";
                            else{
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                            foreach($valk['auteurs'] as $aut){
                            echo $aut.",";
                            }
                          echo "</b></td></tr>";}
                          if(empty($valk['Nom_complet']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Nom complet de la rencontre scientifique </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Nom_complet']."</b></td></tr>";
                          
                          if(empty($valk['Lieu_dorganisation']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lieu d’organisation  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Lieu_dorganisation']."</b></td></tr>";
                          if(empty($valk['Date']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Date </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Date']."</b></td></tr>";
                          if(empty($valk['LienURL']))
                          echo "-----<br>";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Lien URL </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp<a href=".$valk['LienURL']." target='_blank'>Accéder au lien</a></b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      
                      //----------------------------------------------------------------------------
                      if($valk['type']=="Brevets d’invention déposés"){
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>";
                          echo '<table height="100" width="100%">';
                                        if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify8.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="170" width="100%">';
                            if(empty($valk['Titre_complet']))
                            echo "";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre du brevet </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                            
                            if(empty($valk['auteurs']))
                            echo "";
                            else{
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp";
                            foreach($valk['auteurs'] as $aut){
                            echo $aut.",";
                            }
                          echo "</b></td></tr>";
                          }
                          
                          if(empty($valk['References']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Références </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['References']."</b></td></tr>";
                          
                          if(empty($valk['Annee_et_pays_de_depot']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Année et pays de dépôt </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Annee_et_pays_de_depot']."</b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      //------------------------------------------------------------------------
                      if($valk['type']=="Thèses de doctorat soutenues et encadrées par un membre de la structure"){
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                          echo '<table height="90" width="100%">';
                                        if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify9.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="150" width="100%">';
                            if(empty($valk['Titre_complet']))
                            echo "";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre de la thèse </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                            
                            if(empty($valk['auteurs']))
                            echo "";
                            
                            else{
                            echo " <tr><td><font size='3.5px'><b>&nbsp&nbsp Auteurs </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>";
                            foreach($valk['auteurs'] as $aut)
                            echo $aut.",";
                            }
                          echo  "</b></td></tr>";
                          
                          if(empty($valk['Directeur_de_These']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Directeur de Thèse </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Directeur_de_These']."</b></td></tr>";
                          
                          if(empty($valk['Membres_du_jury']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Membres du jury </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Membres_du_jury']."</b></td></tr>";
                          
                          if(empty($valk['Date_de_soutenance']))
                          echo "";
                          else
                          echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Date de soutenance </b></font></td><td style='word-spacing: 0.6px;'><b>".$valk['Date_de_soutenance']."</b></td></tr>";
                        echo '</table><br>';
                      echo "   </div></div><br> <br>";
                      }
                      //-----------------------------------------------------------------------------
                      if($valk['type']=="Projets financés"){
                      echo "<div class='col-lg-12' >
                        <div class='form-panel'>
                          
                          <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div> ";
                          echo '<table height="90" width="100%">';
                                        if(empty($valk['type']))
                            echo "-----<br>";
                            else
                            echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify10.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="150" width="100%">';
                            if(empty($valk['Titre_complet']))
                            echo "";
                            else
                            echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre du projet  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Titre_complet']."</b></td></tr>";
                            
                            if(empty($valk['Responsable']))
                            echo ">";
                            else
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Responsable </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Responsable']."</b></td></tr>";
                            
                            if(empty($valk['Domiciliation_du_projet']))
                            echo "";
                            else
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Domiciliation du projet </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Domiciliation_du_projet']."</b></td></tr>";
                            
                            if(empty($valk['Organisme_qui_finance']))
                            echo "";
                            else
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Organisme qui finance </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Organisme_qui_finance']."</b></td></tr>";
                            
                            if(empty($valk['Duree']))
                            echo "";
                            else
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Durée </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Duree']."</b></td></tr>";
                            
                            if(empty($valk['Dotation']))
                            echo "";
                            else
                            echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Dotation </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>".$valk['Dotation']."</b></td></tr>";
                          echo '</table><br>';
                        echo "   </div></div><br> <br>";
                        }
                        //---------------------------------------------------------------------------
                        if($valk['type']=="Conventions signées"){
                                        $ffa="Voulez-vous vraiment Supprimer ?";
                        echo "<div class='col-lg-12' >
                          <div class='form-panel'>
                            
                            <div style='width:234px;margin-left:-9px;margin-top:-20px;'> <li style='color:orange;font-size:2.2em;'  class='fa fa-bookmark'></li></div>
                            ";
                            echo '<table width="100%">';
                              if(empty($valk['type']))
                              echo "-----<br>";
                              else
                              echo '<tr><td width="33%"></td><td width="33%"><font size="4px" ><center>'.$valk["type"].'</center></font></td><td width="33%"><p ><a title="Supprimer" href="supprissionElement.php?id='.$valk['_id'].'"><button class="btn btn-danger btn-xs" type="button" onclick="return confirm(\'Voulez-vous vraiment Supprimer cette publication ?\')" ><i class="fa fa-trash-o"></i></button></a>&nbsp&nbsp<a title="Modifier" href="modify11.php?id='.$valk['_id'].'"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></p></td></tr></table><table  height="180" width="80%">';
                              if(empty($valk['Titre_complet']))
                              echo "";
                              else
                              echo "<tr><td width='33%'><font size='3.5px'><b>&nbsp&nbsp Titre de la convention  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Titre_complet']."</b></td></tr>";
                              
                              if(empty($valk['Type_de_la convention']))
                              echo "";
                              else
                              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Type de la convention  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Type_de_la convention']."</b></td></tr>";
                              
                              if(empty($valk['Institutions_impliquées']))
                              echo "";
                              else
                              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Institutions impliquées  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Institutions_impliquées']."</b></td></tr>";
                              
                              if(empty($valk['Coordonnateur']))
                              echo "";
                              else
                              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Coordonnateur  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Coordonnateur']."</b></td></tr>";
                              
                              if(empty($valk['Duree']))
                              echo "";
                              else
                              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Durée  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Duree']."</b></td></tr>";
                              
                              if(empty($valk['Financement']))
                              echo "";
                              else
                              echo "<tr><td><font size='3.5px'><b>&nbsp&nbsp Financement  </b></font></td><td style='word-spacing: 2px;letter-spacing: 1px;'><b>&nbsp&nbsp".$valk['Financement']."</b></td></tr>";
                            echo '</table><br>';
                          echo "   </div></div><br> <br>";
                          } } }}}
                          
                          
                          ?>
                          
                          
                        </section>
                      </section>
                      <div style="margin-bottom:24%;">
                      </div>
                      <section id="footer">
                        <div class="container">
                          <a title="Vers le haut" href="#top" style="margin-top: 1%;margin-right: -7%;float: right;background: rgba(255,255,255,.5);width: 20px; height: 20px;order-radius: 50%;-webkit-border-radius: 50%;color: #2A3542;" >
                            <i style="color: #ffff; font-size:2rem; margin-left:17%;margin-top:-9%;" class="fa fa-angle-up"></i>
                          </a>
                          <div class="row text-center text-xs-center text-sm-left text-md-left">
                            <div class="col-xs-12 col-sm-4 col-md-4"><br><br>
                              <ul class="list-unstyled quick-links" >
                                <li><a href="index.php"><i class="fa fa-angle-double-right"></i>Accueil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                <li><a href="profile.php"><i class="fa fa-angle-double-right"></i>Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                <li><a href="parametre.php"><i class="fa fa-angle-double-right"></i>Paramètre&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                <li><a href="deconnecter.php"><i class="fa fa-angle-double-right"></i>Déconnexion</a></li>
                              </ul>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4"><br>
                              <ul class="list-unstyled quick-links">
                                <img src="outils\images\fs.png" class="img-circle" width="90">
                                <br><center><font color=white><b>FSJ</b></font></center>
                              </ul>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                              <br><br><br>
                              <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                                <ul class="list-unstyled list-inline social  " >
                                  <li class="list-inline-item"><a href="http://www.fs.ucd.ac.ma/fs/" target="_blank" title="Notre site web"><i  class="fa fa-edge"></i></a></li> &nbsp;&nbsp;&nbsp;&nbsp;
                                  <li class="list-inline-item"><a href="#"  title="Notre page Facebook" target="_blank" ><i class="fa fa-facebook"></i></a></li> &nbsp;&nbsp;&nbsp;&nbsp;
                                  <li class="list-inline-item"><a href="mailto:adresse@serveur.com" title="Contactez-nous" target="_blank" ><i class="fa fa-envelope"></i></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                              <p><center><font color=white>Crée par: AGHEZZAF Mohamed & MEZOIR Hassan</font></center> </p>
                              <p class="h6"><center>&copy Tous droits réservés.</center></p>
                            </div>
                            </hr>
                          </div>
                        </div>
                      </section>
                    </section>
                    <script src="outils/js/jquery.js"></script>
                    <script src="outils/js/bootstrap.min.js"></script>
                    <script class="include" type="text/javascript" src="outils/js/jquery.dcjqaccordion.2.7.js"></script>
                    <script src="outils/js/jquery.scrollTo.min.js"></script>
                    <script src="outils/js/jquery.nicescroll.js" type="text/javascript"></script>
                    <script src="outils/js/common-scripts.js"></script>
                  </body>
                </html>