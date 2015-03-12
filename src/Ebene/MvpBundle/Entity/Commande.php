<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 */
class Commande
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $couleurrestaurant;

    /**
     * @var string
     */
    private $couleursection;

    /**
     * @var float
     */
    private $prix;

    /**
     * @var \DateTime
     */
    private $datecom;

    /**
     * @var \DateTime
     */
    private $dateprep;

    /**
     * @var \DateTime
     */
    private $datepret;

    /**
     * @var \DateTime
     */
    private $datefin;

    /**
     * @var \DateTime
     */
    private $datedesir;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $articles;

    /**
     * @var \Ebene\MvpBundle\Entity\Restaurant
     */
    private $restaurant;

    /**
     * @var \Ebene\MvpBundle\Entity\Client
     */
    private $client;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set couleurrestaurant
     *
     * @param string $couleurrestaurant
     * @return Commande
     */
    public function setCouleurrestaurant($couleurrestaurant)
    {
        $this->couleurrestaurant = $couleurrestaurant;
    
        return $this;
    }

    /**
     * Get couleurrestaurant
     *
     * @return string 
     */
    public function getCouleurrestaurant()
    {
        return $this->couleurrestaurant;
    }

    /**
     * Set couleursection
     *
     * @param string $couleursection
     * @return Commande
     */
    public function setCouleursection($couleursection)
    {
        $this->couleursection = $couleursection;
    
        return $this;
    }

    /**
     * Get couleursection
     *
     * @return string 
     */
    public function getCouleursection()
    {
        return $this->couleursection;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return Commande
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set datecom
     *
     * @param \DateTime $datecom
     * @return Commande
     */
    public function setDatecom($datecom)
    {
        $this->datecom = $datecom;
    
        return $this;
    }

    /**
     * Get datecom
     *
     * @return \DateTime 
     */
    public function getDatecom()
    {
        return $this->datecom;
    }

    /**
     * Set dateprep
     *
     * @param \DateTime $dateprep
     * @return Commande
     */
    public function setDateprep($dateprep)
    {
        $this->dateprep = $dateprep;
    
        return $this;
    }

    /**
     * Get dateprep
     *
     * @return \DateTime 
     */
    public function getDateprep()
    {
        return $this->dateprep;
    }

    /**
     * Set datepret
     *
     * @param \DateTime $datepret
     * @return Commande
     */
    public function setDatepret($datepret)
    {
        $this->datepret = $datepret;
    
        return $this;
    }

    /**
     * Get datepret
     *
     * @return \DateTime 
     */
    public function getDatepret()
    {
        return $this->datepret;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Commande
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    
        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set datedesir
     *
     * @param \DateTime $datedesir
     * @return Commande
     */
    public function setDatedesir($datedesir)
    {
        $this->datedesir = $datedesir;
    
        return $this;
    }

    /**
     * Get datedesir
     *
     * @return \DateTime 
     */
    public function getDatedesir()
    {
        return $this->datedesir;
    }

    /**
     * Add articles
     *
     * @param \Ebene\MvpBundle\Entity\Article $articles
     * @return Commande
     */
    public function addArticle(\Ebene\MvpBundle\Entity\Article $articles)
    {
        $this->articles[] = $articles;
    
        return $this;
    }

    /**
     * Remove articles
     *
     * @param \Ebene\MvpBundle\Entity\Article $articles
     */
    public function removeArticle(\Ebene\MvpBundle\Entity\Article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set restaurant
     *
     * @param \Ebene\MvpBundle\Entity\Restaurant $restaurant
     * @return Commande
     */
    public function setRestaurant(\Ebene\MvpBundle\Entity\Restaurant $restaurant = null)
    {
        $this->restaurant = $restaurant;
    
        return $this;
    }

    /**
     * Get restaurant
     *
     * @return \Ebene\MvpBundle\Entity\Restaurant 
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * Set client
     *
     * @param \Ebene\MvpBundle\Entity\Client $client
     * @return Commande
     */
    public function setClient(\Ebene\MvpBundle\Entity\Client $client = null)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \Ebene\MvpBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
    public function __toString() {
        return "Commande".$this->id;
    }

}
