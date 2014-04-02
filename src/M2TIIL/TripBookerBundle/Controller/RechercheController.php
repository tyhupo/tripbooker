<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\TripStep;

class RechercheController extends Controller
{
	/**
	* @Route("/shearchTripStep/{ville_depart}/{ville_arrive}", defaults={"ville_depart" = null})
	*/
    public function shearchTripStep($ville_depart,$ville_arrive)
    {
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
		$excursions = $repository->findAll();
    }
}
