<?php
/**
 * Created by PhpStorm.
 * User: Mauricio
 * Date: 12/05/14
 * Time: 22:28
 */

namespace prog3\AppunteBundle\Controller;

use prog3\AppunteBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller {

    /**
     * @Template
     */
    public function registerAction(Request $request)
    {
       $form = $this->createFormBuilder()
            ->add('username', 'text')
            ->add('password', 'repeated', array(
                    'type' => 'password',
           ))
            ->add('email', 'email')
            ->add('nombre', 'text')
            ->add('apellido', 'text')
            ->getForm()
        ;

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $data = $form->getData();

                $user = new Usuario();
                $user->setUsername($data['username']);
                $user->setEmail($data['email']);
                $user->setNombre($data['nombre']);
                $user->setApellido($data['apellido']);
                $user->setPassword($this->encodePassword($user, $data['password']));

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $url = $this->generateUrl('login');

                return $this->redirect($url);

            }
        }

        return array('form' => $form->createView());
    }

    private function encodePassword($usuario, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($usuario)
        ;

        return $encoder->encodePassword($plainPassword, $usuario->getSalt());
    }

} 