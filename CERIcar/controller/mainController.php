<?php

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		$context->notification = "Vous êtes sur l'action helloWorld!"; 
		return context::SUCCESS;
	}


	public static function index($request,$context){
		
		$context->notification = "Vous êtes sur l'action index"; 
		return context::SUCCESS;
	}


	public static function superTest($request,$context)
	{
		$context->param1 = $request["param1"];
		$context->param2 = $request["param2"];
		$context->notification = "Vous êtes sur l'action superTest"; 
		return context::SUCCESS;
	}

	public static function testerModele($request,$context)
	{
		$context->testTrajet = trajetTable::getTrajet("Brest", "Amiens");

		$context->testVoyage = voyageTable::getVoyagesByTrajet("2");

		$context->testReservation = reservationTable::getReservationByVoyage("1");

		$context->testUtilisateur = utilisateurTable::getUserById("2");

		return context::SUCCESS;
	}

	public static function recherche($request,$context)
	{
		$context->notification = "Vous êtes sur l'action recherche"; 
		return context::SUCCESS;
	}

	public static function afficherVoyages($request,$context)
	{
		if (isset($request["depart1"]) and isset($request["arrivee1"]) and isset($request["nbPlace1"])){
			
			$context->depart = $request["depart1"];
			$context->arrivee = $request["arrivee1"];
			$context->nbPlace = $request["nbPlace1"];

			$context->idTrajet = trajetTable::getTrajet($context->depart, $context->arrivee);

			if($context->idTrajet != null){
				$context->voyage = voyageTable::getVoyagesByTrajet($context->idTrajet);	
				$context->corresp = voyageTable::getCorrespondancesByTrajet($context->idTrajet, $context->nbPlace);				
			}
			else {
				$context->notification = "Erreur! Le trajet n'existe pas";
				return context::ERROR;
			}	
		}

		$context->notification = "Recherche terminée";
		return context::SUCCESS;
	}

	public static function inscription($request,$context)
	{	
		if (isset($request["nom1"]) and isset($request["prenom1"]) and isset($request["pseudo1"]) and isset($request["mdp1"])){

			$nom = $request["nom1"];
			$prenom = $request["prenom1"];
			$pseudo = $request["pseudo1"];
			$mdp = $request["mdp1"];

			if (utilisateurTable::createUser($pseudo, $mdp, $nom, $prenom) == true){
				$context->notification = "Inscription terminée!";
			}
			else{
				$context->notification = "L'inscription a échoué";
				return context::ERROR; 
			}
		}
		else{
			$context->notification = "Vous êtes sur l'action inscription";
		}
		return context::SUCCESS; 
	}

	public static function connexion($request,$context)
	{
		$context->notification = "Vous êtes sur l'action connexion"; 
		return context::SUCCESS;
	}

	public static function deconnexion($request,$context)
	{
		session_unset();
		session_destroy();

		$context->notification = "Vous vous êtes deconnecté!"; 
		return context::SUCCESS;
	}

	public static function profil($request,$context)
	{
		if (isset($request["pseudo1"]) and isset($request["mdp1"])){

			$pseudo = $request["pseudo1"];
			$mdp = $request["mdp1"];

			$user = utilisateurTable::getUserByLoginAndPass($pseudo, $mdp);
			if ($user){

				$_SESSION['id'] = $user->id;
				$_SESSION['pseudo'] = $user->identifiant;
				$_SESSION['mdp'] = $user->pass;
				$_SESSION['nom'] = $user->nom;
				$_SESSION['prenom'] = $user->prenom;

				$context->notification = "Bienvenue ".$_SESSION['pseudo'].". Vous vous êtes connecté!"; 
				return context::SUCCESS;
			}
			else{
				$context->notification = "Erreur! Veuillez réessayer"; 
				return context::ERROR;
			}	
		}
		else if (isset($_SESSION['pseudo'])){
			$context->notification = "Vous êtes sur l'action profil"; 
			return context::SUCCESS;
		}
	}

	public static function reservation($request,$context)
	{

		if (isset($_SESSION["id"]) and isset($request["voyage1"])) {

			$voyage = $request["voyage1"];
			$voyageur = $_SESSION["id"];
			
			if (reservationTable::addReservation($voyage, $voyageur) == true){
				$context->notification = "Réservation effectuée!";
			}
			else{
				$context->notification = "La réservation a échoué";
			}
			return context::SUCCESS;
		}
		else{
			$context->notification = "Vous devez être connecté pour réserver!!"; 
			return context::ERROR;
		}	
	}


}
?>
