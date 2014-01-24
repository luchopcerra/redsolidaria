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
    
    public function showAction($id){
    
        $publicacion = $this->getDoctrine()
            ->getRepository('RedSolidariaMainBundle:Publicacion')
            ->find($id);

        if (!$publicacion) {
            throw $this->createNotFoundException(
                    'No hay publicaciones con ID ' . $id
            );
        }
        else return $this->render("RedSolidariaMainBundle:home:publicacionShow.html.twig", array('publicacion'=>$publicacion));
        
        }
        
    }
?>