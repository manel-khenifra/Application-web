<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       <link rel="stylesheet" type ="text/css" href="css/index1.css"/>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>     
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
       <script src="js/ajax.js"></script>
  </head>

  <body>

<?php if ($context->notification != null): ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading font-weight-bold" style="background-color: #00bd56;"><strong>Notification</strong></div>
        <div class="panel-body"><?php echo $context->notification; ?></div>
    </div>
</div>
<?php endif; ?>


<div class="container" id="services">

      <div class="row">
          <div class="col-lg-12 text-center">
              <h1 class="text-uppercase"><strong>Profil</strong></h1>
          </div>
      </div>

      <div class="row">
          
          <div class="col-md-3">
          </div>
          
          <div class="col-md-6">
              <span class="fa-stack fa-5x">
                  <i class="fa fa-circle fa-stack-2x" style="color:royalblue;"></i>
                  <i class="fa fa-user fa-stack-1x" style="color:white;"></i>
              </span>
              <br>
              <br>
              <div class="row">
      
                  <p><?php echo "<b>Identifiant</b>: ".$_SESSION["pseudo"]; ?></p>
                  <p><?php echo "<b>Nom</b>: ".$_SESSION["nom"]; ?></p>
                  <p><?php echo "<b>Prénom</b>: ".$_SESSION["prenom"]; ?></p>
              </div> 
          </div>
          
          <div class="col-md-3">
          </div>
    </div>

    <div class="row">
        <br>
        <br>
        <br>
    </div>

</div>

  </body>

</html>
