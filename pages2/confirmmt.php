<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['auto'])){
require "outils/vendor/autoload.php";
$client=new MongoDB\Client;
$dbProjet=$client->dbProjet;
$authentification=$dbProjet->authentification;
$docs=$authentification->findOne(["codeActivate"=>$_SESSION['auto']]);
if($docs["type"]=="utilisateur"){
echo'<script>
window.location.replace("index.php");
</script>';
}
else {
echo'<script>
window.location.replace("../pages/index.php");
</script>';
}
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
    
    <link rel="stylesheet" type="text/css" href="outils/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="outils/css/style1.css" />
    <script type="text/javascript" src="outils/js/modernizr.custom.86080.js"></script>
    <style>
    div.centre {
    position:absolute;
    left: 10%;
    top: 10%;
    
    } </style>
  </head>
  <body>
    <ul class="cb-slideshow">
      <li><span></span></li>
      <li><span></span></li>
      <li><span></span></li>
      <li><span></span></li>
      <li><span></span></li>
      <li><span></span></li>
    </ul><div><header>  <div class="container">
    <center>  <br><br><br><br><br><br><br><br><font size="6,8" color="#eea236"><b>Mot de passe oublié</b></font><br><br>
    <center >
    <form name="f" class="form-horizontal style-form" method="post" class="centre" >
      <br><br><br>
      <div class="form-group" style=" height: 40px; width:600px; ">
        <label class="col-sm-2 col-sm-2 control-label" style="width:280px;"><font color="white" size="4"><b>Nouveau mot de passe*</b></font></label>
        <input  type="password" name="pass1" class="form-control" style="width:320px;">
      </div>
      <div class="form-group" style="height: 40px; width:600px; ">
        <label class="col-sm-2 col-sm-2 control-label" style="width:280px;"><font color="white" size="4"><b>Confirmer le mot de passe*</b></font></label>
        <input   type="password" name="pass2" class="form-control" style="width:320px;">
      </div>
      <div  style="height: 40px; width:480px; ">
        <div >
          <br>
          <input type="submit" name="envoie" value="Continuer" class="btn btn-primary"/>
          &nbsp;&nbsp;&nbsp;<input type="button" onclick="window.location.href='../login.php'" name="anul" value="Annuler"   class="btn btn-warning"/>
        </div>
      </div>
    </form>
    
    <?php
    
                  if(isset($_POST['envoie'])){
                    if(!empty($_GET['code'])){
                      $code=$_GET['code'];
                    if(!empty($_POST['pass1'])){
                  if( $_POST['pass1']==$_POST['pass2']){
                    if( strlen($_POST['pass1'])>5){
                  require "outils/vendor/autoload.php";
                  $client=new MongoDB\Client;
                  $dbProjet=$client->dbProjet;
                    $authentification=$dbProjet->authentification;
                  $docs=$authentification->updateOne(['codeActivate'=>$code],['$set'=>['pseudo'=>md5($_POST['pass1'])]]);
                
    echo'<script>
                  window.location.replace("../login.php");
    </script>';
    }else{
    echo"<br><br><br><center><p style='width:400px; height:55px;' class='alert alert-danger' align='center'> <font size='3%'><strong>Erreur! &nbsp;</strong> Le mot de passe est insuffisant. </font></p></center>";
    
    }
    }else{
    echo"<br><br><br><center><p style='width:460px; height:55px;' class='alert alert-danger' align='center'> <font size='3%'><strong>Erreur! &nbsp;</strong> Les deux mots de passe ne sont pas identiques. </font></p></center>";
    
    }
    
    }}
    else{
    echo"<br><br><br><center><p style='width:420px; height:55px;' class='alert alert-danger' align='center'> <font size='3%'><strong>Erreur! &nbsp;</strong>Veuillez consulter d'abord votre boite mail ! </font></p></center>";
    
    }}
    
    ?>
    </center>
  </div>
  </center>
</header> </div>
<script src="outils/js/jquery.js"></script>
<script src="outils/js/bootstrap.min.js"></script>
<script type="text/javascript" src="outils/js/jquery.backstretch.min.js"></script>
</body>
</html>