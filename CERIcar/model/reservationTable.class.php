<?php
// Inclusion de la classe reservation
require_once "reservation.class.php";

class reservationTable {

	public static function getReservationByVoyage($voyage)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;

		$reservationRepository = $em->getRepository('reservation');
		$reservation = $reservationRepository->findBy(array('voyage' => $voyage));	
	
		if ($reservation == false){
			//echo 'Erreur sql';
		}
		return $reservation; 
	} 

	public static function addReservation($voyage, $voyageur)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;

		$requete = "INSERT INTO jabaianb.reservation VALUES (DEFAULT, '$voyage', '$voyageur')"; 
	
		$prep = $em->getConnection()->prepare($requete); 
		$prep->execute(); 

		if ($prep == true){
			return true;
		}
		return false;
	}
}