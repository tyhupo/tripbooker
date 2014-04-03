<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

use M2TIIL\TripBookerBundle\Entity\Trip;
use M2TIIL\TripBookerBundle\Entity\TripStep;
use M2TIIL\TripBookerBundle\Entity\GuidedTour;

class PanierController extends Controller
{
	/**
	 * @Route("/ajouter-voyage-panier/{id}", name="ajouter-voyage-panier")
	 */
	public function ajouterVoyagePanierAction($id)
	{
		if($id == null)
		{
			die("ID voyage manquant");
		}
		
		$session = $this->getRequest()->getSession();
         
        if(!$session->has('panier_voyage'))
        {
            $session->set('panier_voyage' ,array());
        }
		
		if(!$session->has('panier_etape'))
        {
            $session->set('panier_etape' ,array());
        }
		
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');

		$voyages = array();
		$etapes = array();
		$temp = array();
		$i = 0;
		
		foreach($session->get('panier_voyage') as $id_voyage)
		{
			$voyages[$i] = $repository->find($id_voyage);
			$temp[$i] = $id_voyage;
			$i++;
		}
		
		$voyages[$i] = $repository->find($id);
		$temp[$i] = $id;
		$session->set('panier_voyage', $temp);
		$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
		
		$i = 0;
		foreach($session->get('panier_etape') as $id_etape)
		{
			$etapes[$i] = $repository->find($id_etape);
			$i++;
		}
		
        //Partie François
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}
 
        return $this->render('M2TIILTripBookerBundle:Panier:panier.html.twig', array(
        	'voyages' => $voyages,
			'etapes' => $etapes,
			'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        ));
	}
	
	/**
	 * @Route("/ajouter-etape-panier/{id}", name="ajouter-etape-panier")
	 */
	public function ajouterEtapePanierAction($id)
	{
		if($id == null)
		{
			die("ID voyage manquant");
		}
		
		$session = $this->getRequest()->getSession();
         
        if(!$session->has('panier_voyage'))
        {
            $session->set('panier_voyage' ,array());
        }
		
		if(!$session->has('panier_etape'))
        {
            $session->set('panier_etape' ,array());
        }
		
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');

		$voyages = array();
		$etapes = array();
		$i = 0;
		
		foreach($session->get('panier_voyage') as $id_voyage)
		{
			$voyages[$i] = $repository->find($id_voyage);
			$i++;
		}
		
		$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
		$temp = array();
		$i = 0;
		foreach($session->get('panier_etape') as $id_etape)
		{
			$etapes[$i] = $repository->find($id_etape);
			$temp[$i] = $id_etape;
			$i++;
		}
		$etapes[$i] = $repository->find($id);
		$temp[$i] = $id;
		$session->set('panier_etape', $temp);
		
        //Partie François
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}
 
        return $this->render('M2TIILTripBookerBundle:Panier:panier.html.twig', array(
        	'voyages' => $voyages,
			'etapes' => $etapes,
			'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        ));
	}
	
	/**
	 * @Route("/panier/", name="panier")
	 */
	public function listerPanierAction()
	{
		$session = $this->getRequest()->getSession();
		$em = $this->getDoctrine()->getManager();
         
        if(!$session->has('panier_voyage'))
        {
            $session->set('panier_voyage' ,array());
        }
		
		if(!$session->has('panier_etape'))
        {
            $session->set('panier_etape' ,array());
        }

		$voyages = array();
		$etapes = array();

		if($session->has('panier_voyage'))
        {
			$i = 0;
			$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');
			foreach($session->get('panier_voyage') as $id_voyage)
			{
				$voyages[$i] = $repository->find($id_voyage);
				$i++;
			}
		}
		
		if($session->has('panier_etape'))
        {
			$i = 0;
			$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
			foreach($session->get('panier_etape') as $id_etape)
			{
				$etapes[$i] = $repository->find($id_etape);
				$i++;
			}
		}
		
        //Partie François
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}
 
        return $this->render('M2TIILTripBookerBundle:Panier:panier.html.twig', array(
        	'voyages' => $voyages,
			'etapes' => $etapes,
			'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        ));
	}
	
	/**
	 * @Route("/supprimer-voyage-panier/{id}", name="supprimer-voyage-panier")
	 */
	public function supprimerVoyagePanierAction($id)
	{
		$session = $this->getRequest()->getSession();

		$em = $this->getDoctrine()->getManager();

		$voyages = array();
		$etapes = array();

		if($session->has('panier_voyage'))
		{
			$temp = array();
			$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');
			foreach($session->get('panier_voyage') as $key => $id_voyage)
			{
				if($key != $id)
				{
					$voyages[$key] = $repository->find($id_voyage);
					$temp[$key] = $id_voyage;
				}
			}
			
			$session->set('panier_voyage', $temp);
		}
		
		if($session->has('panier_etape'))
		{
			$i = 0;
			$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
			foreach($session->get('panier_etape') as $id_etape)
			{
				$etapes[$i] = $repository->find($id_etape);
				$i++;
			}
		}
		
		//Partie François
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}
 
		return $this->render('M2TIILTripBookerBundle:Panier:panier.html.twig', array(
			'voyages' => $voyages,
			'etapes' => $etapes,
			'form_custom_Startcities' => $tab_trip_startCity,
			'form_custom_Endcities' => $tab_trip_endCity,
		));
	}
	
	/**
	 * @Route("/supprimer-etape-panier/{id}", name="supprimer-etape-panier")
	 */
	public function supprimerEtapePanierAction($id)
	{
		$session = $this->getRequest()->getSession();

		$em = $this->getDoctrine()->getManager();

		$voyages = array();
		$etapes = array();

		if($session->has('panier_voyage'))
		{
			$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');
			$i = 0;
			foreach($session->get('panier_voyage') as $id_voyage)
			{
				$voyages[$id] = $repository->find($id_voyage);
				$i++;
			}
		}
		
		if($session->has('panier_etape'))
		{
			$temp = array();
			$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
			foreach($session->get('panier_etape') as $key => $id_etape)
			{
				if($key != $id)
				{
					$etapes[$key] = $repository->find($id_etape);
					$temp[$key] = $id_etape;
				}
			}
			$session->set('panier_etape', $temp);
		}
		
		//Partie François
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}
 
		return $this->render('M2TIILTripBookerBundle:Panier:panier.html.twig', array(
			'voyages' => $voyages,
			'etapes' => $etapes,
			'form_custom_Startcities' => $tab_trip_startCity,
			'form_custom_Endcities' => $tab_trip_endCity,
		));
	}
}