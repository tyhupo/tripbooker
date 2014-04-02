<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\Trip;
use M2TIIL\TripBookerBundle\Entity\GuidedTour;

class ProductController extends Controller
{
	/**
	 * @Route("/fiche-voyage/{id}", name="fiche-voyage")
	 */
	public function voyageAction($id)
	{
		if($id == null)
		{
			die("ID manquant");
		}
		
		$em = $this->getDoctrine()->getManager();
		$voyage = $em->getRepository('M2TIILTripBookerBundle:Trip')->find($id);
		

		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}

		return $this->render('M2TIILTripBookerBundle:FicheVoyage:fiche-voyage.html.twig', array(
        	'voyage' => $voyage,
        	'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        ));
	}
	
	/**
	 * @Route("/fiche-etape/{id}", name="fiche-etape")
	 */
	public function etapeAction($id)
	{
		if($id == null)
		{
			die("ID manquant");
		}
		
		$em = $this->getDoctrine()->getManager();
		$etape = $em->getRepository('M2TIILTripBookerBundle:TripStep')->find($id);
		
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}

		return $this->render('M2TIILTripBookerBundle:FicheEtape:fiche-etape.html.twig', array(
        	'etape' => $etape,
        	'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        ));
	}
	
	/**
	 * @Route("/fiche-excursion/{id}", name="fiche-excursion")
	 */
	public function excursionAction($id)
	{
		if($id == null)
		{
			die("ID manquant");
		}
		
		$em = $this->getDoctrine()->getManager();
		$excursion = $em->getRepository('M2TIILTripBookerBundle:GuidedTour')->find($id);
		
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}

		return $this->render('M2TIILTripBookerBundle:FicheExcursion:fiche-excursion.html.twig', array(
        	'value' => $excursion,
        	'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        ));
	}
	
	/**
	 * @Route("/fiche-hotel/{id}", name="fiche-hotel")
	 */
	public function hotelAction($id)
	{
		if($id == null)
		{
			die("ID manquant");
		}
		
		$em = $this->getDoctrine()->getManager();
		$hotel = $em->getRepository('M2TIILTripBookerBundle:Hotel')->find($id);
		
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}

		return $this->render('M2TIILTripBookerBundle:FicheHotel:fiche-hotel.html.twig', array(
        	'value' => $hotel,
        	'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        ));
	}
}