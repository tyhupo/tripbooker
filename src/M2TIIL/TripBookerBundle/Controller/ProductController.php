<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\Trip;
use M2TIIL\TripBookerBundle\Entity\GuidedTour;

class ProductController extends Controller
{
	/**
	 * @Route("/fiche-voyage", name="fiche-voyage")
	 */
	public function voyageAction($id)
	{
		if($id == null)
		{
			die("ID manquant");
		}
		
		$em = $this->getDoctrine()->getManager();
		$voyage = $em->getRepository('M2TIILTripBookerBundle:Trip')->find($id);
		
		return $this->render('M2TIILTripBookerBundle:FicheVoyage:fiche-voyage.html.twig', array(
        	'value' => $voyage,
        ));
	}
	
	/**
	 * @Route("/fiche-etape", name="fiche-etape")
	 */
	public function etapeAction($id)
	{
		if($id == null)
		{
			die("ID manquant");
		}
		
		$em = $this->getDoctrine()->getManager();
		$etape = $em->getRepository('M2TIILTripBookerBundle:TripStep')->find($id);
		
		return $this->render('M2TIILTripBookerBundle:FicheEtape:fiche-etape.html.twig', array(
        	'value' => $etape,
        ));
	}
	
	/**
	 * @Route("/fiche-excursion", name="fiche-excursion")
	 */
	public function excursionAction($id)
	{
		if($id == null)
		{
			die("ID manquant");
		}
		
		$em = $this->getDoctrine()->getManager();
		$excursion = $em->getRepository('M2TIILTripBookerBundle:GuidedTour')->find($id);
		
		return $this->render('M2TIILTripBookerBundle:FicheExcursion:fiche-excursion.html.twig', array(
        	'value' => $excursion,
        ));
	}
	
	/**
	 * @Route("/fiche-hotel", name="fiche-hotel")
	 */
	public function hotelAction($id)
	{
		if($id == null)
		{
			die("ID manquant");
		}
		
		$em = $this->getDoctrine()->getManager();
		$hotel = $em->getRepository('M2TIILTripBookerBundle:Hotel')->find($id);
		
		return $this->render('M2TIILTripBookerBundle:FicheHotel:fiche-hotel.html.twig', array(
        	'value' => $hotel,
        ));
	}
}