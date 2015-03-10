<?php

namespace Ebene\MvpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 */
class Section implements \JsonSerializable
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
    private $couleur1;

    /**
     * @var string
     */
    private $couleur2;

    /**
     * @var string
     */
    private $couleur3;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $listearticles;

    /**
     * @var \Ebene\MvpBundle\Entity\Restaurant
     */
    private $restaurant;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listearticles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Section
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
     * Set couleur1
     *
     * @param string $couleur1
     * @return Section
     */
    public function setCouleur1($couleur1)
    {
        $this->couleur1 = $couleur1;
    
        return $this;
    }

    /**
     * Get couleur1
     *
     * @return string 
     */
    public function getCouleur1()
    {
        return $this->couleur1;
    }

    /**
     * Set couleur2
     *
     * @param string $couleur2
     * @return Section
     */
    public function setCouleur2($couleur2)
    {
        $this->couleur2 = $couleur2;
    
        return $this;
    }

    /**
     * Get couleur2
     *
     * @return string 
     */
    public function getCouleur2()
    {
        return $this->couleur2;
    }

    /**
     * Set couleur3
     *
     * @param string $couleur3
     * @return Section
     */
    public function setCouleur3($couleur3)
    {
        $this->couleur3 = $couleur3;
    
        return $this;
    }

    /**
     * Get couleur3
     *
     * @return string 
     */
    public function getCouleur3()
    {
        return $this->couleur3;
    }

    /**
     * Add listearticles
     *
     * @param \Ebene\MvpBundle\Entity\Article $listearticles
     * @return Section
     */
    public function addListearticle(\Ebene\MvpBundle\Entity\Article $listearticles)
    {
        $this->listearticles[] = $listearticles;
    
        return $this;
    }

    /**
     * Remove listearticles
     *
     * @param \Ebene\MvpBundle\Entity\Article $listearticles
     */
    public function removeListearticle(\Ebene\MvpBundle\Entity\Article $listearticles)
    {
        $this->listearticles->removeElement($listearticles);
    }

    /**
     * Get listearticles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListearticles()
    {
        return $this->listearticles;
    }

    /**
     * Set restaurant
     *
     * @param \Ebene\MvpBundle\Entity\Restaurant $restaurant
     * @return Section
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
    
    public function jsonSerialize() {
        return json_encode(array(
            "id" => $this->id,
            "nom" => $this->nom,
        ));
    }
    
    public function __toString() {
        return $this->getNom();
    }
}