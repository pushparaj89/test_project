<?php

namespace SoccerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SoccerBundle:Default:index.html.twig', array('name' => $name));
    }
}
