<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\TripStep;

class RechercheController extends Controller
{
	/**
	* @Route("/recherche-etape/{ville_depart}/{ville_arrivee}", defaults={"ville_depart" = null, "ville_arrivee" = null} , name="rechercheEtape")
	*/
    public function rechercheEtapeAction($ville_depart,$ville_arrivee)
    {
    	$ville_depart = $_POST['start-place'];
    	$ville_arrivee = $_POST['end-place'];

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');

		$etapes = $repository->findBy(array('startCity' => $ville_depart, 'endCity' => $ville_arrivee),
										array('price' => 'asc'),
										null,
										null);

		$packs_trip = array(); 
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}

		return $this->render('M2TIILTripBookerBundle:Recherche:recherche-etape.html.twig', array(
        	'etapes' => $etapes,
        	'depart' => $ville_depart,
        	'arrivee' => $ville_arrivee,
        	'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity, 
        ));
    }
}
