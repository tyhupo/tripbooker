<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\Trip;

class CommandeController extends Controller
{
	/**
	 * @Route("/commander/" , name="commander")
	 */
	public function commanderAction()
	{
		$session = $this->getRequest()->getSession();
		$em = $this->getDoctrine()->getManager();
		
		if($session->has('panier'))
        {
			$user = $this->container->get('security.context')->getToken()->getUser();			
			$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');
			
			$order = new BookerOrder();
			$order->setReference("Reference");
			$order->setDate(date("d-m-Y"));
			
			foreach($session->get('panier_voyage') as $idVoyage)
			{
				$tripOrder = new TripOrder();
				$tripOrder->setNumber(1);
				$tripOrder->setOrder($order);
				$voyage = $repository->find($idVoyage);
				$tripOrder->setTrip($voyage);
				$order->addOrder($tripOrder);
				
				$em->persist($tripOrder);
				$em->flush();
			}
			$user->addBookerOrder($order);
			$em->persist($order);
			$em->persist($user);
			$em->flush();
		}

		//Partie François
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}
		
		return $this->render('M2TIILTripBookerBundle:Commander:commander.html.twig',array(
			'form_custom_Startcities' => $tab_trip_startCity,
        			'form_custom_Endcities' => $tab_trip_endCity,
        		));
	}

	/**
	 * @Route("/historique/" , name="historique")
	 */
	public function historiqueAction()
	{

		$em = $this->getDoctrine()->getManager();

		/** TODO **/
		$historiques = array();

		//Partie François
		$packs_trip = $em->getRepository('M2TIILTripBookerBundle:TripStep')->findAll();
		$tab_trip_startCity = array(); 
		$tab_trip_endCity = array(); 
		foreach($packs_trip as $p){
			$tab_trip_startCity[$p->getId()]=array($p->getStartCity());
			$tab_trip_endCity[$p->getId()]=array($p->getEndCity());
		}
		
		return $this->render('M2TIILTripBookerBundle:Historique:historique.html.twig',array(
			'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        	'historiques' => $historiques,
        ));
	}
}