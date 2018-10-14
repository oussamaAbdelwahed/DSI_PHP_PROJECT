<!DOCTYPE html>
<html>
<head>
	<title>acceuil </title>

	<?php
     include 'inc/headerresources.php';
	?>
    <link rel="stylesheet" href="../styles/styleheader.css">
   
   <link rel="stylesheet" type="text/css" href="../styles/motdepasseoubliecss.css">
  <style type="text/css">

 
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
      }.inputs{
 font-size: 17px;
 padding-left: 10px;
       
        width: 100%;
      }#btn{
             width: 100%;
             border-radius: 0px;
             background-color: #009688;
             color: white;
             font-size: 18px;
             font-weight: bold;
      }#over{
        overflow-x: hidden;
      }

      #bulle{
        background-color: black;
        height: 3px;
        width: 100%;
        border-radius: 30px;
        color: black;
        background-color: #3F51B5;
         margin-left: -400px;

      }
      .an{
         animation: anim 2s linear  4;
       }
      @keyframes anim{
        from{
        margin-left: -400px;
          }to{
            margin-left: 600px;
          }
      }

     
  </style>

</head>
<body>
  <div class="container">
<div class="row">
<nav class="navbar navbar-fixed-top navbar-default">
<div class="navbar-header hidden-xs">

<a href="#" class="navbar-brand" style="color:white;">Be Social</a>

</div>
<div class="container">

<ul class="nav navbar-nav navbar-right nav-pills">

  <li><a href="http://localhost/projetDSI/view/index.php" style="color:white;">creér un compte</a></li>
  <li><a href="http://localhost/projetDSI/view/login.php" style="color:white;">se connecter</a></li>

</ul>

</div>

</nav>
</div>
<div class="row" style="margin-top: 140px;">
  <form class="form-horizontal col-lg-offset-4 col-lg-4 col-lg-offset-4 col-xs-offset-1 col-xs-10 col-xs-offset-1">
    <div class="form-group">
       <input type="hidden" name="email" value=<?php 
       if(isset($_GET['email']))
        echo "\"".$_GET['email']."\"";
      ?>>
      
      <input type="password" id="password" name="password" class="inputs" style="height: 40px;" placeholder="nouveau mot de passe">

    </div>
    <div class="form-group ">
      <input type="password" id="secondpassword" placeholder="retaper le mot de passe" name="confirmpassword" class="inputs" style="height: 40px;">

    </div>
     <div class="form-group ">
      <button type="submit" id="btn" class="btn btn-default">Valider</button>

    </div>
    <div class="form-group" id="over"><p id="bulle"></p></div>

  </form>
  <script type="text/javascript">
    
$('form').submit(function(){
      var form=new FormData(document.querySelector('form'));
      if($('#password').val()==$("#secondpassword").val()){
     $('#bulle').addClass('an');
    $.post({
       url:'http://localhost/projetDSI/controller/mains/changepassword.php',
       data:form,
       contentType:false,
       processData:false,
       success:function(){
         setTimeout(function(){
           window.location="http://localhost/projetDSI/view/login.php";
         },3000);
       }
    });
  }else{
    $('#secondpassword').css('border','solid 1px red');
    return false;
  }
     return false
});

  </script>

</div>
</div>
</body>
</html>
 </body>