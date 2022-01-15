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
  </head>

  <body>

<div class="container">
    <h2 class="text-info">Liste des voyages disponibles:</h2>

<?php if($context->voyage != null): $aff1 = true; ?>

    <h3 class="text-info">Voyages directs:</h2>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Conducteur</th>
            <th>Départ</th>
            <th>Heure depart</th>
            <th>Arrivée</th>
            <th>Heure d'arrivée</th>
            <th>Distance</th>
            <th>Tarif</th>
            <th>Places</th>
            <th>Contraintes</th>
            <th></th>
          </tr>
        </thead>
    
        <tbody>   
      <?php foreach($context->voyage as $v): //affichage des voyages directs 
              $v_heure_arr = $v->heuredepart+intdiv($v->trajet->distance, 60);

              if (is_object($v->conducteur) and $v->heuredepart != 0 and $v_heure_arr <= 24 and $v->trajet->distance <= 1440 and $v->nbplace >= $context->nbPlace): ?>
        <tr>   
           <td><?php echo $v->conducteur->nom." ".$v->conducteur->prenom; ?></td>
           <td><?php echo $v->trajet->depart; ?></td>
           <td><?php echo $v->heuredepart."h"; ?></td>
           <td><?php echo $v->trajet->arrivee; ?></td>
           <td><?php echo $v_heure_arr."h"; ?></td>
           <td><?php echo $v->trajet->distance."km"; ?></td>
           <td><?php echo $v->tarif." €"; ?></td>            
           <td><?php echo $v->nbplace; ?></td>    
           <td><?php if ($v->contraintes != "") echo $v->contraintes; ?></td>
              
               <input type="hidden" id="voyage" value="<?php echo $v->id; ?>" > 
           <td><button id="reserver" class="btn btn-primary">Réserver</button></td>
           
        </tr>

        <tr>
          <td><?php echo "<br>"; ?></td> 
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr> 

        <?php endif; 
          endforeach; ?> 
        
        </tbody>
    </table>
<?php else: 
        $aff1 = false; 
      endif; 

      if($context->corresp != null): $aff2 = true; ?>

        <h3 class="text-info">Correspondances:</h2>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Conducteur</th>
              <th>Départ</th>
              <th>Heure depart</th>
              <th>Arrivée</th>
              <th>Heure d'arrivée</th>
              <th>Distance</th>
              <th>Tarif</th>
              <th>Places</th>
              <th>Contraintes</th>
            </tr>
          </thead>
          
          <tbody> 
          <?php foreach($context->corresp as $c): //affichage des correspondances ?>
                     
            <tr>  
               <td><?php echo $c["nom"]." ".$c["prenom"]; ?></td>
               <td><?php echo $c["depart"]; ?></td>
               <td><?php echo $c["heuredepart"]."h"; ?></td>
               <td><?php echo $c["arrivee"]; ?></td>
               <td><?php echo $c["heure_arr"]."h"; ?></td>
               <td><?php echo $c["distance"]."km"; ?></td>
               <td><?php echo $c["tarif"]."€"; ?></td>   
               <td><?php echo $c["nbplace"]; ?></td>               
               <td><?php if ($c["contraintes"] != "") echo $c["contraintes"]; ?></td>
            </tr>    
                   <?php if ($c["arrivee"] == $context->arrivee): //affichage d'un récapitulatif à la fin de la correspondance?> 
                      
                        <tr>
                          <th class="text-info">Récapitulatif</th>
                          <th class="text-info">Départ</th>
                          <th class="text-info">Arrivée</th>
                          <th class="text-info">Correpondance</th>
                          <th class="text-info">Distance</th>
                          <th class="text-info">Tarif</th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                         
                        <tr>
                          <td></td>
                          <td><?php echo $context->depart; ?></td>
                          <td><?php echo $context->arrivee; ?></td>
                          <td><?php echo $c["v_corresp"]; ?></td>        
                          <td><?php echo $c["v_dist"]."km"; ?></td>
                          <td><?php echo $c["v_tarif"]."€"; ?></td>
                          <td><button id="reserver" class="btn btn-primary">Réserver</button></td>
                          <td></td>
                          <td></td>
                        </tr>                         
                        
                        <tr>
                          <td><?php echo "<br>"; ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>  

                   <?php endif;           
                endforeach; ?> 
    </tbody>
  </table>
<?php else: 
        $aff2 = false; 
      endif;


      if ($aff1 == false and $aff2 == false): ?>
        <div class="row">
            <?php echo "Aucun voyage disponible.."; ?>
        </div>
<?php endif; ?>

</div>

  </body>

</html>
