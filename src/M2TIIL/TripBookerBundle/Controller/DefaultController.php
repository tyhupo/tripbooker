<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\Trip;
use M2TIIL\TripBookerBundle\Entity\Hotel;
use M2TIIL\TripBookerBundle\Entity\GuidedTour;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="tripBooker_home")
	 */
    public function indexAction()
    {
		$packs = array();
		$em = $this->getDoctrine()->getManager();
		$packs = $em->getRepository('M2TIILTripBookerBundle:Trip')->findAll();

		$packs_trip = array(); 
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}
		
        return $this->render('M2TIILTripBookerBundle::index.html.twig', array(
        	'packs' => $packs,
        	'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity, 
        ));
    }
	
    /**
     * @Route("/hotels/", name="tripbooker_hotels_list")
     */
    public function hotelAction()
    {
		/*$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('M2TIILTripBookerBundle:Hotel');
		$hotels = $repository->findAll();
		*/
    	return $this->render('M2TIILTripBookerBundle:Hotels:hotels.html.twig',array(
    		'hotels' => array(),
		));
    }

    /**
     * @Route("/excursions/", name="tripbooker_excursions_list")
     */
    public function excursionAction()
    {
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('M2TIILTripBookerBundle:GuidedTour');
		$excursions = $repository->findAll();
		
    	return $this->render('M2TIILTripBookerBundle:Excursions:excursions.html.twig',array(
    		'excursions' => array(excursions),
		));
    }
}
