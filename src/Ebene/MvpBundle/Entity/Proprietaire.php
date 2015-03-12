<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proprietaire
 */
class Proprietaire
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $mdp;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $restaurants;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->restaurants = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Proprietaire
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return Proprietaire
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    
        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Proprietaire
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Proprietaire
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Add restaurants
     *
     * @param \Ebene\MvpBundle\Entity\Restaurant $restaurants
     * @return Proprietaire
     */
    public function addRestaurant(\Ebene\MvpBundle\Entity\Restaurant $restaurants)
    {
        $this->restaurants[] = $restaurants;
    
        return $this;
    }

    /**
     * Remove restaurants
     *
     * @param \Ebene\MvpBundle\Entity\Restaurant $restaurants
     */
    public function removeRestaurant(\Ebene\MvpBundle\Entity\Restaurant $restaurants)
    {
        $this->restaurants->removeElement($restaurants);
    }

    /**
     * Get restaurants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRestaurants()
    {
        return $this->restaurants;
    }
    public function __toString() {
        return $this->getNom();
    }

}
