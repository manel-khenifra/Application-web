<?php
// Inclusion de la classe voyage
require_once "voyage.class.php";

class voyageTable {

	public static function getVoyagesByTrajet($trajet)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;

		$voyageRepository = $em->getRepository('voyage');
		$voyage = $voyageRepository->findBy(array('trajet' => $trajet));	
	
		if ($voyage == false){
			//echo 'Erreur sql';
		}
		return $voyage; 
	}

	public static function getCorrespondancesByTrajet($trajet, $places)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;

		$requete = "SELECT *FROM recherche('$trajet->depart', '$trajet->arrivee', '$places')"; //fonction sql
		
		$prep = $em->getConnection()->prepare($requete); //préparation de la requête	
		$prep->execute(); //execution de la requête	
		$res = $prep->fetchAll(); //on récupere un tableau contenant toutes les lignes

		if ($res != null and !empty($res)){

			$array = array();
			foreach ($res as $ligne1){ 
				if ($ligne1["v_corresp"] > 0){ //on s'intéresse aux correspondances
		     
	              	$correspondance_id = $ligne1["parcours_id"]; //chaîne de caractères contenant les IDs de voyage du parcours
	              	$string_id = explode(" ", $correspondance_id); //on scinde la chaîne de caractères en segments
	                 
	                $aff = true;                  	        
	            	for ($i = 0; $i < count($string_id); $i++){ //on parcourt le tableau contenant les IDs
	              		
	                    $id = $string_id[$i]; 
	                	               		
	               		$requete2 = "SELECT* FROM jabaianb.voyage JOIN jabaianb.trajet ON jabaianb.trajet.id = jabaianb.voyage.trajet JOIN jabaianb.utilisateur ON jabaianb.voyage.conducteur = jabaianb.utilisateur.id WHERE (jabaianb.voyage.id = '$id')"; //on récupere les informations nécessaires du voyage

	                    $prep2 = $em->getConnection()->prepare($requete2); //préparation de la requête	 
						$prep2->execute(); //execution de la requête	 
						$res2 = $prep2->fetch(); //on récupere une ligne de résultat sous la forme d'un tableau

						if (empty($res2)):
	                    	$aff = false; //si une ligne est vide, on empêche l'affichage de la correspondance
	                    endif;
						
	                    if ($aff == true){ //on récupere l'heure d'arr, le nb de correspondances, la distance totale et le tarif total.
	                    	 
	                    	$res2["heure_arr"] = $res2["heuredepart"]+intdiv($res2["distance"], 60);           		                
	                    	
	                    	$res2["v_corresp"] = $ligne1["v_corresp"];
	                    	$res2["v_dist"] = $ligne1["v_dist"];
	                    	$res2["v_tarif"] = $ligne1["v_tarif"];
	                    	
	                    	array_push($array, $res2); //on ajoute notre résultat dans le tableau qu'on va retourner          
	                    }
	                }
			    }
			} 
			return $array;
		}
		else{
			return null;
		}	 
	}
}