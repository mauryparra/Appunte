<?php

namespace prog3\AppunteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {    	
    	return $this->render('prog3AppunteBundle:Appunte:index.html.twig');
    }
}
