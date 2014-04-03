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
		
		if($session->has('panier'))
        {
			$user = $this->container->get('security.context')->getToken()->getUser();
			$em = $this->getDoctrine()->getManager();
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
				$em->persist($tripOrder);
				$em->flush();
				
				$order->addOrder($tripOrder);
			}
		}
		
		return $this->render('M2TIILTripBookerBundle:Commander:commander.html.twig',array());
	}
}