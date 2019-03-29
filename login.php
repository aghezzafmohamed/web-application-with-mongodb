<!DOCTYPE html>
<?php
 session_start();
	if(isset($_SESSION['auto'])){
	$upload_dir='uploads/';
  require "pages/outils/vendor/autoload.php";
  $client=new MongoDB\Client;
  $dbProjet=$client->dbProjet;
  $authentification=$dbProjet->authentification;
  $docs=$authentification->findOne(["codeActivate"=>$_SESSION['auto']]);
   if($docs["type"]=="utilisateur"){
			  echo'<script>
        window.location.replace("pages2/index.php");
        </script>';
		}
     else {
		   echo'<script>
        window.location.replace("pages/index.php");
        </script>';		 
	 }	
	} 
?>
<html >
  <head>
    <meta charset="utf-8">
    <title>FS-Eljadida Plateforme</title>
    <link href="pages/outils/css/bootstrap.css" rel="stylesheet">
    <link href="pages/outils/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="pages/outils/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="pages/outils/images/fs.png"> 
    <link rel="stylesheet" type="text/css" href="pages2/outils/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="pages2/outils/css/style1.css" />
    <script type="text/javascript" src="pages2/outils/js/modernizr.custom.86080.js"></script>
	<style>
		#hr1 {
		border: 0.5px solid #D3D3D3; /*ou #FF0000*/
		background-color: red; /*ou aussi #F00*/
		
		}
		</style>	
  </head>
  <body>
   <ul class="cb-slideshow">
            <li><span></span></li>
            <li><span></span></li>
            <li><span></span></li>
            <li><span></span></li>
            <li><span></span></li>
            <li><span></span></li>
        </ul><div ><header>
	  <div id="login-page">
	  	<div class="container">
	  	<?php
			  if(isset($_GET['code'])){
					require "pages/outils/vendor/autoload.php";
					$client=new MongoDB\Client;
					$dbProjet=$client->dbProjet;
					$authentification=$dbProjet->authentification;
				$code=$_GET['code'];
				$util=$authentification->findOne(["codeActivate"=>$code]);
				if($util['activate']==0 && $code==$util['codeActivate']){
				$util['activate']=1;
				 $docs=$authentification->updateOne(['_id'=> new MongoDB\BSON\ObjectId($util['_id'])],['$set'=>["activate"=>$util['activate']]]);
				
				echo"<br><center><div class='alert alert-success' style='width:350px; height:55px;'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						  <h5><strong>Excellente! &nbsp;</strong> Votre compte est désormais activé.</h5>
						</div></center>";
				}
				else {

		        echo"<br><center><div class='alert alert-danger' style='width:350px; height:55px;'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						  <h5><strong>Oups! &nbsp;</strong> Compte déja activé.</h5>
						</div></center>";
					}
					}
			  ?>
		      <form class="form-login" method="post" >
			  
		        <h2 class="form-login-heading" style="background-color:#4e69a2">Connexion</h2>
		        <div class="login-wrap">
				<label >
		            </label>
		            <input type="text" class="form-control" name="email" placeholder="Adresse e-mail" autofocus>
		            <br>
		            <input type="password" class="form-control" name="pseudo" placeholder="Mot de passe">
		             <label class="checkbox">
		                <span class="pull-right">
		                    <a href="pages2/mtoblie.php"> Mot de passe oublié?</a>
		                </span>
		            </label><br>
		            <button class="btn btn-primary btn-block" href="index.html" name="envoie" type="submit"><i class="fa fa-lock"></i> Connexion</button>
		            <label >
		            </label>
					<hr id='hr1'>
		            <div class="registration">
		                <a class="" href="pages2/compte.php">
		                    Créer un compte
		                </a>
		            </div>	
		        </div>
		      </form>	  	
			  <?php
			  if(isset($_POST['envoie'])){
				  if($_POST['email']=="admin@gmail.com" && $_POST['pseudo']=="admin"){
					  $_SESSION['auto']="Admin";
							 echo'<script>
							window.location.replace("pages/index.php");
							</script>';
						  
				      }
				
				  else if(!empty($_POST['pseudo']) && !empty($_POST['email'])){
					require "pages/outils/vendor/autoload.php";
					$client=new MongoDB\Client;
					$dbProjet=$client->dbProjet;
					$authentification=$dbProjet->authentification;   //  $_POST['email']=="admin@gmail.com"
				 
					 
					
					$util=$authentification->findOne(["email"=>$_POST['email']]);
					
					if(empty($util)){
							echo"<br><br><center><p style='width:380px; height:55px;' class='alert alert-warning' align='center'> <font size='3%'><strong>Erreur! &nbsp;</strong> email incorrect.</font></p></center>";
					
					}	
					
					else if($util['activate']==0){
					       echo"<br><br><center><p style='width:380px; height:55px;' class='alert alert-warning' align='center'> <font size='3%'><strong>Erreur! &nbsp;</strong> veuillez activer d'abord votre compte.</font></p></center>";
					}
					  else if($util['pseudo']==md5($_POST['pseudo'])){
						 $_SESSION['auto']=$util['codeActivate'];
						 
						 if($util['type']=="utilisateur"){
						    echo'<script>
							window.location.replace("pages2/index.php");
							</script>'; 

						 }
					     else if($util['type']=="admin"){
							 echo'<script>
							window.location.replace("pages/index.php");
							</script>';
						  
				      }}
					  else{
							echo"<br><br><center><p style='width:380px; height:55px;' class='alert alert-warning' align='center'> <font size='3%'><strong>Erreur! &nbsp;</strong> mot de passe incorrect. </font></p></center>";
					 
					  }
			  }
                  else	
					  echo"<br><br><center><p style='width:400px; ' class='alert alert-warning' align='center'> <font size='3%'><strong>Erreur! &nbsp;</strong> Veuillez remplire tous les champs. </font></p></center>";
			
			  }							
			  ?>
	  	</div>
	  </div>
	  </header>	</div>
    <script src="pages/outils/js/jquery.js"></script>
    <script src="pages/outils/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="pages/outils/js/jquery.backstretch.min.js"></script>
 
  </body>
</html>
