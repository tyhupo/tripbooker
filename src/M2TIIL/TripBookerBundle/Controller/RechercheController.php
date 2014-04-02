<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\TripStep;

class RechercheController extends Controller
{
	/**
	* @Route("/recherche-etape/" , name="rechercheEtape")
	*/
    public function rechercheEtapeAction()
    {

    	$result = array();
    	$ville_depart = $_POST['start-place'];
    	$ville_arrivee = $_POST['end-place'];

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
		$excursions = $repository->findAll();

		return $this->render('M2TIILTripBookerBundle:Recherche:recherche-etape.html.twig', array(
        	'depart' => $ville_depart,
        	'arrivee' => $ville_arrivee, 
        ));
    }
}
