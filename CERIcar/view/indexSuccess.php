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

       <title>
          CERI CAR
       </title>

  </head>

  <body>
  	
       <div class="container">
      <div class="row">
    <h1 class="text-info text-center"><em>Bienvenue dans l'application CERI CAR !</em></h1>
        <?php if($context->getSessionAttribute('user_id')): ?>
        <?php echo $context->getSessionAttribute('user_id')." est connecte"; ?>
        <?php endif; ?>
      </div>
    </div>

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
      	<br>
      	<br>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="text-uppercase"><strong>Services</strong></h1>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
        	<span class="fa-stack fa-5x">
  				  <i class="fa fa-circle fa-stack-2x" style="color:royalblue;"></i>
  				  <i class="fa fa-car fa-stack-1x" style="color:white;"></i>
			    </span>
        <h2>Covoiturage</h2>
          <p><em>Nous vous proposons la liste des voyages disponibles selon votre recherche.</em></p>
        </div>
        <div class="col-md-3">
        </div>
      </div>
      <div class="row">
      	<br>
      	<br>
      </div>
    </div>


  </body>

</html>