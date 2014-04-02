<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\TripStep;

class RechercheController extends Controller
{
	/**
	* @Route("/recherche-etape/{ville_depart}/{ville_arrive}", defaults={"ville_depart" = null, "ville_arrive" = null} , name="rechercheEtape")
	*/
    public function rechercheEtapeAction($ville_depart,$ville_arrive)
    {
    	$ville_depart = $_POST['start-place'];
    	$ville_arrivee = $_POST['end-place'];

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');

		$etapes = $repository->findBy(array('startCity' => $ville_depart, 'endCity' => $ville_arrive),
										array('price' => 'asc'),
										null,
										null);
		return $this->render('M2TIILTripBookerBundle:Recherche:recherche-etape.html.twig', array(
        	'etapes' => $etapes,
        ));
    }
}
