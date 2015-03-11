<?php

namespace Ebene\MvpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Ebene\MvpBundle\Entity\Section;


class ActionboardController extends Controller
{
    public function indexAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }
        if(true)//$params['type'] == 'sections')
        {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find(1);//$params[id]);

            $reponse = new JsonResponse();
            $reponse->setData($this->getListeSections($entity));
        }
        $reponse->headers->set('Content-Type', 'application/json');
        return $reponse;
    }
    
    public function getListeSections($restaurant) {
        $res = array();
        foreach ($restaurant->getListesections()->toArray() as $cur) {
            array_push($res, array("nom" => $cur->getNom(), "id" => $cur->getId()));
        }
        return $res;
    }
    
    public function cliboardAction($id)
    {
        //$em = $this->getDoctrine()->getEntityManager();
 
        //$entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($id);
        $titre = "KebabResto";//$entity->getNom();
 
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
