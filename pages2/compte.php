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
    <center>  <br><br><br><br><br><font size="6,8" color="#eea236"><b>Créer votre compte</b></font><br><br>
    <center >
    <form name="f" class="form-horizontal style-form" method="post" class="centre" >
      <br><br>
      <div class="form-group" style=" height: 40px; width:580px; ">
        <label class="col-sm-2 col-sm-2 control-label" style="width:200px;"><font color="white" size="4"><b>Prenom*</b></font></label>
        <input value="<?php if(isset($_POST['envoie'])){ echo $_POST['prenom'];} ?>" type="text" name="prenom" class="form-control" style="width:380px;">
      </div>
      <div class="form-group" style="height: 40px; width:580px; ">
        <label class="col-sm-2 col-sm-2 control-label" style="width:200px;"><font color="white" size="4"><b>Nom*</b></font></label>
        <input value="<?php if(isset($_POST['envoie'])){ echo $_POST['nom'];}?>" type="text" name="nom" class="form-control" style="width:380px;">
      </div>
      <div class="form-group" style="font-color: wieth; height: 40px; width:580px; ">
        <label class="col-sm-2 col-sm-2 control-label" style="width:200px;"><font color="white" size="4"><b>Addresse email*</b></font></label>
        <input type="text" name="email" class="form-control" style="width:380px;">
      </div>
      <div class="form-group" style="font-color: wieth; height: 40px; width:580px; ">
        <label class="col-sm-2 col-sm-2 control-label" style="width:200px;"><font color="white" size="4"><b>Mot de passe*</b></font></label>
        <input type="password" name="pseudo" class="form-control" style="width:380px;">
      </div>
      <div  style="height: 40px; width:480px; ">
        <div >
          <br><br>
          <input type="submit" name="envoie" value="Inscription" class="btn btn-primary"/>
          &nbsp;&nbsp;&nbsp;<input type="button" onclick="window.location.href='../login.php'" name="anul" value="Annuler"   class="btn btn-warning"/>
        </div>
      </div>
    </form>
    
    <?php
    if(isset($_POST['envoie'])){
    $champs_vide=array();
    
    if (empty($_POST['prenom'])){
    $champs_vide[]='- Saisser le prenom<br>';
    }
    
    if (empty ($_POST['nom'])){
    $champs_vide[]='- Saisser le nom<br>';
    }
    if (empty ($_POST['pseudo']))
    $champs_vide[]='- Saisser le mot de passe<br>';
    else if(strlen($_POST['pseudo'])<5)
    $champs_vide[]='- Mot de passe insuffisant<br>';
    
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $champs_vide[] = '- Email invalide ';
    $champs_mail[] = array();
    $champs_mail[] = "invalide";
    }
    if (empty ($champs_vide) && empty($champs_double) && empty($champs_mail)){
    require "outils/vendor/autoload.php";
    $client=new MongoDB\Client;
    $dbProjet=$client->dbProjet;
    $authentification=$dbProjet->authentification;
    $activate=0;
    $code="";
    for($i=1;$i<7;$i++)
    $code.=mt_rand(0,9);
    $emailTest=$authentification->findOne(["email"=>$_POST['email']]);
    
    if(empty($emailTest)){
    $auth=$authentification->insertOne(["type"=>"utilisateur","prenom"=>$_POST['prenom'],"nom"=>$_POST['nom'],"email"=>$_POST['email'],"pseudo"=>md5($_POST['pseudo']),"activate"=>$activate,"codeActivate"=>$code,"pathImage"=>"pers.png",'date'=>date("d-m-Y H:i:s")]);
    
    $to=$_POST['email'];
    $sujet='Confirmation de votre inscription au FS-Eljadida Plateforme ';
    
    $texte="
    <html  >
      <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>Bienvenue</title>
        <style type='text/css'>
        body {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        margin:0 !important;
        width: 100% !important;
        -webkit-text-size-adjust: 100% !important;
        -ms-text-size-adjust: 100% !important;
        -webkit-font-smoothing: antialiased !important;
        }
        .tableContent img {
        border: 0 !important;
        display: block !important;
        outline: none !important;
        }
        a{
        color:#382F2E;
        }
        p, h1{
        color:#382F2E;
        margin:0;
        }
        p{
        text-align:left;
        color:#999999;
        font-size:14px;
        font-weight:normal;
        line-height:19px;
        }
        a.link1{
        color:#382F2E;
        }
        a.link2{
        font-size:16px;
        text-decoration:none;
        color:#ffffff;
        }
        h2{
        text-align:left;
        color:#222222;
        font-size:19px;
        font-weight:normal;
        }
        div,p,ul,h1{
        margin:0;
        }
        .bgBody{
        background: #ffffff;
        }
        .bgItem{
        background: #ffffff;
        }
        
        @media only screen and (max-width:480px)
        
        {
        
        table[class='MainContainer'], td[class='cell']
        {
        width: 100% !important;
        height:auto !important;
        }
        td[class='specbundle']
        {
        width:100% !important;
        float:left !important;
        font-size:13px !important;
        line-height:17px !important;
        display:block !important;
        padding-bottom:15px !important;
        }
        
        td[class='spechide']
        {
        display:none !important;
        }
        img[class='banner']
        {
        width: 100% !important;
        height: auto !important;
        }
        td[class='left_pad']
        {
        padding-left:15px !important;
        padding-right:15px !important;
        }
        
        }
        
        @media only screen and (max-width:540px)
        {
        
        table[class='MainContainer'], td[class='cell']
        {
        width: 100% !important;
        height:auto !important;
        }
        td[class='specbundle']
        {
        width:100% !important;
        float:left !important;
        font-size:13px !important;
        line-height:17px !important;
        display:block !important;
        padding-bottom:15px !important;
        }
        
        td[class='spechide']
        {
        display:none !important;
        }
        img[class='banner']
        {
        width: 100% !important;
        height: auto !important;
        }
        .font {
        font-size:18px !important;
        line-height:22px !important;
        
        }
        .font1 {
        font-size:18px !important;
        line-height:22px !important;
        
        }
        }
        </style>
        <script type='colorScheme' class='swatch active'>
        {
        'name':'Default',
        'bgBody':'ffffff',
        'link':'382F2E',
        'color':'999999',
        'bgItem':'ffffff',
        'title':'222222'
        }
        </script>
      </head>
      <body paddingwidth='0' paddingheight='0'   style='padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
        <table bgcolor='#ffffff' width='100%' border='0' cellspacing='0' cellpadding='0' class='tableContent' align='center'  style='font-family:Helvetica, Arial,serif;'>
          <tbody>
            <tr>
              <td><table width='600' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#ffffff' class='MainContainer'>
                <tbody>
                  <tr>
                    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tbody>
                        <tr>
                          <td valign='top' width='40'>&nbsp;</td>
                          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                              
                              <tr>
                                <td height='75' class='spechide'></td>
                                
                              </tr>
                              <tr>
                                <td class='movableContentContainer ' valign='top'>
                                  <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                      <tbody>
                                        <tr>
                                          <td height='35'></td>
                                        </tr>
                                        <tr>
                                          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tbody>
                                              <tr>
                                                <td valign='top' align='center' class='specbundle'><div class='contentEditableContainer contentTextEditable'>
                                                  <div class='contentEditable'>
                                                    <p style='text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#222222;'><span class='specbundle2'><span class='font1'>Bienvenue  </span></span></p>
                                                  </div>
                                                </div></td>
                                                <td >
                                                  <br><br><br> <center>  <p style='text-align:left;margin-left:0; font-family:Georgia,Time,sans-serif;font-size:26px;color:#1A54BA;'> FS-Eljadida Plateforme &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center>
                                                  
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <br><br><br>
                                <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
                                  <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
                                    <tr><td height='55'></td></tr>
                                    <tr>
                                      <td align='left'>
                                        <div class='contentEditableContainer contentTextEditable'>
                                          <div class='contentEditable' align='center'>
                                            <h2 >Bonjour&nbsp;<span style='color:#222222;'>" .$_POST['nom'].",</span></h2>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr><td height='15'> </td></tr>
                                    <tr>
                                      <td align='left'>
                                        <div class='contentEditableContainer contentTextEditable'>
                                          <div class='contentEditable' align='center'>
                                            <p >
                                              Nous sommes très heureux de vous compter parmi nos inscrits et nous vous souhaitons
                                              
                                              un très bon parcourt et une bonne expérience dans notre plateforme.
                                              <br>
                                              <br>
                                              Equipe de notre plateforme vous souhaite bienvenu.
                                              <br>
                                            </p>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr><td height='55'></td></tr>
                                    <tr>
                                      <td align='center'>
                                        <table>
                                          <tr>
                                            <td align='center' bgcolor='#1A54BA' style='background:#1A54BA; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>
                                              <div class='contentEditableContainer contentTextEditable'>
                                                <div class='contentEditable' align='center'>
                                                  <a title='Cliquez ici pour activer votre compte' target='_blank' href='localhost/phpmongodb/login.php?code=".urlencode($code)."' class='link2' style='color:#ffffff;'>Activer mon compte</a>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr><td height='20'></td></tr>
                                  </table>
                                </div>
                                <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
                                  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                    <tbody>
                                      <tr>
                                        <td height='65'>
                                        </tr>
                                        <tr>
                                          <td  style='border-bottom:1px solid #DDDDDD;'></td>
                                        </tr>
                                        <tr><td height='25'></td></tr>
                                        <tr>
                                          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tbody>
                                              <tr>
                                                <td valign='top' class='specbundle'><div class='contentEditableContainer contentTextEditable'>
                                                  <div class='contentEditable' align='center'>
                                                    <p  style='text-align:left;color:#CCCCCC;font-size:12px;font-weight:normal;line-height:20px;'>
                                                      <span style='font-weight:bold;'>FS-Eljadida Plateforme</span>
                                                      <br>
                                                      +212600000000
                                                      <center><span style='font-weight:bold;'> Université Chouaïb Doukkali<br>
                                                      Faculté des Sciences d'El Jadida</span> </center>
                                                    </p>
                                                  </div>
                                                </div></td>
                                                <td valign='top' width='30' class='specbundle'>&nbsp;</td>
                                                <td valign='top' class='specbundle'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr><td height='88'></td></tr>
                                  </tbody>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                    <td valign='top' width='40'>&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
</tbody>
</table>
</body>
</html>
";
require 'outils/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail ->SetFrom('fsj.plateforme@gmail.com');
$mail->FromName = 'FS-Eljadida Plateforme';
$mail ->IsSmtp();
$mail ->SMTPDebug = 0;
$mail ->SMTPAuth = true;
$mail ->SMTPSecure = 'ssl';
$mail ->Host = "smtp.gmail.com";
$mail ->Port = 465; // or 587
$mail ->IsHTML(true);
$mail ->Username = "fsj.plateforme@gmail.com";
$mail ->Password = "fseljadidaplateforme";
$mail ->Subject = $sujet;
$mail ->Body = $texte;
$mail ->AddAddress($to);
//if($mail->Send())
//{
echo"<br><br><br><center ><div style='width:400px;' class='alert alert-success' style='width:350px;'>  <h4 class='alert-heading'><b>Félicitation votre compte est bien crée.</b></h4>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><br>
<p class='mb-0' align='left'>- vous avez reçu un mail pour activer votre compte.</p><a href='../login.php?code=".$code."'>Confirmez votre compte! </a></div>
</center>";
//}
}
else{
echo"<br><br><br><center ><div style='width:350px;' class='alert alert-danger' style='width:350px;'>  <h4 class='alert-heading'><b>Merci de recommencer.</b></h4>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><br>
<p class='mb-0' align='left'>- Cette adresse email est déjà enregistrée.</p></div>
</center>";
}
}
else {
if (!empty($champs_vide)){
echo"<br><br><br><center ><div style='width:350px;' class='alert alert-danger' style='width:350px;'>  <h4 class='alert-heading'><b>Merci de recommencer.</b></h4>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
<p class='mb-0' align='left'>" .implode($champs_vide). "</p></div>
</center>";
}
}
}
?>         </center>
</div>
</center>
</header> </div>
<script src="outils/js/jquery.js"></script>
<script src="outils/js/bootstrap.min.js"></script>
<script type="text/javascript" src="outils/js/jquery.backstretch.min.js"></script>
</body>
</html>