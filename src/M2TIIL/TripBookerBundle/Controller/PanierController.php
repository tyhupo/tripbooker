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
		//Partie lister
		$session = $this->getRequest()->getSession();
		$voyages = array();
		$etapes = array();
		echo "coucou";
		
		if($session->has('panier'))
        {
			$panier = $session->get('panier');
			$em = $this->getDoctrine()->getManager();
			
			$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');
			$i = 0;
			foreach ($panier["idVoyages"] as $idVoyage)
			{
				$voyages[$i] = $repository->find($idvoyage);
				$i++;
			}
			
			$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
			$i = 0;
			foreach ($panier["idEtapes"] as $idEtape)
			{
				$etapes[$i] = $repository->find($idEtape);
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
		
		//Retour
		return $this->render('M2TIILTripBookerBundle:Panier:panier.html.twig', array(
			'voyages' => $voyages,
			'etapes' => $etapes,
			'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
		));
	}
	
	/**
	 * @Route("/liste-etape-panier/", name="liste-etape-panier")
	 */
	public function listerEtapePanierAction()
	{
		$session = $this->getRequest()->getSession();
		$etapes = array();
		if($session->has('panier'))
		{
			$em = $this->getDoctrine()->getManager();
			$repository = $em->getRepository('M2TIILTripBookerBundle:TripStep');
			
			$panier = $session->get('panier');
			$i = 0;
			foreach ($panier["idEtapes"] as $idEtape)
			{
				$etapes[$i] = $repository->find($idEtape);
				$i++;
			}
		}
 
        return $this->render('M2TIILTripBookerBundle:listeEtapePanier:liste-etape-panier.html.twig', array(
        	'etapes' => $etapes
        ));
	}
	
	/**
	 * @Route("/ajouter-excursion-panier/{id}", name="ajouter-excursion-panier")
	 */
	public function ajouterExcursionPanierAction($id)
	{
		if($id == null)
		{
			die("ID excursion manquant");
		}
		
		$session = $this->getRequest()->getSession();
         
        if(!$session->has('panier'))
        {
            $session->set('panier' ,array('idVoyages' => array(),'idEtapes' => array(),'idExcursions' => array()));
        }
		
		$session = $this->getRequest()->getSession();
 
        $excursion = $session->get('panier');
        array_push($panier['idExcursions'], $id);
 
        return $this->render('M2TIILTripBookerBundle:AjouterExcursionPanier:ajouter-excursion-panier.html.twig');
	}
	
	/**
	 * @Route("/liste-excursion-panier/", name="liste-excursion-panier")
	 */
	public function listerExcursionPanierAction()
	{
		$session = $this->getRequest()->getSession();
		$excursions = array();
		if($session->has('panier'))
		{
			$panier = $session->get('panier');
			
			$em = $this->getDoctrine()->getManager();
			$repository = $em->getRepository('M2TIILTripBookerBundle:GuidedTour');

			
			$i = 0;
			foreach ($panier["idExcursions"] as $idExcursion)
			{
				$excursions[$i] = $repository->find($idExcursion);
				$i++;
			}
	 
			return $this->render('M2TIILTripBookerBundle:listeExcursionPanier:liste-excursion-panier.html.twig', array(
				'excursions' => $excursions
			));
		}
	}
}