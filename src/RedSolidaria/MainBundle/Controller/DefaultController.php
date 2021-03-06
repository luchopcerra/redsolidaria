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

class DefaultController extends Controller{
    
    public function formTestAction($name){

        $form = $this->createFormBuilder(new Tag("hola tag"))
            ->add('nombre','text')
            ->add('save', 'submit')
            ->getForm();

        $request = Request::createFromGlobals();
        $form->handleRequest($request);

        if ($form->isValid()) {
//            echo $this->generateUrl('task_success');
            // perform some action, such as saving the task to the database
            return $this->redirect($this->generateUrl('task_success'));
        }

        
        return $this->render('RedSolidariaMainBundle:Home:index.html.twig', array(
            'name' => $name,
            'form' => $form->createView()
        ));
    
    }

    public function adminAction(){

        return $this->render('RedSolidariaMainBundle:home:indexSample.html.twig');
    }

    public function indexAction(){
        $ultimasPublicaciones = $this->ultimasPublicaciones();
//        print_r($ultimasPublicaciones);
        return $this->render(
            'RedSolidariaMainBundle:home:index.html.twig',
            array(
                'ultimasPublicaciones' => $ultimasPublicaciones,
            )
        );
    }

    public function mostrarPublicacionAction($id){
//        $ultimasPublicaciones = $this->ultimasPublicaciones();
//        print_r($ultimasPublicaciones);
//        return $this->render(
//            'RedSolidariaMainBundle:home:index.html.twig',
//            array(
//                'ultimasPublicaciones' => $ultimasPublicaciones,
//            )
//        );
         return new \Symfony\Component\HttpFoundation\Response("entro a mostrarPublicacionAction con id $id");
    }
    /*
     * esta funcion devuelve las ultimas 5 publicaciones creadas
     */
    private function ultimasPublicaciones(){
        
        return $this->getDoctrine()->getRepository('RedSolidariaMainBundle:Publicacion')->ultimasPublicaciones();
    }
    
    private function crearUsers(){
        $em = $this->getDoctrine()->getManager();
        
        for ($i=0;$i<15;$i++){
            
            $pf = new PersonaFisica(
                "ppp".$i,
                "ppp",
                "tito@email.com", 
                "direccion", 
                "123456789",
                "__Tito".$i, 
                "Lui",
                "987654321"
            );
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($pf);
            $password = $encoder->encodePassword($pf->getPassword(), $pf->getSalt());
            $pf->setPassword($password);
            
            $p = new Publicacion(
                $pf,
                "Publicacion nueva_".$i,
                "descripcion de la publicacion nueva" .$i, 
                true, 
                new DateTime(),
                new DateTime(),
                "ubicacion?", 
                array(
                    new Tag("un tag".$i*rand(1,50000)),
                    new Tag("un tag".$i*rand(1,50000)),
                    new Tag("un tag".$i*rand(1,50000))
                )
            );

           /* $t = new PersonaFisica(
                    "pp",
                    "pp",
                    "tito@email.com", 
                    "direccion", 
                    "123456789",
                    "__Tito".$i, 
                    "Lui",
                    "987654321"
                );

            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($t);
            $password = $encoder->encodePassword($t->getPassword(), $t->getSalt());
            $t->setPassword($password);*/

           /* $p = new PersonaJuridica(
                "pj",
                "pj",
                "tito@email.com", 
                "direccion", 
                "123456789",
                "razon social"
            );*/
            
            
            
//            $em->persist($t);
            $em->persist($p);
            $em->flush();
        }

//        $p = $this->getDoctrine()->getRepository('RedSolidariaMainBundle:PersonaFisica');   
//        print_r($p->findAll());
        return new Response('Created publicacion id ');
    }

    public function taskSuccessAction(){
        return new \Symfony\Component\HttpFoundation\Response("entro a taskSuccessAction");
    }
    
    public function loginAction(Request $request){
        
        $session = $request->getSession();
//        print_r($request);
//        print_r($session);
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'RedSolidariaMainBundle:home:login.html.twig',
            array(
//                 last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error
            )
        );
    }
}
