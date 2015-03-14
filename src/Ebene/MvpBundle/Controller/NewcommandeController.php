<?php

namespace Ebene\MvpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Ebene\MvpBundle\Entity\Client;
use Ebene\MvpBundle\Entity\Commande;
use Ebene\MvpBundle\Entity\Secondaire;
use Ebene\MvpBundle\Entity\Article;


class NewcommandeController extends Controller
{
    public function indexAction()
    {
        $logger = $this->get('logger');
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }
        if($params['user'] == 0)
        {
            $logger->info('ok');
            /*$em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('EbeneMvpBundle:Restaurant')->find($params['id']);
            $reponse = new JsonResponse();
            $reponse->setData($this->getSections($entity));*/
            
            //New user
            $params['user'] = $this->newUser($params['content']['username']);
        }
        if (sizeof($params['content']['contentres']) > 0) {
            //New commande
            $this->newCommande($params);
        }
        $logger->info("fin");
        $logger->info(sizeof($params));
        return new JsonResponse(array("user" => $params['user']));//$reponse;
    }
    
    public function newCommande($content) {
        $logger = $this->get('logger');

        $em = $this->getDoctrine()->getEntityManager();
        // Trouver le client
        $cli = $em->getRepository('EbeneMvpBundle:Client')->find($content['user']);
        $cli->setNom($content['content']['username']);
        // Trouver le restaurant
        $rest = $em->getRepository('EbeneMvpBundle:Restaurant')->find($content['id']);
        // Creer commande
        $commande = new Commande();
        //TODO gérer les couleurs et le prix
        $commande->setCouleurrestaurant("bleu");
        $commande->setCouleursection("bleu");
        $commande->setPrix(0);
        $commande->setClient($cli);
        
        //TODO gérer les dates avec desirée
        $commande->setDatecom(new \DateTime);
        $cli->addCommande($commande);
        $commande->setRestaurant($rest);
        $rest->addCommande($commande);
        // Pour chaque article trouver secondaire, créer article 
        // et lier avec secondaire et commande
        foreach ($content["content"]["contentres"] as $article) {
            $newArticle = new Article();
            $newArticle->setCommande($commande);
            $newArticle->setNom($article["nom"]);
            $newArticle->setPrix($article["prix"]);
            foreach ($article["listesecondaires"] as $secondaire) {
                $logger->info('bouclesec');
                if(array_key_exists("asked", $secondaire)){
                    if ($secondaire['asked']) {
                        $logger->info('asked boucle');
                        $secondcurr = $em->getRepository('EbeneMvpBundle:Secondaire')
                                ->find($secondaire['id']);
                        $newArticle->addSecondaire($secondcurr);
                        $secondcurr->addArticle($newArticle);
                        $em->persist($secondcurr);
                    }
                }
            }
            $em->persist($newArticle);
        }
        // Persist et flush
        $em->persist($cli);
        $em->persist($rest);
        $em->persist($commande);
        $em->flush();
    }
    
    public function newUser($nom) {
        $em = $this->getDoctrine()->getEntityManager();
        $cli = new Client();
        $cli->setNom($nom);
        $cli->setMdp("0000");
        $em->persist($cli);
        $em->flush();
        return $cli->getId();
    }
}
