<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       <link rel="stylesheet" type ="text/css" href="css/index1.css"/>
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
       <script src="js/ajax.js"></script>

       <title>Recherche</title>
  </head>

  <body>

<?php if ($context->notification != null): ?>
    <div id="notif_rech" class="container">
    <div  class="panel panel-default">
      <div class="panel-heading font-weight-bold" style="background-color: #00bd56;"><strong>Notification</strong></div>
      <div id="notif_r" class="panel-body"><?php echo $context->notification; ?></div>
    </div>
    </div>
<?php endif; ?>


<h2 class="text-center" style="color: firebrick;"><em><u>Formulaire de recherche<u></em></h2>

<div class="container" id="formulaireR">
                  
        <form method="post" id="formuR">

              <div class="form-group row">
                <div class="col-md-3">
                </div>

                <div class="col-md-6">
                  <label for="depart">Depart</label>
                  <input class="form-control" placeholder="Ville de depart" type="text" name="depart" id="depart" required>
                </div>

                <div class="col-md-3">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                </div>

                <div class="col-md-6">
                  <label for="arrivee">Arrivée</label>
                  <input class="form-control" placeholder="Ville de d'arrivée" type="text" name="arrivee" id="arrivee" required>
                </div>

                <div class="col-md-3">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                </div>

                <div class="col-md-6">
                  <label for="nbPlace">Nombre de personnes</label>
                  <input class="form-control" placeholder="Combien de places?" type="number" name="nbPlace" id="nbPlace" required>
                </div>

                <div class="col-md-3">
                </div>
              </div> 

              <div class="form-group row">
                <div class="col-md-3">
                </div>

                <div class="col-md-6">
                  <button id="rech" type="submit" class="btn btn-primary">Rechercher</button>
                </div>

                <div class="col-md-3">
                </div>
              </div>          
        </form>
        <br>
</div>

<div id="msg"></div>



  </body>

</html>
