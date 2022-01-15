

<p>La distance entre <?php echo $context->testTrajet->depart; ?> et <?php echo $context->testTrajet->arrivee; ?>: <?php echo $context->testTrajet->distance; ?></p>


<p>Les voyages du trajet n°2:<br>

	<?php foreach ($context->testVoyage as $v): ?><br>
		Conducteur: <?php echo $v->conducteur->nom." ".$v->conducteur->prenom; ?><br>
		Depart: <?php echo $v->trajet->depart; ?><br>
		Arrivee: <?php echo $v->trajet->arrivee; ?><br>
		Distance: <?php echo $v->trajet->distance; ?><br>
		Tarif: <?php echo $v->tarif; ?><br>
		Nombre de places: <?php echo $v->nbplace; ?><br>
		Heure de depart: <?php echo$v->heuredepart; ?><br>
	<?php endforeach; ?>
</p>


<p>Les reservations du voyage n°1:<br>

	<?php foreach ($context->testReservation as $r): ?><br>
		Tarif: <?php echo $r->voyage->tarif; ?><br>
		Heure de depart: <?php echo $r->voyage->heuredepart; ?><br>
		Voyageur: <?php echo $r->voyageur->nom." ".$r->voyageur->prenom; ?><br>
	<?php endforeach; ?>
</p>


<p>Utilisateur n°2: <br>
	Nom: <?php echo $context->testUtilisateur->nom; ?> <br>
	Prenom: <?php echo $context->testUtilisateur->prenom; ?> <br>
</p>
