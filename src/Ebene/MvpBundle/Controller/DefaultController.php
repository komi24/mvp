<?php

namespace Ebene\MvpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EbeneMvpBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function cliboardAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
 
        $entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($id);
        $titre = ($entity == NULL) ? "Restaurant" : $entity->getNom();
 
        return $this->render('EbeneMvpBundle:Default:cliboard.html.twig', 
                array(
                    'id' => $id,
                    'titre' => $titre
                    ));
    }

    public function restboardAction($id)
    {
        //$em = $this->getDoctrine()->getEntityManager();
 
        //$entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($id);
        $titre = "KebabResto";//$entity->getNom();
 
        return $this->render('EbeneMvpBundle:Default:restboard.html.twig', 
                array(
                    'id' => $id,
                    'titre' => $titre
                    ));
    }

}
