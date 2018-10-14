<?php
include '../controller/classes/traitsecuredata.php';
include '../controller/classes/user.php';
include '../controller/classes/savableinterface.php';
include '../model/databaseconnection.php';
include '../model/usermanager.php';
session_start();
if(isset($_SESSION['user'])){
$userinfo=UserManager::getUserByEmail($_SESSION['user']->getEmail());
  if(isset($_SESSION['friend']) AND !empty($_SESSION['friend'])){
    unset($_SESSION['friend']);

  }
?>
<!DOCTYPE html>

<html>
<head>
	<title>profile be social</title>
	  <link rel="stylesheet" href="../styles/styleheader.css">
  <?php
     include 'inc/headerresources.php';
  ?>
  <style type="text/css">
     body{
        background-color: rgba(221,224,223,0.4);
      }
    .dropdown {text-align:center;}
    .button, .dropdown-menu {margin:10px auto}
    .dropdown-menu {width:200px; left:50%; margin-left:-100px;}
    #dr{
      text-align: unset;
    }
    #drmenu{
      width: unset;left: unset;margin-left: unset;
      }.divcommenters{
        padding-left: 10px;
        padding-right: 10px;
      }.parentimageandname{
        padding-right: 30px;
      }select{
        width: 75px;
      }.data{
        font-size: 15px;
        font-weight: bold;
      }.titleinfo{
        color: black;
        font-family: arial;
      }#newphoto{
        display: none;
      }#showpassword{
        cursor: pointer;
      }#labelimage{
         margin-top: 7px;
         font-size: 17px;
         color: black;
        cursor: pointer;
      }

  </style>
</head>
<body>
<?php 
include "inc/remplirdatenaissance.php";
$remplissageOptions=new RemplissageOptions();
?>
	<div class="container-fluid">
    <input type="hidden" id="prenom" value=<?php echo "\"".$_SESSION['user']->getPrenom()."\"";?>>
    <input type="hidden" name="" id="hiddenemail" value=<?php echo "\"".$_SESSION['user']->getEmail()."\"";?>>
     <?php include'inc/header.php';?>
     <div class="row" style="margin-top:80px;"> 
     
      <div class="col-lg-5 col-xs-12 ">
       <table class="table table-stripped" style="background-color: white;">
         <h2  style="color:black;font-family: arial;margin-bottom: 30px;">Paramétres</h2>
         <tr>
           <td class="titleinfo">Nom</td>
           <td class="data"><?php echo $userinfo['nom']; ?></td>
           <td><span class="icon-pencil editinfo edittext pull-right"></span><span class="icon-ok-circle validinfo validtext pull-right" data="nom"></span></td>
          </tr>
          <tr>
           <td class="titleinfo">Prenom</td>
           <td class="data"><?php echo $userinfo['prenom']; ?></td>
           <td><span class="icon-pencil editinfo  edittext pull-right"></span><span class="icon-ok-circle validinfo validtext pull-right" data="prenom"></span></td>
           </tr>
           <tr>
            <td class="titleinfo">Mot pe passe</td>
            <td>
              <div class="input-group pull-right">
                 <input  type="password" id="password" autocomplete="off" name="password" class="form-control">
                 <span class="input-group-addon" id="showpassword"><span class="glyphicon glyphicon-eye-open" ></span></span>
               </div>
               <p id="erpass"></p>
           </td>
             <td><span class="icon-ok-circle validinfo validpassword pull-right" data="password"></span></td>
           </tr>
           <tr>
            <td class="titleinfo">Sex</td>
            <td><select id="forsex"><option selected="selected" name="h" value="h">Homme</option><option value="f" name="f">Femme</option></select></td>
            <td><span class="icon-ok-circle validinfo validsex pull-right"></span></td>
           </tr>
           <tr>
             <td class="titleinfo">Date Naissance</td>
             <td> 
              <select id="jours"  name="jours" id="jours">
                    <option selected="selected" value="j">Jours</option>
                   <?php $remplissageOptions->remplirJours();?>
              </select>
             <select  id="mois" name="mois" id="mois">
                    <option selected="selected" value="m">Mois</option>
                    <?php $remplissageOptions->remplirMois();?>
             </select>
             <select id="annee" name="annee" id="annee">
                    <option selected="selected" value="a">Annee</option>
                   <?php $remplissageOptions->remplirAnnee();?>
             </select></td>
             <td><span class="icon-ok-circle validinfo validbirthday pull-right"></span></td>
           </tr>

           <tr>
             <td class="titleinfo">Photo</td>
             <td><img id="re" style="height: 40px; width: 50px;" src=<?php echo "\"".$userinfo['photo']."\""; ?>><form enctype="multipart/form-data" method="POST"><label for="newphoto"><i class="icon-folder-open-alt" id="labelimage"></i></label><input id="newphoto" type="file" name="file"></form></td>
             <td><span class="icon-ok-circle validinfo pull-right validimage"></span></td>
           </tr>
       </table>
     </div>
      </div>
    </div>
    <div id="im"></div>
    <script type="text/javascript" src="../scripts/scriptpageparametres.js"></script>
  </body>
</html>
<?php }else{
            header("Location:login.php");
      }
?>

