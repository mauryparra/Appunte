<?php

namespace prog3\AppunteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use prog3\AppunteBundle\Entity\Apunte;
use prog3\AppunteBundle\Entity\Archivo;
use prog3\AppunteBundle\Entity\Carrera;
use prog3\AppunteBundle\Entity\Materia;
use Symfony\Component\HttpFoundation\Request;


class ApunteController extends Controller
{

	// SELECCIONAR UN APUNTE EN LA PAGINA PRINCIPAL
    public function selectedAction(Apunte $apunte)
    {
    	return $this->render('prog3AppunteBundle:Appunte:selected.html.twig', array('apunte' => $apunte));
    }

    // SUBIR UN APUNTE (BOTON)
    public function uploadAction(Request $request)
    {

		$apunteUpload = new Apunte();
		

		$form = $this->createFormBuilder($apunteUpload)
			->add('Nombre' , 'text')
			->add('MateriaId', 'entity', array('class'=>'prog3AppunteBundle:Materia', 'property' => 'Nombre'))
			->add('Descripcion' , 'textarea')
			->getForm()
		;
		$form->handleRequest($request);

		$apunteUpload->setFecha(new \DateTime("now"));
		$apunteUpload->setUsuarioId(1);


		if ($form->isValid()) {	

			$apunte = new Apunte();
			$apunte = $form->getData();

			$em=$this->getDoctrine()->getManager();
			$em->persist($apunte);
			$em->flush();
			return $this->render('prog3AppunteBundle:Appunte:success.html.twig');
		}
		
		return $this->render('prog3AppunteBundle:Appunte:upload.html.twig', array('form'=>$form->createView()));
	}
}

