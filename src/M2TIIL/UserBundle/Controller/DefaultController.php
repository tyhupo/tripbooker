<?php

namespace M2TIIL\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('M2TIILUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
