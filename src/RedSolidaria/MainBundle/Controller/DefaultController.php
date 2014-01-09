<?php

namespace RedSolidaria\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RedSolidariaMainBundle:Home:index.html.twig', array('name' => $name));
    }
}
