
 <input type="hidden" id="prenom" value=<?php echo "\"".$_SESSION['user']->getPrenom()."\"";?>>
 <nav class="navbar navbar-fixed-top navbar-default" style="border-bottom:none;">
   <?php 
          $urlimage=$prenom=$id="";
           if(isset($_SESSION['user']) AND !empty($_SESSION['user'])){ 
                  $urlimage=$_SESSION['user']->getPhoto();
                  $prenom=$_SESSION['user']->getPrenom();
                  $id=$_SESSION['user']->getId_user();
          }
?>
  <div class="container" >

    <div class="navbar-header">
         <a class="navbar-brand" href="#" id="logo" style="color:white;font-size: 36px;">Be Social</a>
    </div>

    <ul class="nav navbar-nav navbar-right visible-xs" style="margin-top: 0px;">
         <li class="dropdown" id="dr"><a class="dropdown-toggle pull-right list-item" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-menu-hamburger" style="color: white;font-size: 30px;"></span></a>
             <ul class="dropdown-menu" id="drmenu">
              <li><a href="acceuil.php" style="font-size: 15px;color:white;"><i class="icon-home"></i> Acceuil</a></li>
              <li><a style="font-size: 15px;color:white;" href="profile.php"><i class="icon-user"></i> Profile</a></li>
              <li><a style="font-size: 15px;color:white;" href="invitations.php"><i class="icon-group"></i> Invitations</a></li>
                <li><a style="font-size: 15px;color:white;" href="parametres.php"><i class="icon-cog"></i> Paramétres</a> </li>
              <li><a style="font-size: 15px;color:white;" href="deconnection.php"><i class="icon-off"></i></span> Deconnection</a></li>
         </ul></li>
    </ul>
 
    <ul class="nav navbar-nav pull-right hidden-xs">
            <li><a href="acceuil.php" data-toggle="tooltip" title="acceuil"><i class="icon-home navi" id="home"></i></a></li>
            <li><div class="dropdown" style="margin-top:15px;margin-right: 15px;">
             <i class="icon-group navi dropdown-toggle" data-toggle="dropdown" ></i>
             <ul class="dropdown-menu" style="margin-top: 17px;margin-right:40px;" id="placetoappendinvitations">
              <h5 class="text-center">Aucune Invitation</h5>

             </ul>
             <span class="badge" id="nbrinvitations"></span>
            </div></li>
           
            <li><div class="dropdown" style="margin-top:14px;">
                  <i class="icon-cog navi dropdown-toggle" data-toggle="dropdown" ></i>
                  <ul class="dropdown-menu" style="margin-top: 19px;">
                     <li><a href="http://localhost/projetdsi/view/deconnection.php">deconnection</a></li>
                     <li><a href="parametres.php">Paramétres compte</a></li>
                 </ul>
          </div></li>
    </ul>

        <a href="profile.php"   id=<?php echo "\"".$id."\"";?>  data-toggle="tooltip" title="profile" class="lienimagecontainer pull-right hidden-xs navbar-left sessionid" ><img id="profilephoto1"  src=<?php
                 if(isset($urlimage))
                  echo "\"".$urlimage."\"";?>/>
               <?php echo "<strong id='sessionprenom' style='color:white;'>".$prenom."</strong>"; ?> 
                 </a> 
  </div>
</nav>
  
    <div class="row">
      <div class="col-xs-offset-8 col-xs-4">
        <div class="row" id="margetop">
          <div id="wrapper">
          <div class="col-xs-10">
            <CENTER><div class="fleche_haut"></div></CENTER>
          </div>
        <div class="col-xs-12" id="messagediv">Oussama Abdelwahed<br><p>ksqjd</p><p>Abdelwahed Oussamaa </p>
        </div>
      </div>
        </div>
      </div>
    </div>


<!-- Nouveau navbar  -->






<!-- Fin du navbar -->
<!-- 
    <script type="text/javascript" src="http://localhost/projetdsi/bootstrap/js/jquery.js"></script>
     
    <script type="text/javascript" src="http://localhost/projetdsi/bootstrap/js/bootstrap.js"></script> -->

    <script type="text/javascript" src="http://localhost/projetdsi/scripts/stylingprofile.js"></script>

 