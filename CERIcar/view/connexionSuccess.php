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

       <title>Connexion</title>
  </head>

  <body>

<?php if ($context->notification != null): ?>
    <div class="container">
    <div  class="panel panel-default">
      <div class="panel-heading font-weight-bold" style="background-color: #00bd56;"><strong>Notification</strong></div>
      <div class="panel-body"><?php echo $context->notification; ?></div>
    </div>
    </div>
<?php endif; ?>



<h2 class="text-center" style="color: firebrick;"><em><u>Connexion<u></em></h2>

<div class="container" id="formulaireC">
                  
        <form method="post" id="formuC">

              <div class="form-group row">
                <div class="col-md-3">
                </div>

                <div class="col-md-6">
                  <label for="pseudo">Pseudo</label>
                  <input class="form-control" placeholder="Pseudo" type="text" name="pseudo" id="pseudo" required>
                </div>

                <div class="col-md-3">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                </div>

                <div class="col-md-6">
                  <label for="mdp">Mot de passe</label>
                  <input class="form-control" placeholder="Mot de passe" type="password" name="mdp" id="mdp" required>
                </div>

                <div class="col-md-3">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-4">
                </div>

                <div class="col-md-4">
                  <button id="connexion" type="submit" class="btn btn-primary">Se connecter</button>
                </div>

                <div class="col-md-4">
                </div>
              </div>          
        </form>
        <br>
</div>

 </body>

</html>