<!DOCTYPE html>
<?php
	session_start();
		$upload_dir='uploads/';
require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$authentification=$dbProjet->authentification;
$utilisateur=$authentification->findOne(["codeActivate"=>$_SESSION['auto']]);
if(!isset($_SESSION['auto']) || $utilisateur["type"]=="admin"){
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
				<div class="sidebar-toggle-box"><?php echo'&nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp  &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp'; ?></div>
				<div class="sidebar-toggle-box" style="margin-top:13px;">
					<form class="form-inline"  method="get" action='tout.php'>
						<input type="text" name="champ" class="form-control round-form" placeholder="Recherche" style="width:170px; height:32px;"/>
						<button type="submit" name="env" title="Recherche" class="btn btn-round btn-theme0" >&nbsp;<i style="color:#3b5999;" class="fa fa-search" aria-hidden="true"></i>&nbsp;</button>
						
					</form></div>
					<div class="nav notify-row" id="top_menu"  >
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
								<li class="divider"></li>
								<li><a href="deconnecter.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Déconnexion</a></li>
							</ul>
						</div>
					</div>
				</header>
				<aside>
					<div id="sidebar"  class="nav-collapse " >
						<ul class="sidebar-menu" id="nav-accordion">
							<p class="centered"><img src="<?php echo $upload_dir.$utilisateur['pathImage'] ?>" class="img-circle" width="100"></p>
							<h5 class="centered"><?php echo $utilisateur['nom'] ?></h5>
							<li  class="mt">
								<a href="index.php" >
									<i class="fa fa-home fa-fw"  ></i>
									<span>Accueil</span>
								</a>
							</li>
							<li class="sub-menu">
								<a href="javascript:;" class='active'>
									<i class="fa fa-desktop"></i>
									<span>Afficher</span>
								</a>
								<ul class="sub">
									<li class='active' ><a title="Tous les types" href="all.php">Tous les types</a></li>
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
							
						</ul>
					</div>
				</aside>
				<section id="main-content">
					<section class="wrapper">
						<h3><i class="fa fa-desktop"></i> Affichage</h3>
						<hr/>
						<div class="col-lg-12">
							<div class="form-panel">
								<form method="post" action="all1.php">
									<table id="todo" class="table table-hover custom-check">
										<tbody>
										<tr></tr>
										<tr>
											<td> <span  class="check">
												Titre</td><td width=10% ><input type="checkbox"  class="checked" name="chtype1[]" value="Titre complet">
											</span></td></tr>
											<tr><td> <span class="check">
											Auteurs </td><td><input type="checkbox" class="checked" name="chtype1[]" value="auteurs" checked>
										</span></td></tr>
										<tr><td> <span class="check">
											Type </td><td><input type="checkbox" class="checked" name="chtype1[]" value="type">
										</span></td></tr>
									</tbody>
								</table>
								<center>
								<input  type="submit" name="envoi" value="Selectionner" class="btn btn-theme03"/></center>
							</form>
						</div>
					</div>
				</section>
			</section>
			
			<div style="margin-bottom:27%;">
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