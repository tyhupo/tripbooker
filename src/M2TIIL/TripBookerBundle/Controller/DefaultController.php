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
}
