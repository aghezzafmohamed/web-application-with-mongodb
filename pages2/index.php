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
		<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script src="outils/amcharts.js"></script>
		<script src="outils/serial.js"></script>
		<script src="outils/export.min.js"></script>
		<link rel="stylesheet" href="outils/export.css" type="text/css" media="all" />
		<script src="outils/light.js"></script>
		<link rel="stylesheet" href="outils/font-awesome/css/font-awesome.min.css">
		
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
					<div style="color: #ffff;" class="fa fa-bars tooltips" data-placement="right" data-original-title="Basculer la navigation"> </div>
				</div>
				<a href="index.php" class="logo"><b>FS ELJADIDA   </b></a>
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
							<i  type="button" style="color: #ffff; font-size:2.3rem;" class="fa fa-chevron-down fa-2x" data-toggle="dropdown">
							<span ></span>
							</i>
							<ul class="dropdown-menu pull-right">
								<div class="notify-arrow notify-arrow-green"  style="  margin-left: 132px;"></div>
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
							<h5 class="centered"><?php echo$utilisateur['nom'] ?></h5>
							<li  class="mt">
								<a href="index.php"  class="active" >
									<i class="fa fa-home fa-fw"  ></i>
									<span>Accueil</span>
								</a>
							</li>
							<li class="sub-menu">
								<a href="javascript:;">
									<i class="fa fa-desktop"></i>
									<span>Afficher</span>
								</a>
								<ul class="sub">
									<li ><a title="Tous les types" href="all.php">Tous les types</a></li>
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
						<h3><i class="fa fa-bar-chart"></i> Statistique</h3>
						<hr/ style="margin-top:-6px;margin-bottom:4px">
						<style>
						
						#chartdiv {
						width: 100%;
						height: 500px;
								}
						</style>
						<?php
						try{
								require "outils/vendor/autoload.php";
								$client=new MongoDB\Client;
								$dbProjet=$client->dbProjet;
								$collectionProjet=$dbProjet->collectionProjet;
								
								$type1=$collectionProjet->count(["type"=>"Les publications parues dans des revues internationales indexées"]);
								$type2=$collectionProjet->count(["type"=>"Les publications parues dans des revues internationales à comité de lecture"]);
								$type3=$collectionProjet->count(["type"=>"Les publications parues dans des revues nationales à comité de lecture"]);
								$type4=$collectionProjet->count(["type"=>"Ouvrages de recherche avec ISBN"]);
								$type5=$collectionProjet->count(["type"=>"Chapitres d’ouvrage indexés dans des bases de données internationales"]);
								$type6=$collectionProjet->count(["type"=>"Publications dans des actes de congrès scientifiques"]);
								$type7=$collectionProjet->count(["type"=>"Communications orales et posters dans des congrès scientifiques"]);
								$type8=$collectionProjet->count(["type"=>"Brevets d’invention déposés"]);
								$type9=$collectionProjet->count(["type"=>"Thèses de doctorat soutenues et encadrées par un membre de la structure"]);
								$type10=$collectionProjet->count(["type"=>"Projets financés"]);
								$type11=$collectionProjet->count(["type"=>"Conventions signées"]);
							$nbcollections=$collectionProjet->count();
								$nbutilisateurs=$authentification->count(['type'=>'utilisateur']);
						} catch (Exception $exception) {
						echo"<p  class='alert alert-danger' align='center'> <font size='3%'><b> Serveur n'est pas accessible </b></font></p>";
						
									}
						?>
						<script>
							var chart = AmCharts.makeChart("chartdiv", {
								"theme": "light",
								"type": "serial",
								"dataProvider": [ {
									"Type": "Publications parues \ndans des revues internationales indexées",
						"Nombre": <?php echo$type1;?>
						}, {
						"Type": "Publications parues dans \ndes revues internationales à comité de lecture",
						"Nombre": <?php echo$type2;?>
						}, {
						"Type": "Publications parues dans \ndes revues nationales à comité de lecture",
						"Nombre": <?php echo$type3;?>
						}, {
						"Type": "Ouvrages de recherche avec ISBN",
						"Nombre": <?php echo$type4;?>
						}, {
						"Type": "Chapitres d’ouvrage indexés dans \ndes bases de données internationales",
						"Nombre": <?php echo$type5;?>
						}, {
						"Type": "Publications dans des actes \nde congrès scientifiques",
						"Nombre": <?php echo$type6;?>
						}, {
						"Type": "Communications orales et posters \ndans des congrès scientifiques",
						"Nombre": <?php echo$type7;?>
						}, {
						"Type": "Brevets d’invention déposés",
						"Nombre": <?php echo$type8;?>
						}, {
						"Type": "Thèses de doctorat soutenues et\n encadrées par un membre de la structure",
						"Nombre": <?php echo$type9;?>
						}, {
						"Type": "Projets financés",
						"Nombre": <?php echo$type10;?>
						}, {
						"Type": "Conventions signées",
						"Nombre": <?php echo$type11;?>
						}],
						"valueAxes": [{
						"title": "Nombre de publications par type"
						}],
						"graphs": [{
						"balloonText": "Nombre des [[category]]:[[value]]",
						"fillAlphas": 1,
						"lineAlpha": 0.2,
						"title": "Income",
						"type": "column",
						"valueField": "Nombre"
						}],
						"depth3D": 8,
						"angle": 20,
						"rotate": true,
						"categoryField": "Type",
						"categoryAxis": {
						"gridPosition": "start",
						"fillAlpha": 0.8,
						"position": "left"
						},
						"export": {
						"enabled": true
						}
						});
						</script>
						
						<table width="100%" height="100%"><tr>
							<td>
								<div   style="margin-right:0rem;position:relative;width:100%;min-height:1px;padding-right:0;padding-left:26%;-ms-flex:0 0 0%;flex:0 0 0%;max-width:0%;">
									
									<div style="width:320px;padding-right:0px;padding-left:0px;margin-right:auto;margin-left:auto;">
										<div   style="background-color:#90EE90;height:70%;background-color:#90EE90;-ms-flex:1 1 auto;flex:1 1 auto;padding:0.25rem;position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#99EE99;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem;">
											<div style="background-color:#90EE90;-ms-flex:1 1 auto;flex:1 1 auto;padding:0.25rem;">
												<div style="-ms-flex:1 1 auto;flex:1 1 auto;padding:0.25rem;">
													<i style="color: #ffff;font-size:10rem; margin-left:20px " class="fa fa-file-text-o"></i>
												</div>
												<div style="margin-top:-11.15rem;"><p align="right"><font color="white" size=8px><?php echo $nbcollections; ?></font></p></div>
											</div>
											<a   style="padding:0.4rem 12.25rem;background-color:rgba(0,0,0,.10);border-top:1px solid rgba(0,0,0,.15);color:#99EE99;display:block;clear:both;content:"";font-size:9%;">
												<span   style="float:left;"><center><font color="white" size=4><b>Publications</b></font></center></span>
											</a>
										</div>
									</div>
								</div>
							</td>
							<td>
								
								<div   style="margin-right:0rem;position:relative;width:100%;min-height:1px;padding-right:0;padding-left:20%;-ms-flex:0 0 0%;flex:0 0 0%;max-width:0%;">
									
									<div style="width:320px;padding-right:0px;padding-left:0px;margin-right:auto;margin-left:auto;">
										<div   style="background-color:#48D1CC;height:70%;background-color:#48D1CC;-ms-flex:1 1 auto;flex:1 1 auto;padding:0.25rem;position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#48D9CC;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem;">
											<div style="background-color:#48D1CC;-ms-flex:1 1 auto;flex:1 1 auto;padding:0.25rem;">
												<div style="-ms-flex:1 1 auto;flex:1 1 auto;padding:0.25rem;">
													<i style="color: #ffff;font-size:10rem; margin-left:20px " class="fa fa-users"></i>
												</div>
												<div style="margin-top:-11.15rem;"><p align="right"><font color="white" size=8px><?php echo $nbutilisateurs; ?></font></p></div>
											</div>
											<a   style="padding:0.4rem 12.25rem;background-color:rgba(0,0,0,.10);border-top:1px solid rgba(0,0,0,.15);color:#48D1CC;display:block;clear:both;content:"";font-size:9%;">
												<span   style="float:left;"><center><font color="white" size=4><b>Utilisateurs</b></font></center></span>
											</a>
										</div>
									</div>
								</div>
							</td>
						</tr>
					</table>
					<div id="chartdiv"></div>
				</section>
			</section>
			
			<div style="margin-bottom:20%;">
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