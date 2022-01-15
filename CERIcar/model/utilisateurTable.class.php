<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {

  public static function getUserByLoginAndPass($login,$pass)
	{
	  	$em = dbconnection::getInstance()->getEntityManager() ;

		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => $pass));	
		
		if ($user == false){
			//echo 'Erreur sql';
		}
		return $user; 
	}

	public static function getUserById($id)
	{
	  	$em = dbconnection::getInstance()->getEntityManager() ;

		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('id' => $id));	
		
		if ($user == false){
			//echo 'Erreur sql';
		}
		return $user; 
	}

	public static function createUser($pseudo, $mdp, $nom, $prenom)
	{
	  	$em = dbconnection::getInstance()->getEntityManager() ;

		$requete = "INSERT INTO jabaianb.utilisateur VALUES (DEFAULT, '$pseudo', '$mdp', '$nom', '$prenom')"; 

		$prep = $em->getConnection()->prepare($requete); 
		$prep->execute(); 

		if ($prep == true){
			return true;
		}
		return false;
	}
}


?>
