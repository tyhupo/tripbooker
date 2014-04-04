<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\BookerOrder;
use M2TIIL\TripBookerBundle\Entity\TripOrder;
use M2TIIL\TripBookerBundle\Entity\Trip;
use M2TIIL\UserBundle\Entity\User;

class CommandeController extends Controller
{
	/**
	 * @Route("/commander/" , name="commander")
	 */
	public function commanderAction()
	{
		$session = $this->getRequest()->getSession();
		$em = $this->getDoctrine()->getManager();
		
		if($session->has('panier_voyage'))
        {	
			$user = $this->container->get('security.context')->getToken()->getUser();			
			$repository = $em->getRepository('M2TIILTripBookerBundle:Trip');
			
			$order = new BookerOrder();
			$order->setReference("Reference");
			$order->setDate(new \DateTime());
			$temp = true;
			
			foreach($session->get('panier_voyage') as $idVoyage)
			{	
				foreach($user->getBookerOrder() as $bookerOrder)
				{
					foreach($bookerOrder->getOrders() as $tripOrder)
					{
						if($tripOrder->getTrip()->getId() == $idVoyage)
						{
							$temp = false;
							$tripOrder->setNumber(intval($tripOrder->getNumber()) + 1);
							$em->persist($tripOrder);
							$em->flush();
						}
					}
				}
				if($temp)
				{
					$tripOrder = new TripOrder();
					$tripOrder->setNumber(1);
					$tripOrder->setOrder($order);
					$voyage = $repository->find($idVoyage);
					$tripOrder->setTrip($voyage);
					$order->addOrder($tripOrder);
					
					$em->persist($tripOrder);
				}
			}
			if($temp)
			{
				$user->addBookerOrder($order);
				$em->persist($order);
				$em->persist($user);
				$em->flush();
			}
		}

		$session->set('panier_voyage' ,array());
		$session->set('panier_etape' ,array());
		
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
		$user = $this->container->get('security.context')->getToken()->getUser();
		$voyages = array();
		
		$i = 0;
		foreach($user->getBookerOrder() as $bookerOrder)
		{
			foreach($bookerOrder->getOrders() as $tripOrder)
			{
				for($j = 0 ; $j < $tripOrder->getNumber(); $j++)
				{
					$voyages[$i] = $tripOrder->getTrip();
					$i++;
				}
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
		
		return $this->render('M2TIILTripBookerBundle:Historique:historique.html.twig',array(
			'form_custom_Startcities' => $tab_trip_startCity,
        	'form_custom_Endcities' => $tab_trip_endCity,
        	'voyages' => $voyages,
        ));
	}
}