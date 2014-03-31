<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="tripBooker_home")
	 */
    public function indexAction()
    {
        return $this->render('M2TIILTripBookerBundle::index.html.twig', array(
        	'packs' => array(),
        	'form_custom_cities' => array(), 
        ));
    }

    /**
     * @Route("/hotels/", name="tripbooker_hotels_list")
     */
    public function hotelAction()
    {
    	return $this->render('M2TIILTripBookerBundle:Hotels:hotels.html.twig',array(
    		'hotels' => array(),
		));
    }

    /**
     * @Route("/excursions/", name="tripbooker_excursions_list")
     */
    public function excursionAction()
    {
    	return $this->render('M2TIILTripBookerBundle:Excursions:excursions.html.twig',array(
    		'excursions' => array(),
		));
    }
}
