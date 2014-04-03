<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
		$id = $_POST["id"];
		
		if($id == null)
		{
			die("ID voyage manquant");
		}
		
		$session = $this->getRequest()->getSession();
         
        if(!$session->has('panier'))
        {
            $session->set('panier' ,array('idVoyages' => array(),'idEtapes' => array(),'idExcursions' => array()));
        }
		
		$session = $this->getRequest()->getSession();
 
        $panier = $session->get('panier');
        array_push($panier['idVoyages'], $id);
 
        return $this->render('M2TIILTripBookerBundle:AjouterVoyagePanier:ajouter-voyage-panier.html.twig');
	}
	
	/**
	 * @Route("/liste-voyage-panier/", name="liste-voyage-panier")
	 */
	public function listerVoyagePanierAction()
	{
		$session = $this->getRequest()->getSession();
		$voyages = array();
		if($session->has('panier'))
        {
			$em = $this->getDoctrine()->getManager();
			$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');
			
			$panier = $session->get('panier');
			$i = 0;
			foreach ($panier["idVoyages"] as $idVoyage)
			{
				$voyages[$i] = $repository->find($idvoyage);
				$i++;
			}
		}
		return $this->render('M2TIILTripBookerBundle:listeVoyagePanier:liste-voyage-panier.html.twig', array(
			'voyages' => $voyages
		));
	}
	
	/**
	 * @Route("/ajouter-etape-panier/{id}", name="ajouter-etape-panier")
	 */
	public function ajouterEtapePanierAction($id)
	{
		$id = $_POST["id"];
		
		if($id == null)
		{
			die("ID etape manquant");
		}
		
		$session = $this->getRequest()->getSession();
         
        if(!$session->has('panier'))
        {
            $session->set('panier' ,array('idVoyages' => array(),'idEtapes' => array(),'idExcursions' => array()));
        }
		
		$session = $this->getRequest()->getSession();
 
        $panier = $session->get('panier');
        array_push($panier['idEtapes'], $id);
 
        return $this->render('M2TIILTripBookerBundle:AjouterEtapePanier:ajouter-etape-panier.html.twig');
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
		$id = $_POST["id"];
		
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