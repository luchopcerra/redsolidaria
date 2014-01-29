<?php

namespace RedSolidaria\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RedSolidaria\MainBundle\Entity\Tag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use RedSolidaria\MainBundle\Entity\PersonaFisica;
use RedSolidaria\MainBundle\Entity\PersonaJuridica;
use RedSolidaria\MainBundle\Entity\PersonaRepository;
use RedSolidaria\MainBundle\Entity\PublicacionRepository;
use RedSolidaria\MainBundle\Entity\Publicacion;
use DateTime;

class PublicacionController extends Controller{
    
    public function showAction($id, Request $request){
        
        
        
//        $user = $this->getUser();
//        if ($user) $rol = $user->getRoles();
            
        
        $form = $this->createFormBuilder()
            ->add('confirmar', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action...           

            return $this->redirect($this->generateUrl('red_solidaria_main_homepage'));
        }           
        
        
        $publicacion = $this->getDoctrine()
            ->getRepository('RedSolidariaMainBundle:Publicacion')
            ->find($id);

        if (!$publicacion) {
            throw $this->createNotFoundException(
                    'No hay publicaciones con ID ' . $id
            );
        }
        else return $this->render("RedSolidariaMainBundle:home:publicacionShow.html.twig", array('publicacion'=>$publicacion, 'form' => $form->createView()));
        
        }
        
    }
?>