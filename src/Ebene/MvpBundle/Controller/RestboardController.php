<?php

namespace Ebene\MvpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Ebene\MvpBundle\Entity\Client;
use Ebene\MvpBundle\Entity\Commande;
use Ebene\MvpBundle\Entity\Secondaire;
use Ebene\MvpBundle\Entity\Article;

class RestboardController extends Controller
{
    public function suivAction() {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('EbeneMvpBundle:Commande')->find($params['id']);
        $logger = $this->get('logger');
        $logger->info("rohlala");
        $logger->info($params['id']);
        $logger->info("roh");
        if($commande->getDateprep() != null){
            if($commande->getDatepret() != null){
                $commande->setDatefin(new \DateTime);
                $em->persist($commande);
                $em->flush();
                return new JsonResponse();
            }
            $commande->setDatepret(new \DateTime);
            $em->persist($commande);
            $em->flush();
            return new JsonResponse();
        }
        $commande->setDateprep(new \DateTime);
        $em->persist($commande);
        $em->flush();
        return new JsonResponse();
    }
    
    public function precAction() {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('EbeneMvpBundle:Commande')->find($params['id']);
        if($commande->getDatefin() == null){
            if($commande->getDatepret() == null){
                $commande->setDateprep(null);
                $em->persist($commande);
                $em->flush();
                return new JsonResponse();
            }
            $commande->setDatepret(null);
            $em->persist($commande);
            $em->flush();
            return new JsonResponse();
        }
        $commande->setDatefin(null);
        $em->persist($commande);
        $em->flush();
        return new JsonResponse();
    }

    public function indexAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }

        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('EbeneMvpBundle:Commande')->findBy(
                array( "restaurant" => $params['id']),
                array("datecom" => "DESC"),50);

        $logger = $this->get('logger');
        $logger->info("caca3");
        $logger->info(sizeof($commandes));

        $reponse = new JsonResponse();
        $reponse->setData($this->getCommandes($commandes));
        return $reponse;
    }
    
    public function getCommandes($arrayCommandes) {
        $res = array();

        if (sizeof($arrayCommandes) == 0)
            return $res;

        foreach ($arrayCommandes as $cur) {
            array_push($res, array(
                "id" => $cur->getId(),
                "datecom" => $cur->getDatecom(),
                "dateprep" => $cur->getDateprep(),
                "datepret" => $cur->getDatepret(),
                "datefin" => $cur->getDatefin(),
                "datedesir" => $cur->getDatedesir(),
                "client" => $cur->getClient()->getNom(),
                "articles" => $this->getArticles($cur->getArticles())
            ));
        }
        return $res;
    }

    public function getArticles($arrayArticles) {
        $res = array();

        if (sizeof($arrayArticles) == 0)
            return $res;

        foreach ($arrayArticles as $cur) {
            array_push($res, array(
                "id" => $cur->getId(),
                "nom" => $cur->getNom(),
                "secondaires" => $this->getSecondaires($cur->getSecondaires())
            ));
        }
        return $res;
    }

    public function getSecondaires($arraySecondaires) {
        $res = array();

        if (sizeof($arraySecondaires) == 0)
            return $res;

        foreach ($arraySecondaires as $cur) {
            array_push($res, array(
                "id" => $cur->getId(),
                "nom" => $cur->getNom()
            ));
        }
        return $res;
    }

}
