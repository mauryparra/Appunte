<?php

namespace prog3\AppunteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {    	
    	
    	$apuntes = $this->get('doctrine')->getManager()->createQueryBuilder()->select('p')
    	->from('prog3AppunteBundle:Apunte', 'p')->addOrderBy('p.id', 'DESC')->getQuery()
    	->getResult();

        return $this->render('prog3AppunteBundle:Appunte:index.html.twig',array ("apuntes"=>$apuntes));
    }
}
