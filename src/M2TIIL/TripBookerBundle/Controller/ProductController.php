<?php

namespace M2TIIL\TripBookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use M2TIIL\TripBookerBundle\Entity\Trip;
use M2TIIL\TripBookerBundle\Entity\GuidedTour;

class ProductController extends Controller
{
	/**
	 * @Route("/", name="tripBooker_home")
	 */
	public function productAction($voyage,$id)
	{
		$em = $this->getDoctrine()->getManager();
		
		if($voyage == true)
		{
			$val = $em->getRepository('M2TIILTripBookerBundle:Trip')->find($id);
		}else{
			$val = $em->getRepository('M2TIILTripBookerBundle:GuidedTour')->find($id);
		}
		
		return $this->render('M2TIILTripBookerBundle:Product:product.html.twig', array(
        	'value' => $val,
        ));
	}
}