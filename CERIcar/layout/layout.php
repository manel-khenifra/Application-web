<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       <link rel="stylesheet" type ="text/css" href="css/index1.css"/>
      
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
       <script src="js/ajax.js"></script>

  </head>

  <body>

<header>
<nav class="navbar navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-info" href="#">CERIcar</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a id="accueil" class="text-primary"><span class="glyphicon glyphicon-home"></span>Accueil</a></li>
      <li><a id="voyage" class="text-info"><span class="glyphicon glyphicon-globe"></span>Voyage</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a id="pageInscription" class="text-info" href="#"><span class="glyphicon glyphicon-pencil"></span> S'inscrire</a></li>
        <li><a id="pageConnexion" class="text-info" href="#"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
        <li id="menu_profil"></li>
        <li id="menu_deco"></li>
    </ul> 
  </div>
  <img src="images/cericar.png" alt="-Photo de couverture-" style="height: 300px; width: 100%; overflow: hidden; object-fit: cover;">
</nav>

</header>
    
    
    <div class="container" id="page">
      <?php if($context->error): ?>
      	<div id="flash_error" class="error">
        	<?php echo " $context->error !!!!!" ?>
      	</div>
      <?php endif; ?>

      <div class="row" id="page_maincontent">	
      	  <?php include($template_view); ?>
      </div>
    </div>
      

<footer class="text-primary" style="background-color: black;">
<div class="container">
  <div class="row">
    <div class="col-md-9 text-center">
    <strong>© Centre d'Enseignement et de Recherche en Informatique - Université d'Avignon, 2019</strong>
    </div>
    <div class="col-md-3 text-right">
      <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-up"></span>Haut de page</a>
    </div>
  </div>
</div>
</footer>


  </body>

</html>
