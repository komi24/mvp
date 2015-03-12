<?php

namespace Ebene\MvpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Ebene\MvpBundle\Entity\Section;


class NewcommandeController extends Controller
{
    public function indexAction()
    {
        /*$params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }
        if($params['type'] == 'sections')
        {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($params['id']);

            $reponse = new JsonResponse();
            $reponse->setData($this->getSections($entity));
        }*/
        return new JsonResponse();//$reponse;
    }
    
    public function getSections($restaurant) {
        $res = array();
        
        if($restaurant == NULL) return $res;

        foreach ($restaurant->getSections()->toArray() as $cur) {
            array_push($res, array(
                "nom" => $cur->getNom(), 
                "id" => $cur->getId(),
                "listearticles" => $this->getArticles($cur)
                ));
        }
        return $res;
    }

    public function getArticles($entity) {
        $res = array();

        if($entity == NULL) return $res;
        
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('EbeneMvpBundle:Section')->find($entity->getId());//$params[id]);

        foreach ($entity->getArticles()->toArray() as $cur) {
            array_push($res, array(
                "nom" => $cur->getNom(), 
                "id" => $cur->getId(),
                "prix" => $cur->getPrix(),
                "photo" => $cur->getPhoto(),
                "description" => $cur->getDescription(),
                "listesecondaires" => $this->getSecondaires($cur)
                ));
        }
        return $res;
    }
    public function getSecondaires($entity) {
        $res = array();
        if($entity == NULL) return $res;
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('EbeneMvpBundle:Article')->find($entity->getId());//$params[id]);

        foreach ($entity->getSecondaires() as $cur) {
            array_push($res, array(
                "nom" => $cur->getNom(),
                "id" => $cur->getId(),
                "prix" => $cur->getPrix(),
                "description" => $cur->getDescription()
            ));
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
